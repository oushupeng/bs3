<?php


namespace frontend\controllers;


use backend\models\Notices;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NoticesController extends Controller
{
    public function actionNotices()
    {
        $model = Notices::find()->where(['deleted_at' => 0])->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('notices',['model' => $model]);
    }

    public function actionNoticesDetails($id)
    {
        $model = $this->findModel($id);
        $query = Notices::find();

        //查id最小值
        $model1 = $query->select('id')->andWhere(['deleted_at' => 0])->orderBy(['id' => SORT_ASC])->one();
        //查id最大值
        $model2 = $query->select('id')->andWhere(['deleted_at' => 0])->orderBy(['id' => SORT_DESC])->one();

        $model3 = $query->select('*')->where(['<', 'id', $model->id])->andWhere(['deleted_at' => 0])->orderBy(['id' => SORT_DESC])->limit(1)->one();
        $model4 = $query->select('*')->where(['>', 'id', $model->id])->andWhere(['deleted_at' => 0])->orderBy(['id' => SORT_ASC])->limit(1)->one();
        return $this->render('noticesDetails', [
            'model' => $model,
            'model1' => $model1,
            'model2' => $model2,
            'model3' => $model3,
            'model4' => $model4,
        ]);

    }

    public function findModel($id)
    {
        $model = Notices::find()->where(['deleted_at' => 0])->andWhere(['id' => $id])->one();
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException('找不到数据');
    }

}
