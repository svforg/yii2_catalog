<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use app\widgets\OrderWidget\OrderWidget;

?>

<main class="page-content">
    <!-- ======================== Main header ======================== -->

    <section class="section site-header" style="background-image:url(assets/images/gallery-3.jpg)">
        <header>
            <div class="container">
                <h1 class="h2 title"><?= Html::encode($this->title) ?></h1>
                <ol class="breadcrumb breadcrumb-inverted">
                    <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                    <li><a href="category.html">Product Category</a></li>
                    <li><a class="active" href="products-grid.html">Product Sub-category</a></li>
                </ol>
            </div>
        </header>
    </section>


    <!-- ======================== product info ======================== -->

    <section class="product-info" style="background-image:url(assets/images/gallery-3.jpg)">

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
                        'seo_id',
                    ],
                ]) ?>
                <?php Modal::begin([
                    'header' => '<h5>Заказ товара</h5>',
                    'toggleButton' => ['label' => 'Заказать', 'class' => 'btn btn-success'],
                ]);

                echo OrderWidget::widget(['product_id' => $model->id]);

                Modal::end(); ?>

            </div>
        </div>
    </section>
</main>