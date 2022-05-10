<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_tag}}`.
 */
class m220510_223334_create_product_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%product_tag}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11),
            'tag_id' => $this->integer(11)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-product-tag-productId', 
            'product_tag', 
            'product_id', 
            'product', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-tag-tagId', 
            'product_tag', 
            'tag_id', 
            'tag', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица связей товаров с тегами');

            $comments = [
                'id' => 'id',
                'product_id' => 'id товара',
                'tag_id' => 'id тега'
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
        $this->dropForeignKey('fk-product-tag-productId', 'product_tag');
        $this->dropForeignKey('fk-product-tag-tagId', 'product_tag');
        $this->dropTable('{{%product_tag}}');
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
