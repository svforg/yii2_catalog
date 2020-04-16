<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\components\ImageUploader;

$imageUrl50x50 = ImageUploader::getImageUrl50x50($model);
$imageUrl800x = ImageUploader::getImageUrl800x($model);

?>

<article>
    <div class="info">
        <span>
            <a href="<?= Url::to(['product/view/', ]); ?>" class="mfp-open" data-title="Quick wiew">
                <i class="icon icon-eye"></i>
            </a>
        </span>
    </div>

    <div class="btn btn-add">
        <i class="icon icon-cart"></i>
    </div>

    <div class="figure-grid">
        <span class="label label-info">-50%</span>

        <div class="image">
            <a href="<?= Url::to(['product/view/', 'id' => $model->id]); ?>" class="mfp-open">
                <img src="<?= $imageUrl800x ?>" alt="" width="360" style="min-height: 300px"/>
            </a>
        </div>

        <div class="text">
            <h2 class="title h4"><a href="<?= Url::to(['product/view/', 'seo_slug' => strtolower ($model->seo->seo_slug)]); ?>"><?= $model->name ?></a></h2>
            <sub>$ 1499,-</sub>
            <sup>$ 1099,-</sup>
            <span class="description clearfix">
                Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla
            </span>
        </div>
    </div>
</article>
