<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact}}`.
 */
class m200325_161922_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(2048)->notNull(),
            'work_time' => $this->string()->notNull(),
            'address' => $this->string(2048),
            'city' => $this->string(),
            'map_url' => $this->string(),
            //'city_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }
}
