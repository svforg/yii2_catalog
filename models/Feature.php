<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feature".
 *
 * @property int $id
 * @property string|null $text
 *
 * @property Product[] $blog
 */
class Feature extends \yii\db\ActiveRecord
{
    public $feature;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['feature_id' => 'id']);
    }
}
