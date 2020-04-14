<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%seo}}`.
 */
class m200406_130707_create_seo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%seo}}', [
            'id' => $this->primaryKey(),
            'entity_id' => $this->integer(),
            'entity_type' => $this->string(),
            'seo_title' => $this->string(255),
            'seo_descr' => $this->string(320),
            'seo_slug' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%seo}}');
    }
}
