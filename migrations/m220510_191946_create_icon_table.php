<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%icon}}`.
 */
class m220510_191946_create_icon_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%icon}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique(),
            'status' => $this->boolean()->defaultValue(1)
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица иконок');

            $comments = [
                'id' => 'id иконки',
                'name' => 'Имя иконки',
                'status' => 'Статус'
            ];

            foreach ($comments as $key => $value) {
                if( !empty($table->getColumn($key)) ) {
                    $this->addCommentOnColumn($tableName, $key, $value);
                }
            }

            $this->addForeignKey(
                'fk-category-icon-id', 
                'category', 
                'icon_id', 
                'icon', 
                'id', 
                'CASCADE', 
                'CASCADE'
            );

            $this->addForeignKey(
                'fk-option-type-icon-id', 
                'option_type', 
                'icon_id', 
                'icon', 
                'id', 
                'CASCADE', 
                'CASCADE'
            );

        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-category-icon-id', 'category');
        $this->dropForeignKey('fk-option-type-icon-id', 'option_type');
        $this->dropTable('{{%icon}}');
    }

}
