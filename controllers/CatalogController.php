<?php

namespace app\controllers;

use Yii;
use app\models\Tree;
use app\models\TreeSearch;
use app\models\Product;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class CatalogController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tree::find()->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);


        $trees = Tree::find()->roots()->all();

        $treeHasChildred = Tree::findOne(['lvl' => '0']);
        $children = $treeHasChildred->children()->all();


        $searchModel = new TreeSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'trees' => $trees,
            'children' => $children,
        ]);
    }


    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');

        $products = Product::find()->where(['category_id' => $id])->all();

        return $this->render('view', [
            //'model' => $this->findModel($id),
            'products' => $products,
        ]);
    }
}
