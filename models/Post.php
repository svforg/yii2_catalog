<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 14.04.2020
 * Time: 12:58
 */

namespace app\models;


class Post
{
    const STATUS_DRAFT = 0; //черновик
    const STATUS_PUBLISH = 10; //опубликован

    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_DRAFT],
            ['status', 'in', 'range' => [self::STATUS_DRAFT, self::STATUS_PUBLISH]],
        ];
    }
}