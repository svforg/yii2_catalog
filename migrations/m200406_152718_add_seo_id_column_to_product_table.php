<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m200406_152718_add_seo_id_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'seo_id', $this->integer());

        $this->createIndex(
            'idx-product-seo_id',
            'product',
            'seo_id'
        );

        $this->addForeignKey(
            'fk-product-seo_id',
            'product',
            'seo_id',
            'seo',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-product-seo_id',
            'product'
        );

        $this->dropIndex(
            'idx-product-seo_id',
            'product'
        );

        $this->dropColumn('{{%product}}', 'seo_id');
    }
}
