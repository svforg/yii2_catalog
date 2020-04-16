<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use app\widgets\OrderWidget\OrderWidget;

/* @var $this yii\web\View */

$this->title = 'Страница товара';
?>

<main class="page-content">

        <!-- ======================== Main header ======================== -->
    <section class="section site-header" style="background-image:url(assets/images/gallery-3.jpg)">
        <header>
            <div class="container">
                <h1 class="h2 title"><?= $model->name ?></h1>

                <ol class="breadcrumb breadcrumb-inverted">
                    <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                    <li><a href="category.html">Product Category</a></li>
                    <li><a class="active" href="products-grid.html">Product Sub-category</a></li>
                </ol>
            </div>
        </header>
    </section>

    <!-- ======================== product info ======================== -->
    <section class="section single-page-about" style="background-image:url(assets/images/gallery-3.jpg); padding: 80px 0 ;">
        <div class="container">
            <article class="single-page-about__article">
                <div class="single-page-about__inner">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div id="sync2" class="owl-carousel owl-theme">

                                <?php

                                use app\components\ImageUploader;

                                $imageUrl50x50 = ImageUploader::getImageUrl50x50($model);
                                $imageUrl800x = ImageUploader::getImageUrl800x($model);
                                ?>
                                <div class="item">
                                    <picture class="single-page-about__pic">
                                        <source srcset="<?= $imageUrl50x50 ?>">
                                        <img itemprop="image" src="<?= $imageUrl50x50 ?>" alt="" class="single-page-about__img"/>
                                    </picture>
                                </div>

                                <div class="item">
                                    <picture class="single-page-about__pic">
                                        <source srcset="<?= $imageUrl50x50 ?>">
                                        <img itemprop="image" src="<?= $imageUrl50x50 ?>" alt="" class="single-page-about__img"/>
                                    </picture>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-10 col-sm-12 col-xs-12">
                            <div id="sync1" class="owl-carousel owl-theme">
                                <div class="item">
                                    <a class="item__fancybox" href="" data-fancybox-group="group">
                                        <picture class="single-page-about__pic">
                                            <source srcset="<?= $imageUrl800x ?>">
                                            <img class="single-page-about__img" itemprop="image" src="<?= $imageUrl800x ?>" alt=""/>
                                        </picture>
                                    </a>
                                </div>

                                <div class="item">
                                    <a class="item__fancybox" href="" data-fancybox-group="group">
                                        <picture class="single-page-about__pic">
                                            <source srcset="<?= $imageUrl800x ?>">
                                            <img class="single-page-about__img" itemprop="image" src="<?= $imageUrl800x ?>" alt=""/>
                                        </picture>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                            <form class="single-page-about__form form">
                                <p class="form__descr">
                                <strong>Заказать  с бесплатной доставкой</strong>
                                </p>

                                <input class="input-field form__field" type="text" name="name" placeholder="Имя "/>

                                <input class="input-field form__field" type="email" id="getMethod_email" name="email" placeholder="Электронная почта *" required/>

                                <input class="input-field form__field" type="text" name="phone" placeholder="Телефон"/>

                                <button class="button button_filled form__button" type="submit" disabled>Отправить заказ</button>
                            </form>

                        </div>
                    </div><!--/.row-->
                </div><!--/.single-page-about__inner-->
            </article><!--/.single-page-about__article-->
        </div><!--/.wrapper-->
    </section>

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
    <svg display="none">
    <symbol id="hand-shake" height="120px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
        <g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)">
            <path d="M1604.6,3065.9C1148.6,2266.8,108.1,400.4,100.4,367.9c-5.8-34.5,46-72.8,360.2-266.4C682.9-32.6,845.8-120.8,868.8-116.9c28.7,3.8,226.1,339.2,831.6,1414.2c435,774.2,789.5,1421.8,787.6,1435.2c-5.7,30.7-730.1,481-772.2,481C1702.4,3213.4,1652.5,3146.4,1604.6,3065.9z"/>
            <path d="M7886,2985.4c-285.5-176.3-364.1-233.8-362.2-264.4c1.9-51.7,1559.8-2820.7,1598.1-2841.7c36.4-19.2,760.7,413.9,778,465.6c15.3,49.8-1567.5,2857.1-1615.4,2862.8C8265.4,3209.6,8087.2,3110,7886,2985.4z"/>
            <path d="M4900.5,2425.9c-298.9-24.9-605.5-74.7-764.6-124.6c-118.8-38.3-159-61.3-212.7-122.6c-109.2-128.4-557.6-764.6-684.1-971.5c-113.1-184-120.7-205-122.6-316.2c-1.9-113.1,0-120.7,53.7-145.6c69-34.5,291.3-5.8,450.3,59.4c228,92,519.3,335.3,672.6,565.3l67.1,99.6l237.6,76.7c130.3,42.2,254.9,76.6,275.9,76.6c67.1,0,873.8-435,1316.4-710.9c429.2-266.4,1211-824,1655.6-1182.3l226.1-184l80.5,44.1C8278.8-337.3,8411-230,8583.5-57.5l160.9,162.9l-609.4,1078.8c-333.4,594-613.2,1086.5-620.8,1096.1c-7.7,7.7-86.2-5.7-174.4-26.8c-216.5-55.6-394.7-42.2-824,55.6c-496.3,115-689.8,138-1084.6,136.1C5241.6,2443.1,5004,2435.4,4900.5,2425.9z"/>
            <path d="M1855.6,1161.2L1229.1,47.8L1328.7-69c55.6-65.2,141.8-172.5,193.5-237.6c51.7-67.1,95.8-120.7,99.6-120.7c3.8,0,46,28.7,92,65.2c256.8,195.4,630.4,88.1,791.4-226.1l46-92l86.2,116.9c111.1,151.4,224.2,212.7,396.6,212.7c304.7,0,553.8-249.1,557.6-559.5l1.9-130.3h70.9c109.2,0,298.9-107.3,383.2-220.4c84.3-109.2,138-266.4,126.5-373.7l-5.7-72.8l86.2-13.4c195.5-28.7,364.1-147.5,452.2-321.9c92-180.1,84.3-373.7-23-532.7c-36.4-55.6-59.4-105.4-51.7-113.1c7.7-7.7,70.9-32.6,139.9-55.6c454.1-145.6,827.8-178.2,1009.8-88.1c97.7,49.8,281.7,224.2,270.2,258.7c-3.8,11.5-220.4,122.6-484.8,251c-262.5,128.4-484.8,241.5-492.5,254.9c-28.7,44.1-15.3,107.3,32.6,138c46,30.7,59.4,24.9,569.1-222.3c551.9-268.3,615.1-289.3,810.6-260.6c120.7,19.2,210.8,101.6,249.1,228c53.7,180.1,92,145.6-578.7,532.7c-335.3,193.5-624.7,367.9-641.9,387.1c-19.2,17.3-34.5,46-34.5,61.3c0,44.1,76.7,109.2,115,99.6c19.2-5.8,320-174.4,668.8-375.6c626.6-362.1,632.4-366,745.4-366c143.7,0,226.1,28.7,306.6,103.5c74.7,69,105.4,159,95.8,285.5l-5.7,93.9l-728.2,438.8c-400.5,241.5-739.7,456.1-755,477.1c-21.1,30.6-21.1,49.8-5.7,86.2c44.1,95.8,93.9,72.8,917.9-423.5l781.8-469.5l143.7,5.7c113.1,3.8,157.1,15.3,206.9,49.8c141.8,103.5,182,316.2,84.3,461.8c-63.2,93.9-293.2,285.5-799.1,663C6435.4,538.4,5841.4,915.9,5044.2,1326l-178.2,92l-178.2-53.7l-180.1-53.7l-130.3-162.9c-320-398.6-760.7-634.3-1149.7-613.2c-149.5,7.7-206.9,34.5-283.6,138c-32.6,42.2-40.2,78.6-38.3,189.7c1.9,203.1,74.7,346.8,423.5,843.1c88.1,124.6,159,233.8,159,239.5c0,7.7-105.4,30.7-233.8,49.8c-306.6,46-454.1,92-624.7,195.5c-76.6,46-141.8,84.3-143.7,84.3C2484.2,2274.5,2200.6,1774.4,1855.6,1161.2z"/>
            <path d="M1874.8-494.4c-65.1-36.4-300.8-358.3-325.8-442.6c-47.9-178.2,111.1-400.5,314.3-436.9c124.6-23,189.7,23,350.7,237.6c132.2,180.1,143.7,201.2,143.7,287.4c0,118.8-24.9,185.9-101.6,266.4C2148.8-469.5,1989.8-433.1,1874.8-494.4z"/>
            <path d="M2921.1-569.2c-42.2-19.2-157.1-161-400.5-492.5c-187.8-254.9-352.6-486.7-366-513.6c-93.9-180.1,78.6-456.1,297-477.1c164.8-15.3,187.8,5.8,475.2,396.7c484.8,659.2,465.6,626.6,465.6,728.2C3392.5-680.3,3124.2-475.3,2921.1-569.2z"/>
            <path d="M3497.8-1260.9c-55.6-28.7-565.3-699.4-617-812.5c-86.2-189.7,80.5-456.1,298.9-477.1c161-15.3,185.9,5.7,448.4,366c350.7,482.9,339.2,463.7,339.2,576.8c0,122.6-57.5,230-162.9,302.8C3708.6-1237.9,3578.3-1218.8,3497.8-1260.9z"/>
            <path d="M4076.5-1956.5c-69-42.2-410.1-509.7-436.9-597.9c-42.2-138,55.6-321.9,214.6-404.3c90.1-46,182-46,260.6-1.9c74.7,40.3,419.6,500.1,448.4,597.9c28.7,95.8-5.8,212.7-93.9,310.4C4354.4-1923.9,4191.5-1883.7,4076.5-1956.5z"/>
        </g>
    </symbol>

    <symbol id="ru-currency" height="120px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
        <g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)">
            <path d="M4649.5,5003.4c-261.5-24.8-619.8-83.4-858.8-144.3C2395.5,4512,1178.4,3511.3,567.6,2210.7C272.3,1579.6,128.1,980.1,103.3,283.6C74-581.9,240.8-1341.5,628.5-2105.6c308.8-608.6,710-1111.2,1237.4-1553c1467.3-1230.6,3565.8-1480.8,5283.3-631.1c2443.3,1208.1,3444,4133.8,2242.7,6559C8909.5,3240.8,8174.7,3989.1,7219,4476c-473.3,241.2-991.7,405.7-1510.1,484.6C5472.2,4994.4,4841.1,5021.4,4649.5,5003.4z M6294.9,3249.8c351.6-74.4,626.6-218.6,883.6-459.8c696.5-655.9,818.2-1647.6,299.8-2427.5c-259.2-390-644.6-662.7-1104.4-782.1c-162.3-42.8-266-47.3-1063.9-56.3l-885.8-11.3v-279.5v-279.5h908.4h908.3l117.2-58.6c302-151,311-559,15.8-741.6l-108.2-67.6l-921.9-6.8l-919.6-6.8V-2322c0-441.8-13.5-498.1-142-610.8c-223.2-196.1-529.7-142-658.2,115c-54.1,105.9-56.4,133-56.4,500.4v385.4l-229.9,11.3c-243.4,11.3-302,29.3-408,128.5c-223.1,205.1-169,550,105.9,689.7c96.9,47.3,144.3,56.3,322.3,56.3h209.6v279.5v277.2L3349-476c-247.9,13.5-326.8,36.1-419.2,124C2832.8-261.9,2799-176.2,2799-41c0,175.8,76.6,302,232.2,378.7c101.4,49.6,146.5,58.6,326.8,58.6h209.6v1262.2c0,1088.7,4.5,1275.7,33.8,1347.9c47.3,110.5,117.2,182.6,225.4,232.2c83.4,38.3,169,42.8,1205.9,42.8C5895.9,3281.4,6182.2,3274.6,6294.9,3249.8z"/>
            <path d="M4439.9,2411.3c-9-9-15.8-466.6-15.8-1016.5V396.3h820.4c759.6,0,831.7,4.5,967,45.1c266,83.4,516.2,322.3,626.6,601.8c74.4,184.8,74.4,545.4,0,732.5c-101.4,261.4-322.3,480.1-583.8,583.8c-124,51.8-155.5,51.8-962.4,60.8C4832.1,2424.9,4448.9,2420.3,4439.9,2411.3z"/>
        </g>
    </symbol>

    <symbol id="fast-delivery" height="120px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 422.518 422.518">
        <g>
            <path d="M422.512,215.424c0-0.079-0.004-0.158-0.005-0.237c-0.116-5.295-4.368-9.514-9.727-9.514h-2.554l-39.443-76.258
	c-1.664-3.22-4.983-5.225-8.647-5.226l-67.34-0.014l2.569-20.364c0.733-8.138-1.783-15.822-7.086-21.638
	c-5.293-5.804-12.683-9.001-20.81-9.001h-209c-5.255,0-9.719,4.066-10.22,9.308l-2.095,16.778h119.078
	c7.732,0,13.836,6.268,13.634,14c-0.203,7.732-6.635,14-14.367,14H126.78c0.007,0.02,0.014,0.04,0.021,0.059H10.163
	c-5.468,0-10.017,4.432-10.16,9.9c-0.143,5.468,4.173,9.9,9.641,9.9H164.06c7.168,1.104,12.523,7.303,12.326,14.808
	c-0.216,8.242-7.039,14.925-15.267,14.994H54.661c-5.523,0-10.117,4.477-10.262,10c-0.145,5.523,4.215,10,9.738,10h105.204
	c7.273,1.013,12.735,7.262,12.537,14.84c-0.217,8.284-7.109,15-15.393,15H35.792v0.011H25.651c-5.523,0-10.117,4.477-10.262,10
	c-0.145,5.523,4.214,10,9.738,10h8.752l-3.423,35.818c-0.734,8.137,1.782,15.821,7.086,21.637c5.292,5.805,12.683,9.001,20.81,9.001
	h7.55C69.5,333.8,87.3,349.345,109.073,349.345c21.773,0,40.387-15.545,45.06-36.118h94.219c7.618,0,14.83-2.913,20.486-7.682
	c5.172,4.964,12.028,7.682,19.514,7.682h1.55c3.597,20.573,21.397,36.118,43.171,36.118c21.773,0,40.387-15.545,45.06-36.118h6.219
	c16.201,0,30.569-13.171,32.029-29.36l6.094-67.506c0.008-0.091,0.004-0.181,0.01-0.273c0.01-0.139,0.029-0.275,0.033-0.415
	C422.52,215.589,422.512,215.508,422.512,215.424z M109.597,329.345c-13.785,0-24.707-11.214-24.346-24.999
	c0.361-13.786,11.87-25.001,25.655-25.001c13.785,0,24.706,11.215,24.345,25.001C134.89,318.131,123.382,329.345,109.597,329.345z
	 M333.597,329.345c-13.785,0-24.706-11.214-24.346-24.999c0.361-13.786,11.87-25.001,25.655-25.001
	c13.785,0,24.707,11.215,24.345,25.001C358.89,318.131,347.382,329.345,333.597,329.345z M396.457,282.588
	c-0.52,5.767-5.823,10.639-11.58,10.639h-6.727c-4.454-19.453-21.744-33.882-42.721-33.882c-20.977,0-39.022,14.429-44.494,33.882
	h-2.059c-2.542,0-4.81-0.953-6.389-2.685c-1.589-1.742-2.337-4.113-2.106-6.676l12.609-139.691l28.959,0.006l-4.59,50.852
	c-0.735,8.137,1.78,15.821,7.083,21.637c5.292,5.806,12.685,9.004,20.813,9.004h56.338L396.457,282.588z"/>
        </g>
    </symbol>

    <symbol id="calculator" height="120px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 490">
        <g>
            <path d="M409.9,0H80.1C68,0,58.3,9.7,58.3,21.8v446.4c0,12.1,9.7,21.8,21.8,21.8h329.8c12.1,0,21.8-9.7,21.8-21.8V21.8
	C431.7,9.7,421.9,0,409.9,0z M139.6,442.6c-15.9,0-29.2-12.8-29.2-29.2c0-15.9,12.8-29.2,29.2-29.2s29.2,12.8,29.2,29.2
	C168.8,429.7,155.6,442.6,139.6,442.6z M139.6,346.5c-15.9,0-29.2-12.8-29.2-29.2c0-16.3,12.8-29.2,29.2-29.2
	s29.2,12.8,29.2,29.2S155.6,346.5,139.6,346.5z M139.6,250.1c-15.9,0-29.2-12.8-29.2-29.2s12.8-29.2,29.2-29.2
	s29.2,12.8,29.2,29.2S155.6,250.1,139.6,250.1z M245,442.6c-15.9,0-29.2-12.8-29.2-29.2c0-15.9,12.8-29.2,29.2-29.2
	c16.3,0,29.2,12.8,29.2,29.2C274.2,429.7,260.9,442.6,245,442.6z M245,346.5c-15.9,0-29.2-12.8-29.2-29.2
	c0-16.3,12.8-29.2,29.2-29.2c16.3,0,29.2,12.8,29.2,29.2S260.9,346.5,245,346.5z M245,250.1c-15.9,0-29.2-12.8-29.2-29.2
	s12.8-29.2,29.2-29.2c16.3,0,29.2,12.8,29.2,29.2S260.9,250.1,245,250.1z M350.4,442.6c-15.9,0-29.2-12.8-29.2-29.2
	c0-15.9,12.8-29.2,29.2-29.2s29.2,12.8,29.2,29.2C379.2,429.7,366.3,442.6,350.4,442.6z M350.4,346.5
	c-15.9,0-29.2-12.8-29.2-29.2c0-16.3,12.8-29.2,29.2-29.2s29.2,12.8,29.2,29.2S366.3,346.5,350.4,346.5z M350.4,250.1
	c-15.9,0-29.2-12.8-29.2-29.2s12.8-29.2,29.2-29.2s29.2,12.8,29.2,29.2S366.3,250.1,350.4,250.1z M381.5,141.9h-273V47.4h273.4
	v94.5H381.5z"/>
        </g>
    </symbol>
