
<!-- ========================  Blog ======================== -->
<section class="section blog">

    <div class="container">

        <div class="pre-header hidden">
            <div>
                <h2 class="h3 title">
                    Category name
                </h2>
            </div>
            <div>
                <div class="sort-bar pull-right">
                    <div class="sort-results">
                        <!--Items counter-->
                        <span>Showing all <strong>50</strong> of <strong>3,250</strong> items</span>
                        <!--Showing result per page-->
                        <select>
                            <option value="1">10</option>
                            <option value="2">50</option>
                            <option value="3">100</option>
                            <option value="4">All</option>
                        </select>
                        <!--Grid-list view-->
                        <span class="grid-list">
                                    <a href="blog-grid.html"><i class="fa fa-th-large"></i></a>
                                    <a href="blog-list.html"><i class="fa fa-align-justify"></i></a>
                                    <a href="javascript:void(0);" class="toggle-filters-mobile"><i class="fa fa-search"></i></a>
                                </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- === blog-content === -->

            <div class="col-xs-12">

                <div class="row">

                    <?= ListView::widget([
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
                            'class' => 'col-sm-12',
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
                </div>

                <!-- === pagination === -->

                <div class="pagination-wrapper">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </div> <!--/pagination-->

            </div>




        </div> <!--/row-->


    </div><!--/container-->
</section>