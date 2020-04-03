<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use yii\web\Controller;

class OrdersController extends Controller
{

    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {

            if ( $model->save() ) {
                return $model->getFirstError();
            } else {
                return $model->getFirstError();
            }

            return $model->getFirstError();
        }


    }
}
