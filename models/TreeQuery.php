<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 02.04.2020
 * Time: 17:36
 */

namespace app\models;

use yii\db\ActiveQuery;
use creocoder\nestedsets\NestedSetsQueryBehavior;

class TreeQuery extends  ActiveQuery
{
    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }
}