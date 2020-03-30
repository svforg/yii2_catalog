<?php

namespace app\modules\cabinet\models;

use Yii;
use yii\image\drivers\Image;
use yii\web\UploadedFile;

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

    public function saveImageFile($param)
    {
        $param->file = UploadedFile::getInstance($param, 'file');

        if ( !empty($param->file) ) {
            return $param->image = strtotime('now') . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $param->file->extension;

            $dir = Yii::getAlias('@app/web/uploads/');

// загружаем изображение для resize 50x50s
            $imageFile = Yii::$app->image->load($dir  . 'images/categories/' . $param->image);

// При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('50', '50', Image::INVERSE);
            $imageFile->crop('50', '50');
            $imageFile->save($dir . 'images/categories/50x50/' . $param->image, 90);

// загружаем изображение для resize 800x
            $imageFile = Yii::$app->image->load($dir . 'images/categories/' . $param->image);
// При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('800', null, Image::INVERSE);
            $imageFile->save($dir . 'images/categories/800x/' . $param->image, 90);
        }

    }
}
