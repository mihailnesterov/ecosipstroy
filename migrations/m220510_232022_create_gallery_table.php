<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gallery}}`.
 */
class m220510_232022_create_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%gallery}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'file_id' => $this->integer(11),
            'category' => $this->string(100),
            'description' => $this->string(255),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица фотогалереи');

            $comments = [
                'id' => 'id фото',
                'file_id' => 'id файла',
                'category' => 'Категория',
                'description' => 'Описание',
                'created' => 'Дата создания'
            ];

            foreach ($comments as $key => $value) {
                if( !empty($table->getColumn($key)) ) {
                    $this->addCommentOnColumn($tableName, $key, $value);
                }
            }

            $this->addForeignKey(
                'fk-gallery-file-id', 
                'gallery', 
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
        $this->dropForeignKey('fk-gallery-file-id', 'gallery');
        $this->dropTable('{{%gallery}}');
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
