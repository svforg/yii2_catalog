<?php

use yii\helpers\Html;
use \app\components\ImageUploader;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wrapper">
    <div class="product-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <?php if ( !empty($products) ) : ?>
            <?php foreach($products as $product) :?>

            <?php $imageUrl50x50 = ImageUploader::getImageUrl50x50($model);
            //$imageUrl800x = ImageUploader::getImageUrl800x($model); ?>

                <div class="product" style="border: 1px solid blue;">
                    <a href="/product/view?id=<?= $product->id ?>" style="display: block;">
                        <h2><?= Html::encode($product->name) ?></h2>
                        <p><?= Html::encode($product->description) ?></p>
                        <img src="<?=  $imageUrl50x50 ?>" alt="<?= $product->name ?>"/>
                        <!--img src="<?=  $imageUrl800x ?>" alt="<?= $product->name ?>"-->
                        <p><?= date("d-m-Y", $product->created_at) ?></p>
                    </a>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
</div>