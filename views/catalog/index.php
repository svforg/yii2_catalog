<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \kartik\tree\TreeView;
use app\models\Tree;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TreeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
<div class="tree-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php
    //printArr($trees);
    ?>

    <?php if ( !empty($trees) ) : ?>
        <?php foreach($trees as $tree) :?>

            <h3>
                <a href="/catalog/view?id=<?= $tree->id ?>" style="display: block;">
                    <?= $tree->name ?>
                </a>
            </h3>


            <?php
            //printArr($children);
            ?>
            <?php if ( !empty($children) ) : ?>
                <?php foreach($children as $child) :?>

                    <h3>
                        <a href="/catalog/view?id=<?= $child->id ?>" style="display: block;">
                            &nbsp;&nbsp;<?= $child->name ?>
                        </a>
                    </h3>
                <?php endforeach;?>
            <?php endif;?>
        <?php endforeach;?>
    <?php endif;?>




</div>
</div>