</svg>

    <section class="section single-page-kfu">
    <div class="wrapper">
        <div class="single-page-kfu__content content">
            <h2 class="content__headline">
                Преимущества заказа теплообменников Alfa Laval в &laquoХитинвест&raquo;
            </h2>

            <div class="row">
                <div class="col-xs-6 mb-2">
                    <div class="card">
                        <div class="card__front-side">
                            <svg class="card__icon">
                                <use xlink:href="#hand-shake"></use>
                            </svg>

                            <h4 class="card__title">
                                Точный инженерный расчет от 30 минут
                            </h4>
                        </div>

                        <ul class="desc-list desc-list_inverse">
                            <li class="desc-list__item">
                                Не удешевляем, манипулируя техническими параметрами
                            </li>

                            <li class="desc-list__item">
                                Учитываем технические нюансы и подбираем надежное оборудование
                            </li>

                            <li class="desc-list__item">
                                Беремся за нестандартные задачи любой сложности
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-6 mb-2">
                    <div class="card">
                        <div class="card__front-side">
                            <svg class="card__icon">
                                <use xlink:href="#ru-currency"></use>
                            </svg>

                            <h4 class="card__title">
                                Надежное оборудование со скидкой до 35%
                            </h4>
                        </div>

                        <ul class="desc-list desc-list_inverse">
                            <li class="desc-list__item">
                                Мы официальные партнеры завода с 2009г.
                            </li>

                            <li class="desc-list__item">
                                Оборудование сертифицировано и соответствует стандартам качества.
                            </li>

                            <li class="desc-list__item">
                                Заводская гарантия на оборудование 2 года.
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-6 mb-2 ">
                    <div class="card">
                        <div class="card__front-side">
                            <svg class="card__icon">
                                <use xlink:href="#fast-delivery"></use>
                            </svg>

                            <h4 class="card__title">
                                Бесплатная доставка по всей РФ от 3 дней
                            </h4>
                        </div>

                        <ul class="desc-list desc-list_inverse">
                            <li class="desc-list__item">
                                Отвечаем за груз, пока он не будет доставлен
                            </li>

                            <li class="desc-list__item">
                                Выдерживаем обозначенные сроки поставки
                            </li>

                            <li class="desc-list__item">
                                Всё оборудование застраховано
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-6 mb-2 ">
                    <div class="card">
                        <div class="card__front-side">
                            <svg class="card__icon">
                                <use xlink:href="#calculator"></use>
                            </svg>

                            <h4 class="card__title">
                                8 лет опыта работы компании в отрасли
                            </h4>
                        </div>

                        <ul class="desc-list desc-list_inverse">
                            <li class="desc-list__item">
                                Более 4 860 клиентов по России и СНГ
                            </li>

                            <li class="desc-list__item">
                                0 судебных исков
                            </li>

                            <li class="desc-list__item">
                                1501 повторно обратившийся клиентов в 2019г
                            </li>

                            <li class="desc-list__item">
                                Работа с ГОСОБОРОН заказами
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--/.row-->

            <p class="content__descr">
                Обеспечим вам стабильную работу системы за счет правильно подобранного и надежного оборудования, которое минимизирует риски аварийной ситуации, а также сэкономим деньги за счет энергоэффективных решений и выгодной цены.
            </p>
        </div><!--/.single-page-kfu__content-->
    </div><!--/.wrapper-->
