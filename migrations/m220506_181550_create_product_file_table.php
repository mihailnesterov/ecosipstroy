<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_file}}`.
 */
class m220506_181550_create_product_file_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%product_file}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11),
            'file_id' => $this->integer(11)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-product-file-productId', 
            'product_file', 
            'product_id', 
            'product', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-file-fileId', 
            'product_file', 
            'file_id', 
            'file', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица связей товаров с файлами');

            $comments = [
                'id' => 'id',
                'product_id' => 'id товара',
                'file_id' => 'id файла'
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
        $this->dropForeignKey('fk-product-file-productId', 'product_file');
        $this->dropForeignKey('fk-product-file-fileId', 'product_file');
        $this->dropTable('{{%product_file}}');
    }

}
