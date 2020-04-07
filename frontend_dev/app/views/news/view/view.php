<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$imageUrl800x = \app\components\ImageUploader::getImageUrl800x($model);
?>
<main class="page-content">

    @@include('hero/hero.php')
    @@include('blog/blog.php')

</main>
