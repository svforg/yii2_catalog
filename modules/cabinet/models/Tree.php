<?php

namespace app\modules\cabinet\models;

use http\Url;
use Yii;
use yii\image\drivers\Image;
use yii\web\UploadedFile;
use kartik\file\FileInput;

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
 * @property integer $image_url
 *
 * @property Feature $feature
 */
class Tree extends \kartik\tree\models\Tree
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
            [['name'], 'required'],
            [['name'], 'string', 'max' => 60],
            [[], 'string', 'max' => 100],
            [['image_url'], 'string', 'max' => 100],
            [['file'], 'image'],
            [['icon'], 'string', 'max' => 255],
            [['root', 'id', 'lft', 'rgt', 'lvl', 'url' ], 'safe']

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
            'image_url' => 'Изображение',
            'file' => 'Изображение',
        ];
    }

    public function showAttachment()
    {
        $dir = Url::home(true).'/uploads/images/categories/';

        return $dir.'50x50/'.$this->image;
    }

    public function beforeSave($insert)
    {


        if ( $file = UploadedFile::getInstance($this, 'file') ) {

            var_dump( $file);
            //определяем путь
            $dir = Yii::getAlias('@images') . '/categories/';

            // Удаляем скопированные файлы
            if ( file_exists($dir.$this->image ) ) {

                unlink($dir.$this->image );
            }
            // Удаляем скопированные файлы
            if ( file_exists($dir.'50x50/'.$this->image ) ) {

                unlink($dir.'50x50/'.$this->image );
            }
            // Удаляем скопированные файлы
            if ( file_exists($dir.'800x/'.$this->image ) ) {

                unlink($dir.'800x/'.$this->image );
            }

            // Задаем уникальное название файла
            $this->image = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;

            // Сохраняем файл
            $file->saveAs($dir.$this->image);

            // загружаем изображение для resize 50x50
            $imageFile = Yii::$app->image->load($dir.$this->image);
            // При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('50', '50', Image::INVERSE);
            $imageFile->crop('50', '50');
            $imageFile->save($dir.'50x50/'.$this->image, 90);

            // загружаем изображение для resize 800x
            $imageFile = Yii::$app->image->load($dir.$this->image);
            // При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('800', null, Image::INVERSE);
            $imageFile->save($dir.'800x/'.$this->image, 90);

        }

        return parent::beforeSave($insert);
    }
}