</section>

    <section class="section spoilers">
  <div class="wrapper">
    <div class="row">
      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <h2 class="spoilers__headline">
            Частые вопросы
        </h2>

        <ul class="spoilers__list-spoilers list-spoilers">
          <li class="list-spoilers__item">
            <button class="list-spoilers__button button-spoiler">
              <span class="list-spoilers__button-icon"></span>

              <span class="list-spoilers__button-headings">
                  Откуда взять расчетные данные для ПТО?
              </span>
            </button>

            <p class="list-spoilers__desc">
                Расчетные данные (нагрузки, давления, температурные графики) выдаются теплоснабжающими организациями (тепловыми сетями, котельными) в виде пояснительных записок, Технических условий (ТУ). Также эти данные вы можете взять из договора с теплоснабжающей организацией, или из проекта модернизации или переоборудования ИТП, УУТО. Если у вас остались вопросы по данным для расчета, то можно обратиться к менеджеру за консультацией
            </p>
          </li>

          <li class="list-spoilers__item">
            <button class="list-spoilers__button button-spoiler">
              <span class="list-spoilers__button-icon"></span>

              <span class="list-spoilers__button-headings">
                  Почему по маркировке нельзя назвать стоимость ПТО?
              </span>
            </button>

            <p class="list-spoilers__desc">
                В маркировках в большинстве случаев заложены минимальные данные о теплообменнике (типоразмер, давление и количество пластин). В маркировке не прописываются материалы и толщины пластин, материалы прокладок, компановки пластин. При обозначении «примерной» стоимости заказчику, можно сделать ошибку, не зная вышеперечисленного.
            </p>
          </li>

          <li class="list-spoilers__item">
            <button class="list-spoilers__button button-spoiler">
              <span class="list-spoilers__button-icon"></span>

              <span class="list-spoilers__button-headings">
                  Что такое шильдик теплообменника?
              </span>
            </button>

            <p class="list-spoilers__desc">
                Шильдик - это знак, установленный на лицевой плите теплообменника, на котором указаны серийный номер, тип рабочей среды, расчетное давление, температура на входе и на выходе, тепловая нагрузка и др.
            </p>
          </li>

          <li class="list-spoilers__item">
            <button class="list-spoilers__button button-spoiler">
              <span class="list-spoilers__button-icon"></span>

              <span class="list-spoilers__button-headings">
                  Почему теплообменников нет в наличии или на складе?
              </span>
            </button>

            <p class="list-spoilers__desc">
                Каждый теплообменный аппарат расчитывается индивидуально, под ваши параметры. Для того чтобы специалист мог назвать вам цену, Вам необходимо отправить заполненный опросный лист или заполнить онлайн-форму заявки
            </p>
          </li>

          <li class="list-spoilers__item">
            <button class="list-spoilers__button button-spoiler">
              <span class="list-spoilers__button-icon"></span>

              <span class="list-spoilers__button-headings">
                  Какие сроки поставки теплообменника?
              </span>
            </button>

            <p class="list-spoilers__desc">
                Сроки во многом зависят от типоразмера рамы и сложности изготовления теплообменника. Например ТО Ридан НН№14A-16-38TL будет расчитан специалистом за 1 час, изготовлен за 4 дня, доставка до вашего города займет от 1 дня. Если вы сделаете заказ прямо сейчас, то сможете получить теплообменник уже через 5 дней! Срок доставки до вашего города можно уточнить у наших менеджеров.
            </p>
          </li>

          <li class="list-spoilers__item">
            <button class="list-spoilers__button button-spoiler">
              <span class="list-spoilers__button-icon"></span>

              <span class="list-spoilers__button-headings">
                  Почему у вас доставка бесплатная? Вы доставляете груз сами?
              </span>
            </button>

            <p class="list-spoilers__desc">
                Наша компания заботится о заказчике, поэтому мы взяли на себя все расходы по транспортировке груза. Ваш груз будет доставлен надежной транспортной кампанией до терминала в вашем городе за наш счет. Все грузы застрахованы от потери или порчи.
            </p>
          </li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">

      </div>
    </div><!--/.row-->
  </div><!--/.wrapper-->
</section>

    <!-- ========================  Contact ======================== -->

<section id="page-contact" class="contact contact-single">


    <div class="container">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                <div class="contact-block" style="margin-top: 0;">

                    <div class="banner">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10 text-center">
                                <h2 class="title">Send an email</h2>
                                <p>
                                    Thanks for your interest in Mobel Theme. We believe in creativity as one of the major forces of progress.
                                    Please use this form if you have any questions about our products and we'll get back with you very soon.
                                </p>

                                <div class="contact-form-wrapper">

                                    <a class="btn btn-clean open-form" data-text-open="Contact us via form" data-text-close="Close form">Contact us via form</a>

                                    <div class="contact-form clearfix">
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" value="" class="form-control" placeholder="Your name" required="required">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" value="" class="form-control" placeholder="Your email" required="required">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">

                                                    <div class="form-group">
                                                        <input type="text" value="" class="form-control" placeholder="Subject" required="required">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Your message" rows="10"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 text-center">
                                                    <input type="submit" class="btn btn-clean" value="Send message" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div><!--col-sm-8-->
        </div> <!--/row-->
    </div><!--/container-->
</section>

</main>
