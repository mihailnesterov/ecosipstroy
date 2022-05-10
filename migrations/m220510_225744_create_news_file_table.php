<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_file}}`.
 */
class m220510_225744_create_news_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%news_file}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(11),
            'file_id' => $this->integer(11)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-news-file-newsId', 
            'news_file', 
            'news_id', 
            'news', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-news-file-fileId', 
            'news_file', 
            'file_id', 
            'file', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица связей новостей с файлами');

            $comments = [
                'id' => 'id',
                'news_id' => 'id новости',
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
        $this->dropForeignKey('fk-news-file-newsId', 'news_file');
        $this->dropForeignKey('fk-news-file-fileId', 'news_file');
        $this->dropTable('{{%news_file}}');
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
