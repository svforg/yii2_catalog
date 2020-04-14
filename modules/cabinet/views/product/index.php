<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Product;
use app\models\Post;
use app\models\PostHelper;
use \yii\helpers\Url;
use \app\components\ImageUploader;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">



    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            [
                'attribute' => 'image',
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($model){
                    return Html::img(ImageUploader::getImageUrl50x50($model),[
                        'style' => 'max-width:50px;width:100%;object-fit:cover'
                    ]);
                },
            ],
            [
                'attribute' => 'status',
                'filter' => PostHelper::statusList(),
                'value' => function ($model) {
                    return PostHelper::statusLabel($model->status);
                },
                'format' => 'raw',
//                'value' => 'statusName',
//                'filter' => Product::getStatusList(),
            ],
            [
                'attribute' => 'category_id',
                'value' => 'treeName',
                'filter' => app\models\Tree::getTreesList(),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
