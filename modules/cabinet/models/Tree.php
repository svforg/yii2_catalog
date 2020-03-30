<?php

namespace app\modules\cabinet\models;

//use http\Url;
use \yii\image\drivers\Image;
use Yii;
//use yii\image\drivers\Image;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
//use kartik\file\FileInput;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tree".
 * @property string $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $lvl
 * @property string $name
 * @property string $url
 * @property string $icon
 * @property integer $icon_type
 * @property integer $active
 * @property integer $selected
 * @property integer $disabled
 * @property integer $readonly
 * @property integer $visible
 * @property integer $collapsed
 * @property integer $movable_u
 * @property integer $movable_d
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 * @property integer $child_allowed
 * @property integer $image
 * @property Feature $feature
 */
//class Tree extends \kartik\tree\models\Tree
class Tree extends ActiveRecord
{
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tree';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lft', 'rgt', 'lvl', 'icon_type', 'active', 'selected', 'disabled', 'readonly', 'visible', 'collapsed', 'movable_u', 'movable_d', 'movable_l', 'movable_r', 'removable', 'removable_all'], 'integer'],
            //[['name'], 'required'],
            [['name'], 'string', 'max' => 60],
            [['image'], 'string', 'max'=>2048],
            [['file'], 'file', 'extensions' => 'png, jpg',
                'skipOnEmpty' => false],
            [['icon'], 'string', 'max' => 255],
            [['root', 'id', 'lft', 'rgt', 'lvl', 'url', 'image'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'root' => 'Root',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'lvl' => 'Lvl',
            'name' => 'Name',
            'url' => 'Url',
            'icon' => 'Icon',
            'icon_type' => 'Icon Type',
            'active' => 'Активный',
            'selected' => 'Selected',
            'disabled' => 'Disabled',
            'readonly' => 'Readonly',
            'visible' => 'Visible',
            'collapsed' => 'Collapsed',
            'movable_u' => 'Movable U',
            'movable_d' => 'Movable D',
            'movable_l' => 'Movable L',
            'movable_r' => 'Movable R',
            'removable' => 'Removable',
            'removable_all' => 'Removable All',
            'image' => 'Изображение',
            'file' => 'Изображение',
        ];
    }

    public function uploadImageField($param) {
        if ( $file = UploadedFile::getInstance($param, 'file') ) {

            //определяем путь
            $dir = Yii::getAlias('@app/web/uploads/');


            // Задаем уникальное название файла
            $param->image = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;

            // Сохраняем файл
            $file->saveAs($dir.$param->image);

            // загружаем изображение для resize 50x50
            $imageFile = Yii::$app->image->load($dir.$param->image);

            // При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('50', '50', Image::INVERSE);
            $imageFile->crop('50', '50');
            //chmod($dir.'images/categories/800x/'.$this->image,0750);
            $imageFile->save($dir.'images/categories/50x50/'.$param->image, 90);

            // загружаем изображение для resize 800x
            $imageFile = Yii::$app->image->load($dir.$param->image);
            // При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('800', null, Image::INVERSE);
            //chmod($dir.'images/categories/800x/'.$this->image,0750);
            $imageFile->save($dir.'images/categories/800x/'.$param->image, 90);
        }
    }

    public function beforeSave($insert)
    {
        if (  $file = UploadedFile::getInstance($this, 'file') ) {

            $dir = Yii::getAlias('@app/web/uploads/');
            $this->image = strtotime('now') . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($dir . $this->image);

            // загружаем изображение для resize 50x50s
            $imageFile = Yii::$app->image->load($dir . $this->image);

            // При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('50', '50', Image::INVERSE);
            $imageFile->crop('50', '50');
            //chmod($dir.'images/categories/800x/'.$this->image,0750);
            $imageFile->save($dir . 'images/categories/50x50/' . $this->image, 90);

            // загружаем изображение для resize 800x
            $imageFile = Yii::$app->image->load($dir . $this->image);
            // При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('800', null, Image::INVERSE);
            //chmod($dir.'images/categories/800x/'.$this->image,0750);
            $imageFile->save($dir . 'images/categories/800x/' . $this->image, 90);
        }



        return parent::beforeSave($insert);
    }

//    public function isDisabled()
//    {
//        if (Yii::$app->user->username !== 'admin') {
//            return true;
//        }
//        return parent::isDisabled();
//    }
}
