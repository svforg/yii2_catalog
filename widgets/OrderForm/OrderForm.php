<?php

namespace app\widgets\OrderForm;

use Yii;
use yii\base\Widget;
//use yii\bootstrap\Widget;
use yii\helpers\Html;

class OrderForm extends  Widget
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
       return $this->render('orderform');
    }
}
