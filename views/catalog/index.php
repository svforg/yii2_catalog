<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TreeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог товаров';
//$this->params['breadcrumbs'][] = $this->title;
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

    <!-- ========================  Products ======================== -->
    <section class="section products">
        <div class="container">
            <div class="row">
                <!-- === product-filters === -->
                <div class="col-md-3 col-xs-12">
                    <aside class="sidebar-site">
                        <nav class="sidebar-site__nav" style="position: relative; top: unset; left: unset; bottom: unset;">
                            <ul class="sidebar-site__menu menu">
                                <!-- === category-root === -->
                                <?php if ( !empty($trees) ) : ?>
                                    <?php foreach($trees as $tree) :?>
                                    <?php endforeach;?>
                                <?php endif;?>

                                <!-- === category-item === -->
                                <?php if ( !empty($children) ) : ?>
                                    <?php foreach($children as $child) :?>
                                        <li class="menu__item">
                                            <a class="menu__link" href="/catalog/view?id=<?= $child->id ?>">
                                                <?= $child->name ?>
                                            </a>

                                            <?= \yii\widgets\ListView::widget([
                                                'dataProvider' => $productInCatProvider,
                                                'itemView' => '_list_item_row',
                                                'layout' => "{items}",
                                                'options' => [
                                                    'tag' => 'ul',
                                                    'class' => 'menu__sub-menu',
                                                ],
                                                'itemOptions' => [
                                                    'tag' => 'li',
                                                    'class' => 'menu__item',
                                                ],
                                                'summary' => '',
                                                'emptyText' => '',
                                            ]); ?>

                                        </li>

                                    <?php endforeach;?>
                                <?php endif;?>
                            </ul>
                        </nav>
                    </aside>
                </div><!--/product filters-->

                <!--product items-->
                <div class="col-md-9 col-xs-12">
                    <?= \yii\widgets\ListView::widget([
                        'dataProvider' => $allProductsProvider,
                        'itemView' => '_list_item_grid',
                        'layout' => "{items}\n{pager}",
                        'options' => [
                            'tag' => 'div',
                            'class' => 'row',
                            'id' => 'news-list',
                        ],

                        'itemOptions' => [
                            'tag' => 'div',
                            'class' => 'col-sm-6 col-xs-6',
                        ],


                        'summary' => 'Показано {count} из {totalCount}',


                        'emptyText' => 'Список пуст',
                        'pager' => [
                            'firstPageLabel' => 'Первая',
                            'lastPageLabel' => 'Последняя',
                            'nextPageLabel' => 'Следующая',
                            'prevPageLabel' => 'Предыдущая',
                            'maxButtonCount' => 5,
                        ],
                    ]); ?>
                </div> <!--/product items-->
            </div><!--/row-->
        </div><!--/container-->
    </section>

</main>