<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_source}}`.
 */
class m220510_215228_create_order_source_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%order_source}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'description' => $this->string(100)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-order-source-id', 
            'order', 
            'source_id', 
            'order_source', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица источников заказов');

            $comments = [
                'id' => 'id источника заказа',
                'name' => 'Название',
                'description' => 'Описание',
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
        $this->dropForeignKey('fk-order-source-id', 'order');
        $this->dropTable('{{%order_source}}');
    }

}
