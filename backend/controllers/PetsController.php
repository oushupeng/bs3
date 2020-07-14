<?php

namespace backend\controllers;

use backend\models\UploadForm;
use Yii;
use backend\models\Pets;
use backend\models\SerachPets;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PetsController implements the CRUD actions for Pets model.
 */
class PetsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete', 'index'],
                'rules' => [
                    [
                        'actions' => ['index', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update', 'error'],
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
     * 主页
     * Lists all Pets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SerachPets();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Disp
     * 详情lays a single Pets model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * 创建
     * Creates a new Pets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pets();

        $model['created_at'] = time();
        $username = Yii::$app->user->identity->username;
        $model->created_by = $username;
        $model->pets_id = date('Ymdhis');

//        $aa = Yii::$app->request->post('Pets','category');
//        $query = Pets::find()->where(['category' => $aa])->one();

//        if (!$query) {
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $file_path = $model->upload();

            if ($file_path !== false) {
                $model->imageFile = $file_path;
                $model->picture = '/bs3/backend/web/' . $file_path;
                if ($model->save()) {
//                        $this->redirect(['view', 'id' => $model->id]);
                    Yii::$app->getSession()->setFlash('success', '添加成功--' . '宠物编号为：' . $model->pets_id);
                    return $this->redirect(['index']);
                }
            }


        }
//        }else {
//            echo '<script>alert(\'已存在相同类别的宠物猫\')</script>';
//
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }


        return $this->render('create', [
            'model' => $model,
        ]);


    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // 文件上传成功
                return '成功';
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    /**
     * 更新
     * Updates an existing Pets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('success', '更新成功--' . '宠物编号为：' . $model->pets_id);

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 更新上传图片方法
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        $aa = Yii::$app->request->post('Pets', 'category');
        $query = Pets::find()->where(['category' => $aa])->one();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $file_path = $model->upload();

            if ($file_path !== false) {
                $model->imageFile = $file_path;
                $model->picture = '/bs3/backend/web/' . $file_path;
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash('success', '上传成功--' . '宠物编号为：' . $model->pets_id);

                    return $this->redirect(['view', 'id' => $id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 单个软链接删除
     * Deletes an existing Pets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (Pets::updateAll(['deleted_at' => time()], ['id' => $id])) {
            Yii::$app->getSession()->setFlash('success', '删除成功');
            return $this->redirect(['index']);
        }
        Yii::$app->getSession()->setFlash('error', '删除成功');
        return $this->redirect(['index']);
    }

    /**
     * 批量软链接删除，放入回收站
     * @return int
     */
    public function actionDeleteall()
    {
//        return Pets::deleteAll(['in','id',Yii::$app->request->post('arr_id')]);
        return Pets::updateAll(['deleted_at' => time()], ['id' => Yii::$app->request->post('arr_id')]);
    }

    /**
     * 回收站
     * @return string
     */
    public function actionDustbin()
    {
//        $model = Pets::find()->where(['!=','deleted_at',0])->all();
//        return $this->render('dustbin', ['model' => $model]);

        $searchModel = new SerachPets();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('dustbin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 回收站里的单个删除
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete2($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('success', '删除成功');
        return $this->redirect(['dustbin']);
    }

    /**
     * 回收站里的批量删除
     * @return int
     */
    public function actionDeleteall2()
    {
        return Pets::deleteAll(['id' => Yii::$app->request->post('arr_id')]);
    }

    /**
     * 清空回收站
     * @return \yii\web\Response
     */
    public function actionClear()
    {
        Pets::deleteAll(['!=', 'deleted_at', 0]);
        Yii::$app->getSession()->setFlash('success', '清空回收站完成');
        return $this->redirect(['dustbin']);
    }

    /**
     * 批量恢复
     * @return int
     */
    public function actionRecoveryall()
    {
        return Pets::updateAll(['deleted_at' => 0], ['id' => Yii::$app->request->post('arr_id')]);
    }

    /**
     * 单个恢复
     * @param $id
     * @return \yii\web\Response
     */
    public function actionRecovery($id)
    {
        Pets::updateAll(['deleted_at' => 0], ['id' => $id]);
        Yii::$app->getSession()->setFlash('success', '恢复成功');
        return $this->redirect(['dustbin']);
    }

    /**
     * 上传图片页面
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionUp($id)
    {
        $model = $this->findModel($id);
        return $this->render('up', ['model' => $model]);
    }

    /**
     * Finds the Pets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
