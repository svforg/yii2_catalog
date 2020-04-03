<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string|null $subject
 * @property string|null $text
 * @property int|null $created_at
 * @property int|null $product_id
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['text'], 'string'],
            [['created_at', 'product_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 60],
            [['phone'], 'string', 'max' => 11],
            [['subject'], 'string', 'max' => 2048],
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
            'email' => 'Email',
            'phone' => 'Phone',
            'subject' => 'Subject',
            'text' => 'Text',
            'created_at' => 'Created At',
            'product_id' => 'Product ID',
        ];
    }
}
