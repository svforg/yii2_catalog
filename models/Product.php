<?php

namespace app\models;

use function foo\func;
use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use app\models\Seo;
use app\models\Tree;
use app\models\Feature;
use yii\helpers\Html;


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
    const IMAGE_PATH = 'products/';
    public $file;

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
            [['description'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['image', 'url'], 'string', 'max' => 255],
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
        return $this->hasOne(Seo::className(), ['entity_id' => 'id' ])->andWhere(['entity_type' => Product::className()]);
    }

    public function getTree()
    {
        return $this->hasOne(Tree::className(), ['id' => 'category_id']);
    }

    public function getTreeName()
    {
        return (isset($this->tree) ? $this->tree->name: 'Не задано' );
    }

    public static function getStatusList()
    {
        return [
            Html::a('<i class="fa fa-toggle-off" aria-hidden="true"></i>'),
            Html::a('<i class="fa fa-toggle-on" aria-hidden="true"></i>'),
        ];
    }

    public function getStatusName()
    {
        $list = $this->getStatusList();
        return $list[$this->status];
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
            ],

        ];
    }

}
