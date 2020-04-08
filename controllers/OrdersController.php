<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\Orders;
use yii\web\Controller;

class OrdersController extends Controller
{
    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {

            $product = Product::findOne($model->product_id);

            $mess = [
                'name' => $model->name,
                'email' => $model->email,
                'phone' => $model->phone,
                'subject' => $model->subject,
                'text' => $model->text,
                'product' => $product->name,
            ];

            return json_encode($mess, JSON_UNESCAPED_UNICODE );
        }
        die;
    }
}
