<?php

namespace app\controllers;

use Yii;
use app\models\Tree;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\cabinet\controllers\DefaultController;
use yii\data\ActiveDataProvider;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends DefaultController
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

    public function actionIndex()
    {
        $trees = Tree::find()->roots()->all();
        $children = Tree::findOne(['lvl' => '0'])->children()->all();

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->with('seo')->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $searchModel = new ProductSearch();

        return $this->render('index', [
            'trees' => $trees,
            'children' => $children,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($key = null)
    {
        return $this->render('view', [
            'model' => $this->findModel($key = null),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Product::find()->where(['url' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
