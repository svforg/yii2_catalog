<?php

use kartik\tree\TreeView;
use app\modules\cabinet\models\Tree;

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
//            \kartik\tree\Module::VIEW_PART_2 => '@backend/views/mainmenu/_form',
//        ]


]);