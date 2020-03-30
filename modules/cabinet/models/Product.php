<?php

namespace app\modules\cabinet\models;

use Yii;
use yii\image\drivers\Image;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int|null $status
 * @property string|null $description
 * @property int|null $feature_id
 * @property int|null $created_at
 * @property int|null $category_id
 *
 * @property Feature $feature
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'feature_id', 'created_at', 'category_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 2048],
            [['image'], 'string', 'max' => 255],
            [['image', 'file'], 'safe'],
            [['file'], 'file', 'extensions' => 'png, jpg',
                'skipOnEmpty' => true],
            [['feature_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feature::className(), 'targetAttribute' => ['feature_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Изображение',
            'file' => 'Изображение',
            'status' => 'Status',
            'description' => 'Description',
            'feature_id' => 'Feature ID',
            'created_at' => 'Created At',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Feature]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeature()
    {
        return $this->hasOne(Feature::className(), ['id' => 'feature_id']);
    }


}
