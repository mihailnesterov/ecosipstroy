<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_tag}}`.
 */
class m220510_230337_create_news_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%news_tag}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(11),
            'tag_id' => $this->integer(11)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-news-tag-newsId', 
            'news_tag', 
            'news_id', 
            'news', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-news-tag-tagId', 
            'news_tag', 
            'tag_id', 
            'tag', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица связей новостей с тегами');

            $comments = [
                'id' => 'id',
                'news_id' => 'id новости',
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
        $this->dropForeignKey('fk-news-tag-newsId', 'news_tag');
        $this->dropForeignKey('fk-news-tag-tagId', 'news_tag');
        $this->dropTable('{{%news_tag}}');
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
