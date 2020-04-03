<?php

namespace app\widgets\OrderWidget;

use Yii;
use yii\base\Widget;
//use yii\bootstrap\Widget;
use yii\helpers\Html;
use app\models\Orders;

class OrderWidget extends  Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }
    public function run()
    {
        $model = new Orders();



        return $this->render('order_widget', [
            'model' => $model,
        ]);
    }
}
