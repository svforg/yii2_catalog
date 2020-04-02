<?php
use yii\helpers\Html;
use app\components\ImageUploader;

$imageUrl50x50 = ImageUploader::getImageUrl50x50($model);
//$imageUrl800x = ImageUploader::getImageUrl800x($model);

?>
<div class="product" style="border: 1px solid blue;">
    <a href="/product/view?id=<?= $model->id ?>" style="display: block;">
        <h2><?= Html::encode($model->name) ?></h2>
        <p><?= Html::encode($model->description) ?></p>
        <img src="<?=  $imageUrl50x50 ?>" alt="<?= $model->name ?>"/>
        <!--img src="<?=  $imageUrl800x ?>" alt="<?= $model->name ?>"-->
        <p><?= date("d-m-Y", $model->created_at) ?></p>
    </a>
</div>

