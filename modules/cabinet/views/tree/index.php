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

    <?php

    echo TreeView::widget([
        // single query fetch to render the tree
        // use the Product model you have in the previous step
        'query' => Tree::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Меню'],
        'fontAwesome' => true,     // font awesome icons instead of glyphicons
        'isAdmin' => true,         // optional (toggle to enable admin mode)
        'displayValue' => 1,        // initial display value
        'iconEditSettings' => [
            'show' => 'list',
            'listData' => [
                'folder' => 'Folder',
                'file' => 'File',
                'mobile' => 'Phone',
                'bell' => 'Bell',
            ],
        ],
        'softDelete' => false,       // Удаление пункта
        'cacheSettings' => [
            'enableCache' => false   // defaults to true
        ],
//        'nodeAddlViews' => [
//            \kartik\tree\Module::VIEW_PART_2 => '@app/modules/cabinet/views/tree/_form',
//        ],
//        'nodeFormOptions' => [
//                'enctype' => 'miltipart/form-data',
//        ],
//        'nodeActions' => [
//            \kartik\tree\Module::NODE_SAVE => Tree::saveImageFile($this),
//        ]


    ]);
    ?>


</div>
