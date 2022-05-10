<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%option_type}}`.
 */
class m220507_212443_create_option_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%option_type}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'icon_id' => $this->integer(11),
            'name' => $this->string(255)->notNull()->unique(),
            'description' => $this->text()->defaultValue(null),
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица типов опций');

            $comments = [
                'id' => 'id типа',
                'icon_id' => 'id иконки типа',
                'name' => 'Название типа',
                'description' => 'Описание'
            ];

            foreach ($comments as $key => $value) {
                if( !empty($table->getColumn($key)) ) {
                    $this->addCommentOnColumn($tableName, $key, $value);
                }
            }

            $this->addForeignKey(
                'fk-option-type-id', 
                'option', 
                'type_id', 
                'option_type', 
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
        $this->dropForeignKey('fk-option-type-id', 'option');
        $this->dropTable('{{%option_type}}');
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
