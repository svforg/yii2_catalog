<?php

use yii\helpers\Html;
use app\components\ImageUploader;

$imageUrl50x50 = ImageUploader::getImageUrl50x50($model);
$imageUrl800x = ImageUploader::getImageUrl800x($model);

?>

<!-- === blog-item === -->
<article class="article-table">
    <a href="<?= \yii\helpers\Url::to(['product/view/', 'id' => $model->id]); ?>">
        <div class="image" style="background-image:url(assets/images/blog-1.jpg)">
            <img src="<?= $imageUrl800x ?>" alt="" />
        </div>
        <div class="text">
            <div class="title">
                <p><?= $model->created_at ?></p>
                <h2 class="h5"><?= $model->name ?></h2>
            </div>
            <div class="text-intro">
                <p><?= $model->subject ?></p>
            </div>
        </div>
    </a>
</article>

