<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200325_152449_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(2048)->notNull(),
            'description' => $this->text(),
            'filter' => 'JSON NOT NULL',
            'created_at' => $this->dateTime()->defaultExpression('NOW()'),
            'category_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-product-category_id',
            'product',
            'category_id'
        );

        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
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
            'fk-product-category_id',
            'product'
        );

        $this->dropIndex(
            'idx-product-category_id',
            'product'
        );

        $this->dropTable('{{%product}}');
    }
}
