<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_list_item',

        'options' => [
            'tag' => 'div',
            'class' => 'row',
            'id' => 'news-list',
        ],

        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-lg-2 col-md-2 col-sm-6 col-md-6',
        ],
    ]); ?>


</div>
