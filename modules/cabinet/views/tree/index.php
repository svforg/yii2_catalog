<?php

use yii\helpers\Html;
use kartik\tree\TreeView;
use app\modules\cabinet\models\Tree;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\cabinet\models\TreeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tree-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tree', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
        'nodeAddlViews' => [
            \kartik\tree\Module::VIEW_PART_2 => '@app/modules/cabinet/views/tree/_form',
        ],
        'nodeFormOptions' => [
                'enctype' => 'miltipart/form-data',
        ],
//        'nodeActions' => [
//            \kartik\tree\Module::NODE_SAVE => \yii\helpers\Url::to(['/treemanager/node/save']),
//            //\kartik\tree\Module::NODE_SAVE => Tree::uploadImageField($this),
//        ]

    ]);
    ?>
</div>
