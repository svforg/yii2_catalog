<?php
use yii\widgets\Menu;
use \yii\bootstrap\NavBar;

NavBar::begin([
    'options' => [
        'class' => 'navbar-fixed',
    ],
]);

    echo "<div class=\"navigation navigation-main\">
    
                        <!-- Setup your logo here-->
        <a href=\"/\" class=\"logo\"><img src=\"assets/images/logo.png\" alt=\"\" /></a>
        
        <!-- Mobile toggle menu -->
        <a href=\"#\" class=\"open-menu\"><i class=\"icon icon-menu\"></i></a>
        
        <!-- Convertible menu (mobile/desktop)-->
        <div class=\"floating-menu\">";

            echo Menu::widget([
                'items' => [
                    ['label' => 'Главная', 'url' => ['/'], 'template'=> '<a href="{url}" itemprop="url">{label}</a>',],
                    ['label' => 'Каталог', 'url' => ['/catalog'],  'template'=> '<a href="{url}" itemprop="url">{label}</a>',],
                    ['label' => 'Новости', 'url' => ['/news'],  'template'=> '<a href="{url}" itemprop="url">{label}</a>',],
                    ['label' => 'Контакты', 'url' => ['site/contacts'],  'template'=> '<a href="{url}" itemprop="url">{label}</a>',],
                ],
                'options' => [
                    'id' => 'navid',
                    'class' => '',
                    'style' => '',
                    'itemscope' => '',
                    'itemtype' => 'http://www.schema.org/SiteNavigationElement',
                ],
                'itemOptions' => [
                    'class' => '',
                    'style' => 'font-size = 12px;',
                    'itemprop' => 'name',
                ],
                'activeCssClass'=>'active',
            ]);

        echo "</div>";
    echo "</div>";

NavBar::end();
?>