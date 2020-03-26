<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tree}}`.
 */
class m200326_135940_add_image_url_column_to_tree_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tree}}', 'image_url', $this->string(100));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tree}}', 'image_url');
    }
}
