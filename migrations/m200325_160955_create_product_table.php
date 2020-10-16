<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200325_160955_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(60)->notNull(),
            'image' => $this->string(255),
            'url' => $this->string(255),
            'status' => $this->boolean()->defaultValue(false),
            'description' => $this->text(),
            'feature_id' =>  $this->integer(),
            'created_at' => $this->integer(),
            'category_id' => $this->integer(),
            'seo_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-product-feature_id',
            'product',
            'feature_id'
        );

        $this->addForeignKey(
            'fk-product-feature_id',
            'product',
            'feature_id',
            'feature',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-product-feature_id',
            'product'
        );

        $this->dropIndex(
            'idx-product-feature_id',
            'product'
        );

        $this->dropTable('{{%product}}');
    }
}
