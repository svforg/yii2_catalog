<section class="section single-page-tabs">
    <div class="wrapper">
        <div class="single-page-tabs__tabs tabs">
            <ul class="tabs__nav nav">
                <li class="tabs__nav-item">
                    <a href="#specifications" class="tabs__nav-link tabs__nav-link_current">
                        Характеристики
                    </a>
                </li>

                <li class="tabs__nav-item">
                    <a href="#contents" class="tabs__nav-link">
                        Комплект
                    </a>
                </li>

                <li class="tabs__nav-item">
                    <a href="#documents" class="tabs__nav-link">
                        Документы
                    </a>
                </li>

                <li class="tabs__nav-item">
                    <a href="#mounting" class="tabs__nav-link">
                        Монтаж
                    </a>
                </li>

                <li class="tabs__nav-item">
                    <a href="#accessories" class="tabs__nav-link">
                        Пластины
                    </a>
                </li>
            </ul><!--/.tabs__nav -->

            <div class="tabs__content">
                <div class="tabs__content-inner" id="specifications">
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
                    ]); ?>

                    <?= OrderWidget::widget(['product_id' => $model->id]); ?>

                    <?php Modal::end(); ?>
                </div>

                <div class="tabs__content-inner hides" id="contents">
                    <h4 class="tabs__content-title">
                        Комплект поставки
                    </h4>

                    <p class="tabs__content-descr">
                        В комплект поставки

                       .  входит:
                    </p>

                    <ul class="desc-list">
                        <li class="desc-list__item">
                            Теплообменник, в собранном виде
                        </li>

                        <li class="desc-list__item">
                            Паспорт
                        </li>

                        <li class="desc-list__item">
                            Руководство по эксплуатации
                        </li>

                        <li class="desc-list__item">
                            Паронитовые прокладки
                        </li>
                    </ul>
                </div>

                <div class="tabs__content-inner hides" id="documents">
                    <h4 class="tabs__content-title">
                        Опросные листы
                    </h4>

                    <ul class="desc-list">
                        <li class="desc-list__item">
                            Теплообменник (стандартный опросный лист)
                        </li>

                        <li class="desc-list__item">
                            Теплообменник (холодоснабжение)
                        </li>

                        <li class="desc-list__item">
                            Теплообменник (пищевая промышленность)
                        </li>

                        <li class="desc-list__item">
                            Теплообменник (паровой)
                        </li>

                        <li class="desc-list__item">
                            Теплообменник (трехсредный)
                        </li>
                    </ul>
                </div>

                <div class="tabs__content-inner hides" id="mounting">
                    <h4 class="tabs__content-title">
                        Установка
                    </h4>

                    <p class="tabs__content-descr">
                        Компания Хитинвест консультации и услуги по монтажным работам не осуществляет. С рекомендуемыми производителем этапами установки теплообменника можно ознакомиться в инструкции по эксплуатации.
                    </p>

                    <p class="tabs__content-descr">
                        <strong>Внимание! Установку теплообменника рекомендуем выполнять с помощью специализированных монтажных организаций, которые имеют необходимые лицензии, а также несут ответственность за присоединения оборудования.</strong>
                    </p>
                </div>

                <div class="tabs__content-inner hides" id="accessories">
                    <h4 class="tabs__content-title">
                        Пластины и уплотнения
                    </h4>

                    <p class="tabs__content-descr">
                        Предлагаем оригинальные комплектующие для

                        Поможем с подбором пластин и уплотнений при сервисном обслуживании или увеличении мощности теплообменника.
                    </p>
                </div>
            </div><!--/.tabs__content-->
        </div><!--/.single-page-tabs__tabs-->
    </div><!--/.wrapper-->
</section>