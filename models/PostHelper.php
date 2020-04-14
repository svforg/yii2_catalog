<?php

namespace app\models;

use app\models\Post;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class PostHelper
{
    //status for gridview filter
    public static function statusList()
    {
        return [
            Post::STATUS_DRAFT => 'Черновик',
            Post::STATUS_PUBLISH => 'Опубликован',
        ];
    }

    //status for gridview value
    public static function statusIcon()
    {
        return [
            Post::STATUS_DRAFT => '',
            Post::STATUS_PUBLISH => '',
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case Post::STATUS_DRAFT:
                $class = 'glyphicon glyphicon-remove-sign';
                $style = 'color: red';
                break;
            case Post::STATUS_PUBLISH:
                $class = 'glyphicon glyphicon-ok-sign';
                $style = 'color: green';
                break;
            default:
                $class = 'glyphicon glyphicon-remove-sign';
                $style = 'color: red';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusIcon(), $status), [
            'class' => $class,
            'style' => $style,
        ]);
    }
}