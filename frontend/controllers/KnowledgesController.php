<?php


namespace frontend\controllers;


use backend\models\Knowledges;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class KnowledgesController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'add' => ['POST'],
//                ],
//            ],
//        ];
//    }

    /**
     * 主页
     * @return string
     */
    public function actionKnowledges()
    {
        $model = Knowledges::find()->all();
        return $this->render('knowledges', ['model' => $model]);
    }


    /**
     * 更新浏览次数
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionAdd($id)
    {
        $model = $this->findModel($id);
        $query = Knowledges::find();
        //查id最大值
        $model2 = $query->select('id')->orderBy(['id' => SORT_DESC])->one();

        if ($model) {
            $model->views ++;
            $model3 = $query->select('*')->where(['id' => ($model->id)-1])->one();
            $model4 = $query->select('*')->where(['id' => ($model->id)+1])->one();
            if (Yii::$app->request->isPost && $model->save()) {
                return $this->render('knowledgesDetails', [
                    'model' => $model ,
                    'model2' => $model2,
                    'model3' => $model3,
                    'model4' => $model4,
                ]);
            }
        }

    }

    /**
     * 查id
     * @param $id
     * @return Knowledges|null
     * @throws NotFoundHttpException
     */
    private function findModel($id)
    {
        $model = Knowledges::findOne($id);
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException('不存在');
    }

}
