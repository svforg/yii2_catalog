<?php

namespace app\models;


use Yii;
use yii\db\ActiveRecord;
use app\components\ImageUploader;
use yii\web\UploadedFile;

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

class Tree extends \kartik\tree\models\Tree
//class Tree extends ActiveRecord
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
            [['image'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg',
                'skipOnEmpty' => true],
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


    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);


            $this->file = UploadedFile::getInstance($this->file, 'file');
            printArr($this);
//        $dir = Yii::getAlias('@app/web/uploads/');
//        $this->image = strtotime('now') . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $this->file->extension;
//        $this->file->saveAs($dir . 'images/categories/' . $this->image);

    }


}