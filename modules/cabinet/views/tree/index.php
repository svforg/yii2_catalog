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
<div class="tree-index">

    <p>
        <?= Html::a('Create Tree', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'root',
            'lft',
            'rgt',
            'lvl',
            //'name',
            //'icon',
            //'icon_type',
            //'active',
            //'selected',
            //'disabled',
            //'readonly',
            //'visible',
            //'collapsed',
            //'movable_u',
            //'movable_d',
            //'movable_l',
            //'movable_r',
            //'removable',
            //'removable_all',
            //'child_allowed',
            //'image',
            //'url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?-->

    <?= TreeView::widget([
        'query' => Tree::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Меню'],
        'fontAwesome' => true,
        'isAdmin' => true,
        'displayValue' => 1,
        'iconEditSettings' => [
            'show' => 'list',
            'listData' => [
                'folder' => 'Folder',
                'file' => 'File',
                'mobile' => 'Phone',
                'bell' => 'Bell',
            ],
        ],
        'softDelete' => false,
        'cacheSettings' => [
            'enableCache' => false   // defaults to true
        ],

//        'nodeAddlViews' => [
//            \kartik\tree\Module::VIEW_PART_2 => '@app/modules/cabinet/view/tree/_form_upload_image',
//        ],

//        'nodeActions' => [
//            \kartik\tree\Module::NODE_SAVE => \yii\helpers\Url::to(['/cabinet/tree/save']),
//            //\kartik\tree\Module::NODE_SAVE => TreeController::actionSave($this),
//            //\kartik\tree\Module::NODE_SAVE => Yii::getAlias('@app/cabinet/tree/save'),
//        ]

    ]);
    ?>


</div>
