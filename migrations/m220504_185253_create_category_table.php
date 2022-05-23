<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m220504_185253_create_category_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%category}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'name' => $this->string(255)->notNull()->unique(),
            'text' => $this->text(),
            'file_id' => $this->integer(11),
            'icon_id' => $this->integer(11),
            'slug' => $this->string(255)->defaultValue(null)->unique(),
            'title' => $this->string(60),
            'keywords' => $this->string(255),
            'description' => $this->string(160),
            'status' => $this->boolean()->defaultValue(1)
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица категорий каталога товаров');

            $comments = [
                'id' => 'id категории',
                'parent_id' => 'id родительской категории',
                'name' => 'Название категории',
                'text' => 'Текст категории',
                'file_id' => 'id картинки категории',
                'icon_id' => 'id иконки категории',
                'slug' => 'URL категории',
                'title' => 'SEO-заголовок',
                'keywords' => 'SEO-keywords',
                'description' => 'SEO-описание',
                'status' => 'Статус'
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
        $this->dropTable('{{%category}}');
    }

}
