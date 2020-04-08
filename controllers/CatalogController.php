<?php

namespace app\controllers;

use Yii;
use app\models\Tree;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


/**
 * CatalogController implements the CRUD actions for Product model.
 */
class CatalogController extends Controller
{
    public function actionIndex()
    {
        $trees = Tree::find()->roots()->all();
        $children = Tree::findOne(['lvl' => '0'])->children()->all();

        $allProductsProvider = new ActiveDataProvider([
            'query' => Product::find()->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $productInCatProvider = new ActiveDataProvider([
            'query' => Product::find()->where(['category_id' => $children->id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $searchModel = new ProductSearch();


        return $this->render('index', [
            'trees' => $trees,
            'children' => $children,
            'searchModel' => $searchModel,
            'allProductsProvider' => $allProductsProvider,
            'productInCatProvider' => $productInCatProvider,
        ]);
    }
}
