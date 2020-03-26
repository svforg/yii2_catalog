<footer class="footer">
    <div class="wrapper">
        <div class="footer__menu-inner">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h3 class="footer__headline">Компания</h3>
                    <!--/.menu-->


                    <h3 class="footer__headline">Контакты</h3>
                    <ul class="footer__menu menu">
                        <li class="menu__item">

                            <a class="menu__link" href="mailto:info@debem.ru" rel="nofollow">info@debem.ru</a>
                        </li>
                        <li class="menu__item">
                            <a class="menu__link" href="tel:8-800-511-46-83" rel="nofollow">8-800-511-46-83</a>
                        </li>
                        <li class="menu__item">
                            г. Пермь ул. 25 Октября, 101
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h3 class="footer__headline">Каталог</h3>
<!--                    --><?php //if ($listcat) : ?>
<!--                        <ul class="footer__menu menu">-->
<!--                            --><?php //foreach ($listcat as $cat) : ?>
<!--                                <li class="menu__item">-->
<!--                                    <a class="menu__link" title="--><?//= $cat->cat_name?><!--" href="--><?php //echo get_category_link($cat->term_id);?><!--" >-->
<!--                                        --><?//= $cat->cat_name?>
<!--                                    </a>-->
<!--                                </li>-->
<!--                            --><?php //endforeach ?>
<!--                        </ul>-->
<!--                    --><?php //endif; ?>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <p class="footer__headline">
                        <strong>Получите бесплатную консультацию</strong>
                    </p>
                    <form class="footer__form form">
                        <input type="text" class="input-field form__field" name="name" placeholder="Имя " />
                        <input type="email" class="input-field form__field " name="email" placeholder="Электронная почта *"/>
                        <div>
                            <button class="button button_filled form__button" disabled>Отправить</button>
                        </div>
                    </form>
                </div>
            </div><!--/.row-->
        </div><!--/.footer__menu-inner-->
        <div class="footer__underbar">
            Поставка, расчет и обслуживание теплообменников HeatInvest &copy; 2019
        </div>
    </div><!--/.wrapper-->
</footer>