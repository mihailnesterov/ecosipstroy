<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 */
class m220510_211210_create_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%order_item}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11),
            'name' => $this->string(255),
            'options' => $this->json(),
            'sum' => $this->money(11,2)->defaultValue(0.00),
            'count' => $this->integer()->unsigned()->defaultValue(1)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-order-item-orderId', 
            'order_item', 
            'order_id', 
            'order', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица пунктов заказа');

            $comments = [
                'id' => 'id пункта заказа',
                'order_id' => 'id заказа',
                'name' => 'Название товара',
                'options' => 'Опции товара',
                'sum' => 'Сумма, руб.',
                'count' => 'Количество'
            ];

            foreach ($comments as $key => $value) {
                if( !empty($table->getColumn($key)) ) {
                    $this->addCommentOnColumn($tableName, $key, $value);
                }
            }

        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order-item-orderId', 'order_item');
        $this->dropTable('{{%order_item}}');
    }

    /**
     * {@inheritdoc}
     */
    private function getTableOptions()
    {
        $tableOptions = null;
        
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        return $tableOptions;
    }
}
