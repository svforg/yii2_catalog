
<!-- ========================  Blog article ======================== -->
<section class="blog">

    <!-- === blog navigation === -->
    <div class="blog-navigation">
        <!-- === nav previous === -->

        <a class="nav-link prev" href="#">
            <figure>
                <div class="image">
                    <img src="assets/images/blog-2.jpg" alt="Alternate Text">
                </div>
                <figcaption>
                    <div class="blog-title h6">The 3 Tricks that Quickly Became Rules</div>
                </figcaption>
            </figure>
        </a>

        <!-- === nav next === -->

        <a class="nav-link next" href="#">
            <figure>
                <div class="image">
                    <img src="assets/images/blog-3.jpg" alt="Alternate Text">
                </div>
                <figcaption>
                    <div class="blog-title h6">What does your favorite dining chair say about you?</div>
                </figcaption>
            </figure>
        </a>
    </div> <!--/blog-navigation-->

    <!-- ========================  Blog post ======================== -->
    <div class="container">

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                <div class="blog-post">

                    <!-- === blog main image & entry info === -->

                    <div class="blog-image-main">
                        <img src="<?= $imageUrl800x ?>" alt="" />
                    </div>

                    <div class="blog-post-content">

                        <!-- === blog post title === -->

                        <div class="blog-post-title">
                            <h1 class="blog-title">
                                <?= $model->name ?>
                            </h1>

                            <h2 class="blog-subtitle h5">
                                <?= $model->subject ?>
                            </h2>

                            <div class="blog-info blog-info-top">
                                <div class="entry">
                                    <i class="fa fa-calendar"></i>
                                    <span><?= $model->created_at ?></span>
                                </div>
                            </div> <!--/blog-info-->
                        </div>

                        <!-- === blog post text === -->

                        <div class="blog-post-text">
                            <?= $model->text ?>
                        </div>
                    </div>

                </div><!--blog-post-->
            </div><!--col-sm-8-->
        </div> <!--/row-->
    </div><!--/container-->
</section>