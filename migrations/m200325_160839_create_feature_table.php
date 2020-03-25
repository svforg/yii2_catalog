<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%features}}`.
 */
class m200325_160839_create_feature_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feature}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feature}}');
    }
}
