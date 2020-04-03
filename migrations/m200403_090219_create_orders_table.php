<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m200403_090219_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(60)->notNull(),
            'email' => $this->string(60)->notNull(),
            'phone' => $this->string(11),
            'subject' => $this->string(2048),
            'text' => $this->text(),
            'created_at' => $this->integer(),
            'product_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-orders-product_id',
            'orders'
        );

        $this->dropIndex(
            'idx-orders-product_id',
            'orders'
        );

        $this->dropTable('{{%orders}}');
    }
}
