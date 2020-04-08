<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property int $id
 * @property string|null $seo_title
 * @property string|null $seo_descr
 * @property string|null $seo_slug
 *
 * @property Product[] $products
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seo_title', 'seo_slug'], 'string', 'max' => 255],
            [['seo_descr'], 'string', 'max' => 320],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seo_title' => 'Seo Title',
            'seo_descr' => 'Seo Descr',
            'seo_slug' => 'Seo Slug',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['seo_id' => 'id']);
    }
}
