<!-- ========================  Products ======================== -->
<section class="section products">
    <div class="container">
        <style>
            #news-list .summary:after {
                clear: both;
                content: " ";
                display: table;
            }
        </style>
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
                    'dataProvider' => $dataProvider,
                    'itemView' => '_list_item',
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