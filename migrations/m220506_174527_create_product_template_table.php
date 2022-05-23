<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_template}}`.
 */
class m220506_174527_create_product_template_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%product_template}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11),
            'template_id' => $this->integer(11)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-product-template-productId', 
            'product_template', 
            'product_id', 
            'product', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-template-templateId', 
            'product_template', 
            'template_id', 
            'template', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица связей шаблонов с товарами');

            $comments = [
                'id' => 'id',
                'product_id' => 'id товара',
                'template_id' => 'id шаблона'
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
        $this->dropForeignKey('fk-product-template-productId', 'product_template');
        $this->dropForeignKey('fk-product-template-templateId', 'product_template');
        $this->dropTable('{{%product_template}}');
    }

}
