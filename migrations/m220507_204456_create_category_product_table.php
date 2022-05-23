<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_product}}`.
 */
class m220507_204456_create_category_product_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%category_product}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11),
            'product_id' => $this->integer(11)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-category-product-categoryId', 
            'category_product', 
            'category_id', 
            'category', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-category-product-productId', 
            'category_product', 
            'product_id', 
            'product', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица связей категорий с товарами');

            $comments = [
                'id' => 'id',
                'category_id' => 'id категории',
                'product_id' => 'id товара'
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
        $this->dropForeignKey('fk-category-product-categoryId', 'category_product');
        $this->dropForeignKey('fk-category-product-productId', 'category_product');
        $this->dropTable('{{%category_product}}');
    }

}
