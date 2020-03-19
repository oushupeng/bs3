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
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class OrdersController extends Controller
{

    public function actionOrders()
    {
        $query = Orders::find();
        $username = Yii::$app->user->identity->username;


        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->where(['deleted_at' => 0])->andWhere(['user_name' => $username])->count(),
        ]);

//        $model = $query->orderBy(['created_at' => SORT_DESC])->offset($pagination->offset)->limit($pagination->limit)->all();

//        $model = Orders::find()
//            ->select('orders_details.order_id')
//            ->leftJoin('orders_details','`orders_details`.`order_id` = `orders`.`order_id`')
//            ->orderBy(['orders.created_at' => SORT_DESC])
//            ->with('orderDetails')
//            ->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();

//        $model = Orders::find()
//            ->innerJoinWith(['orderDetails','name'])
//            ->orderBy(['orders.created_at' => SORT_DESC])
//            ->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();

        $username = Yii::$app->user->identity->username;
        $model = OrdersDetails::find()
            ->innerJoinWith(['order', 'name'])
            ->orderBy(['orders.created_at' => SORT_DESC])
            ->where(['orders.user_name' => $username])
            ->andWhere(['orders.deleted_at' => 0])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


//        $model = (new Query())->from('orders')
//            ->innerJoin(''orders_details'','orders.order_id = orders_details.order_id')
//            ->orderBy(['orders.created_at' => SORT_DESC])
//            ->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();

        return $this->render('orders', ['model' => $model, 'pagination' => $pagination]);
    }

    public function actionOrdersDetails($id)
    {
        $model = $this->findModel($id);
        $order = Orders::find()->where(['order_id' => $model->order_id])->one();
        $pet = Pets::find()->where(['id' => $model->pets_id])->one();
//                var_dump($aa->id);die();

        return $this->render('ordersDetails', ['model' => $model, 'order' => $order, 'pet' => $pet]);
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

        $model->status = '代付款';

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
     * 立即购买
     * @return Response
     */
    public function actionCreate2()
    {

        $model = new Orders();

        $model['created_at'] = time();
        $username = Yii::$app->user->identity->username;
        $id = Yii::$app->user->identity->id;
        $model->created_by = $username;
        $model->user_name = $username;
        $model->user_id = $id;

        $model->status = '代付款';

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

            return $this->redirect(['orders']);


        }
        $id = $_POST['id'];
        return $this->redirect(['shop-cart/details2', 'id' => $id]);

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
        $model = $this->findModel($id);

        if ($model) {
            $aa = $model->order_id;
            $bb = Orders::find()->where(['order_id' => $aa])->one();

            $model->deleted_at = time();
            $bb->deleted_at = time();
//            var_dump(1);die();

            if (!$model->load(Yii::$app->request->post()) && $model->save() && !$bb->load(Yii::$app->request->post()) && $bb->save()) {
                Yii::$app->getSession()->setFlash('success','删除成功');
                return $this->redirect(['orders/orders']);

            }


        }
        //订单详情关联订单删除
//        if ($this->findModel($id)->delete() && $bb->delete())
//
//        return $this->redirect(['orders/orders']);

    }

    public function actionPay($id)
    {
        $model = $this->findModel($id);

        if ($model) {
            $bb = Orders::find()->where(['order_id' => $model->order_id])->one();
            $bb->status = '代发货';

            if (Yii::$app->request->post() && $bb->save()) {
                Yii::$app->getSession()->setFlash('success','支付成功，订单进入代发货状态');
                return $this->redirect(['orders-details', 'id' => $model->id]);
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

}
