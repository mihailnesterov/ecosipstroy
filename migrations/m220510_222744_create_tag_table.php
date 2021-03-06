<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tag}}`.
 */
class m220510_222744_create_tag_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%tag}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique(),
            'slug' => $this->string(255)->notNull()->unique(),
            'title' => $this->string(60),
            'keywords' => $this->string(255),
            'description' => $this->string(160),
            'status' => $this->boolean()->defaultValue(1)
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица тегов');

            $comments = [
                'id' => 'id тега',
                'name' => 'Название',
                'slug' => 'URL тега',
                'title' => 'SEO-заголовок',
                'keywords' => 'SEO-keywords',
                'description' => 'SEO-описание',
                'status' => 'Статус',
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
        $this->dropTable('{{%tag}}');
    }

}
