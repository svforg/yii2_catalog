<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int|null $status
 * @property string|null $subject
 * @property string|null $text
 * @property int|null $created_at
 */
class News extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_at'], 'integer'],
            [['text'], 'string'],
            [['name', 'subject'], 'string', 'max' => 2048],
            [['image'], 'string', 'max' => 255],
            [['image', 'file'], 'safe'],
            [['file'], 'file', 'extensions' => 'png, jpg',
                'skipOnEmpty' => true],
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
            'subject' => 'Subject',
            'text' => 'Text',
            'created_at' => 'Created At',
        ];
    }
}
