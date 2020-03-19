<?php

namespace backend\controllers;

use backend\models\UploadForm;
use Yii;
use backend\models\Pets;
use backend\models\SerachPets;
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
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
     * Displays a single Pets model.
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

//        $aa = Yii::$app->request->post('Pets','category');
//        $query = Pets::find()->where(['category' => $aa])->one();

//        if (!$query) {
            if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $file_path = $model->upload();

                if ($file_path !== false) {
                    $model->imageFile = $file_path ;
                    $model->picture = '/bs3/backend/web/'.$file_path ;
                    if ($model->save()) {
//                        $this->redirect(['view', 'id' => $model->id]);
                        Yii::$app->getSession()->setFlash('success','添加成功--'.'宠物编号为：'.$model->pets_id);
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
     * Updates an existing Pets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $aa = Yii::$app->request->post('Pets','category');
        $query = Pets::find()->where(['category' => $aa])->one();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $file_path = $model->upload();

            if ($file_path !== false) {
                $model->imageFile = $file_path ;
                $model->picture = '/bs3/backend/web/'.$file_path ;
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash('success','更新成功--'.'宠物编号为：'.$model->pets_id);

                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->deleted_at = time();

        if (!$model->load(Yii::$app->request->post()) && $model->save())

        return $this->redirect(['index']);
    }

    public function actionDeleteall()
    {
//        return Pets::deleteAll(['in','id',Yii::$app->request->post('arr_id')]);
        return Pets::updateAll(['deleted_at' => time()], ['id' => Yii::$app->request->post('arr_id')]);
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
