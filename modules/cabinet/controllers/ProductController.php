<?php

namespace app\modules\cabinet\controllers;

use app\models\Feature;
use app\models\Seo;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\cabinet\controllers\DefaultController;
use app\components\ImageUploader;

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

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {



        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param string $id
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelProduct = new Product();
        $modelSeo = new Seo();

        if( $modelProduct->load(Yii::$app->request->post())  && $modelProduct->validate() )
        {
            $imageUploader = new ImageUploader($modelProduct);
            $modelProduct->save();
            $imageUploader->resizeImageFile($modelProduct);

            if ( $modelSeo->load(Yii::$app->request->post()) && $modelSeo->validate() )
            {
                $modelSeo->saveData($modelProduct);
            }


            return $this->redirect(['view', 'id' => $modelProduct->id]);
        }

        return $this->render('create', [
            'modelProduct' => $modelProduct,
            'modelSeo' => $modelSeo
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if( $model->load(Yii::$app->request->post()) )
        {
            ImageUploader::deleteImageFile($this->findModel($id));

            $imageUploader = new ImageUploader($model);
            $model->save();
            $imageUploader->resizeImageFile($model);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        ImageUploader::deleteImageFile($this->findModel($id));

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
