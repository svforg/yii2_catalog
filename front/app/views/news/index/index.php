<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
//$this->params['breadcrumbs'][] = $this->title;
?>
<main class="page-content">


    @@include('hero/hero.php')
    @@include('blog/blog.php')

</main>
