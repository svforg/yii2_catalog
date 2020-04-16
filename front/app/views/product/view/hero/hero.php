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
