<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use app\models\Seo;
use app\models\Feature;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property string|null $url
 * @property int|null $status
 * @property string|null $description
 * @property int|null $feature_id
 * @property int|null $created_at
 * @property int|null $category_id
 *
 * @property Feature $feature
 */
class Product extends ActiveRecord
{
    public $file;

    public $seo_title;
    public $seo_descr;
    public $seo_slug;
    public $feature;

    use \kartik\tree\models\TreeTrait;

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
            [['description', 'feature'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['image', 'url', 'seo_slug', 'seo_title'], 'string', 'max' => 255],
            [['seo_descr'], 'string', 'max' => 320],
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
            'url' => 'Url',
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

    /**
     * Gets query for [[Seo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeo()
    {
        return $this->hasOne(Seo::className(), ['id' => 'seo_id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at' ],
                    // ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
}
