<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%file}}`.
 */
class m220505_184552_create_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%file}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique(),
            'extention' => $this->string(10)->notNull(),
            'status' => $this->boolean()->defaultValue(1),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица файлов');

            $comments = [
                'id' => 'id файла',
                'name' => 'Имя файла',
                'extention' => 'Расширение файла',
                'status' => 'Статус',
                'created' => 'Дата создания'
            ];

            foreach ($comments as $key => $value) {
                if( !empty($table->getColumn($key)) ) {
                    $this->addCommentOnColumn($tableName, $key, $value);
                }
            }

            $this->addForeignKey(
                'fk-category-file-id', 
                'category', 
                'file_id', 
                'file', 
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
        $this->dropForeignKey('fk-category-file-id', 'category');
        $this->dropTable('{{%file}}');
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
