<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use app\widgets\OrderWidget\OrderWidget;

/* @var $this yii\web\View */

$this->title = 'Страница товара';
?>

<main class="page-content">

    @@include('hero/hero.php')
    @@include('tabs/tabs.php')
    @@include('four-cards/svg-sprite.php')
    @@include('four-cards/four-cards.php')
    @@include('spoilers/spoilers.php')
    @@include('lead-form/lead-form.php')

</main>
