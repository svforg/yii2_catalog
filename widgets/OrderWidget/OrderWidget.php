<?php

namespace app\widgets\OrderWidget;

use Yii;
use yii\base\Widget;
use app\models\Orders;

class OrderWidget extends  Widget
{
    public $product_id;

    public function init()
    {
        parent::init();

        if ($this->product_id === null) {
            $this->product_id = 'null';
        }
    }
    public function run()
    {
        $model = new Orders();

        return $this->render('order_widget', [
            'model' => $model,
            'product_id' => $this->product_id,
        ]);
    }
}
