<?php


namespace frontend\controllers;


use backend\models\Orders;
use backend\models\OrdersDetails;
use backend\models\Pets;
use backend\models\ShopCart;
use Throwable;
use Yii;
use yii\data\Pagination;
use yii\db\Query;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class OrdersController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['orders','create', 'create2','batch', 'pay', 'delete'],
                'rules' => [
                    [
                        'actions' => ['orders', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create2', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['batch', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['pay', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['delete', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 订单主页
     * @return string
     */
    public function actionOrders()
    {
        $query = Orders::find();
        $username = Yii::$app->user->identity->username;

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->where(['deleted_at' => 0])->andWhere(['user_name' => $username])->count(),
        ]);

        $model = OrdersDetails::find()
            ->innerJoinWith(['order', 'name'])
            ->orderBy(['orders.created_at' => SORT_DESC])
            ->where(['orders.user_name' => $username])
            ->andWhere(['orders.deleted_at' => 0])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $model1 = OrdersDetails::find()
            ->innerJoinWith(['order', 'name'])
            ->orderBy(['orders.created_at' => SORT_DESC])
            ->where(['orders.user_name' => $username])
            ->andWhere(['orders.deleted_at' => 0])
            ->andWhere(['orders.status' => '待付款'])
            ->all();

        $model2 = OrdersDetails::find()
            ->innerJoinWith(['order', 'name'])
            ->orderBy(['orders.created_at' => SORT_DESC])
            ->where(['orders.user_name' => $username])
            ->andWhere(['orders.deleted_at' => 0])
            ->andWhere(['orders.status' => '待发货'])
            ->all();

        $model3 = OrdersDetails::find()
            ->innerJoinWith(['order', 'name'])
            ->orderBy(['orders.created_at' => SORT_DESC])
            ->where(['orders.user_name' => $username])
            ->andWhere(['orders.deleted_at' => 0])
            ->andWhere(['orders.status' => '待收货'])
            ->all();

//        $model = (new Query())->from('orders')
//            ->innerJoin(''orders_details'','orders.order_id = orders_details.order_id')
//            ->orderBy(['orders.created_at' => SORT_DESC])
//            ->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();

        return $this->render('orders', [
            'model' => $model,
            'model1' => $model1,
            'model2' => $model2,
            'model3' => $model3,
            'pagination' => $pagination]);
    }

    public function actionOrdersDetails($id)
    {
        $model = $this->findModel($id);
        $order = Orders::find()->where(['order_id' => $model->order_id])->one();
        $pet = Pets::find()->where(['id' => $model->pets_id])->one();

        return $this->render('ordersDetails', ['model' => $model, 'order' => $order, 'pet' => $pet]);
    }

    /**
     * 订单详细
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionOrdersDetails2($id)
    {
        $model = $this->findOrdersModel($id);
        $details = OrdersDetails::find()
            ->innerJoinWith(['order', 'name'])
            ->where(['orders.order_id' => $model->order_id])
            ->orderBy(['orders.created_at' => SORT_DESC])
            ->all();

        return $this->render('ordersDetails2', ['model' => $model, 'details' => $details]);
    }

    /**
     * 创建订单
     * @return Response
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function actionCreate()
    {
        $model = new Orders();

        $model['created_at'] = time();
        $username = Yii::$app->user->identity->username;
        $id = Yii::$app->user->identity->id;
        $model->created_by = $username;
        $model->user_name = $username;
        $model->user_id = $id;

        $model->status = '待付款';

        //生成订单号，日期加随机五位数
        $osn = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $model->order_id = $osn;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //创建关联订单详情
            $query = new OrdersDetails();
            $query->order_id = $model->order_id;
            $query->created_by = $username;
            $query->created_at = time();
            $query->load(Yii::$app->request->post()) && $query->save();

            //关联商品并更新
            $pets_id = $query->pets_id;
            $row = Pets::findOne($pets_id);
            $row->stock = ($row->stock) - 1;
            $row->sales = ($row->sales) + 1;
            $row->load(Yii::$app->request->post() && $row->save());

            //提交订单后删除在购物车里的商品
            $id = $_POST['id'];
            ShopCart::find()->where(['id' => $id])->one()->delete();

            return $this->redirect(['orders-details', 'id' => $query->id]);
        }

//        var_dump(123);die();
//        return $this->render('/shop-cart/ordersForm',['model' => $model]);

//        return $this->render('/shop-cart/ordersForm');
        $id = $_POST['id'];
        return $this->redirect(['shop-cart/details', 'id' => $id]);
    }

    /**
     * 总价下单
     * @return Response
     * @throws \yii\db\Exception
     */
    public function actionBatch()
    {
        $shopId = $_POST['shopId'];
        $petsNum1 = $_POST['petsNum'];
        $num = $_POST['num'];
        $osp = ShopCart::find()
            ->innerJoinWith('pet')
            ->where(['shop_cart.id' => $shopId])
            ->andWhere(['pets.stock' => 0])
            ->all();
        if ($osp) {
            Yii::$app->getSession()->setFlash('error', '对不起，你购买的商品库存不足，请选择其他商品进行购买');
            return $this->redirect(['shop-cart/shop-cart']);
        }


        foreach ($petsNum1 as $key => $p) {
            if ($p > $num[$key]) {
                Yii::$app->getSession()->setFlash('error', '对不起，您购买的商品库存数量不足，请修改购买的商品数量或者选择其他商品进行购买！');
                return $this->redirect(['shop-cart/shop-cart']);
            }
        }


        $model = new Orders();

        $model['created_at'] = time();
        $username = Yii::$app->user->identity->username;
        $id = Yii::$app->user->identity->id;
        $model->created_by = $username;
        $model->user_name = $username;
        $model->user_id = $id;

        $model->status = '待付款';
        //生成订单号，日期加随机五位数
        $osn = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $model->order_id = $osn;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //创建关联订单详情
            $petsID = $_POST['petsId'];
            $userkey = ['order_id', 'pets_id', 'pets_price', 'pets_num', 'created_by', 'created_at'];

            //调试语句
//            $sql = "insert into orders_details (order_id,pets_id,pets_price,pets_num,created_by,created_at) VALUES";
//            $sql = trim($sql, ',');
//            echo $sql;

            foreach ($petsID as $key => $petsId) {
                $order_id = $model->order_id;
                $created_by = $username;
                $created_at = time();
                $petsNum = $_POST['petsNum'][$key];
                $petsPrice = $_POST['petsPrice'][$key];
//                $sql .= "({$order_id},{$petsId}, {$petsPrice}, {$petsNum},{$created_by},{$created_at}),";
                $data[] = [
                    'order_id' => $order_id,
                    'pets_id' => $petsId,
                    'pets_price' => $petsPrice,
                    'pets_num' => $petsNum,
                    'created_by' => $created_by,
                    'created_at' => time(),
                ];

                //关联商品并更新
                Pets::updateAllCounters(['stock' => -$petsNum, 'sales' => $petsNum], ['id' => $petsId]);
            }

            //批量添加
            Yii::$app->db->createCommand()->batchInsert(OrdersDetails::tableName(), $userkey, $data)->execute();


            //提交订单后删除在购物车里的商品
            ShopCart::deleteAll(['id' => $shopId]);

            Yii::$app->getSession()->setFlash('success', '提交成功，请尽快进行付款！');
            return $this->redirect(['orders-details2', 'id' => $model->id]);
        }
    }

    /**
     * 立即购买
     * @return string
     */
    public function actionCreate2()
    {

        $id = $_POST['id'];
        $stock = Pets::findOne($id);
        if ($stock->stock === 0) {
            Yii::$app->getSession()->setFlash('error', '对不起，该商品库存不足，不能购买，请选择其他商品购买，谢谢！');
            return $this->redirect(['pets/details', 'id' => $id]);
        } else {


            $zz = $_POST['OrdersDetails']['pets_num'];
//            var_dump($zz);die();

            if ($zz > $stock->stock) {
                Yii::$app->getSession()->setFlash('error', '对不起，您购买的商品库存数量不足，请修改购买的商品数量或者选择其他商品进行购买！');
                return $this->render('/shop-cart/ordersForm2', ['model' => $stock]);

//                return $this->redirect(['pets/details', 'id' => $id]);
            }
//            var_dump($zz);die();

            $model = new Orders();

            $model['created_at'] = time();
            $username = Yii::$app->user->identity->username;
            $id = Yii::$app->user->identity->id;
            $model->created_by = $username;
            $model->user_name = $username;
            $model->user_id = $id;

            $model->status = '待付款';

            //生成订单号，日期加随机五位数
            $osn = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $model->order_id = $osn;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                //创建关联订单详情
                $query = new OrdersDetails();
                $query->order_id = $model->order_id;
                $query->created_by = $username;
                $query->created_at = time();
                $query->load(Yii::$app->request->post()) && $query->save();

                //关联商品并更新
                $pets_id = $query->pets_id;
                $row = Pets::findOne($pets_id);
                $row->stock = ($row->stock) - $query->pets_num;
                $row->sales = ($row->sales) + $query->pets_num;
                $row->load(Yii::$app->request->post() && $row->save());


                Yii::$app->getSession()->setFlash('success', '提交成功，请尽快进行付款！');

                return $this->redirect(['orders-details2', 'id' => $model->id]);

            }
            $id = $_POST['id'];
            return $this->redirect(['shop-cart/details2', 'id' => $id]);

        }

    }

    /**
     * 删除订单
     * @param $id
     * @return Response
     * @throws NotFoundHttpException
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {

//        Yii::$app->db->createCommand()->delete('orders', ['order_id' => $aa])->execute()
        $model = $this->findOrdersModel($id);

        if ($model) {
            $aa = $model->order_id;
            $bb = OrdersDetails::updateAll(['deleted_at' => time()], ['order_id' => $aa]);
            $cc = Orders::updateAll(['deleted_at' => time()], ['order_id' => $aa]);

            if ($bb && $cc) {
                Yii::$app->getSession()->setFlash('success', '删除成功');
                return $this->redirect(['orders/orders']);

            }


        }
        //订单详情关联订单删除
//        if ($this->findModel($id)->delete() && $bb->delete())
//
//        return $this->redirect(['orders/orders']);

    }

    public function actionDelete2($id)
    {

//        Yii::$app->db->createCommand()->delete('orders', ['order_id' => $aa])->execute()
        $model = $this->findOrdersModel($id);

        if ($model) {
            $aa = $model->order_id;


            $dd = OrdersDetails::find()->select('pets_id')->where(['order_id' => $aa])->all();
            $ee = OrdersDetails::find()->select('pets_num')->where(['order_id' => $aa])->all();

//            var_dump($dd["pets_id"]);die();
            foreach ($dd as $key => $petsId) {
                $petsNum = $ee[$key];

//                var_dump($petsId);die();
                //关联商品并更新
                Pets::updateAllCounters(['stock' => +$petsNum->pets_num, 'sales' => -$petsNum->pets_num], ['id' => $petsId->pets_id]);
            }
//            var_dump(456);die();

            $bb = OrdersDetails::updateAll(['deleted_at' => time()], ['order_id' => $aa]);
            $cc = Orders::updateAll(['deleted_at' => time()], ['order_id' => $aa]);


            if ($bb && $cc) {
                Yii::$app->getSession()->setFlash('success', '删除成功');
                return $this->redirect(['orders/orders']);

            }


        }
        //订单详情关联订单删除
//        if ($this->findModel($id)->delete() && $bb->delete())
//
//        return $this->redirect(['orders/orders']);

    }

    /**
     * 付款
     * @param $id
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionPay($id)
    {
        $model = $this->findOrdersModel($id);

        if ($model) {
            $model->status = '待发货';

            if (Yii::$app->request->post() && $model->save()) {
                Yii::$app->getSession()->setFlash('success', '支付成功，订单进入待发货状态');
                return $this->redirect(['orders-details2', 'id' => $model->id]);
            }
        }
    }

    /**
     * @param $id
     * @return OrdersDetails|null
     * @throws NotFoundHttpException
     */
    public function findModel($id)
    {
        if (($model = OrdersDetails::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('不存在');
    }

    public function findOrdersModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('不存在');
    }

}
