<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "seo".
 *
 * @property int $id
 * @property int|null $entity_id
 * @property string|null $entity_type
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
            [['entity_id'], 'integer'],
            [['entity_type', 'seo_title', 'seo_slug'], 'string', 'max' => 255],
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
            'entity_id' => 'Entity ID',
            'entity_type' => 'Entity Type',
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
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['entity_id' => 'id']);
    }

    public function saveData($model)
    {
        $this->seo_title ? $this->seo_title : $model->name;

        $this->entity_id = $model->id;
        $this->entity_type = get_class($model);

        $this->save();
    }

    function getSeoSlug($model, $event){//return slug

        $productId = $model->owner->id;

        $seo = Seo::find()->where(['entity_id' => $productId])->one();

        $slug = $seo->seo_slug;

        return $slug;
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'immutable' => true,//неизменный
                'ensureUnique'=>true,//генерировать уникальный
                'attribute' => null,
                'slugAttribute' => 'seo_slug',
                'value' => function ($event){//return slug

                    $productId = $this->owner->entity_id;

                    $product = Product::findOne($productId);

                    $slug = strtolower($product->name);

                    return $slug;
                },
            ],

        ];
    }
}
