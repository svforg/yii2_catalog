<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tree}}`.
 */
class m200326_144021_add_url_column_to_tree_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tree}}', 'url', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tree}}', 'url');
    }
}
