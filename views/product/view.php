<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use app\widgets\OrderForm\OrderForm;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'image',
            'url:url',
            'status',
            'description:ntext',
            'feature_id',
            'created_at',
            'category_id',
        ],
    ]) ?>
    <?php Modal::begin([
        'header' => '<h5>Заказ товара</h5>',
        'toggleButton' => ['label' => 'Заказать', 'class' => 'btn btn-success'],
    ]);

    echo OrderForm::widget();

    Modal::end(); ?>

</div>
</div>