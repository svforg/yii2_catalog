<?php

namespace app\modules\cabinet\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $phone
 * @property string $work_time
 * @property string|null $address
 * @property string|null $city
 * @property string|null $map_url
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'work_time'], 'required'],
            [['phone', 'address'], 'string', 'max' => 2048],
            [['work_time', 'city', 'map_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'work_time' => 'Work Time',
            'address' => 'Address',
            'city' => 'City',
            'map_url' => 'Map Url',
        ];
    }
}
