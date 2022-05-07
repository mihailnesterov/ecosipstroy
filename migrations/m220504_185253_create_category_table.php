<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m220504_185253_create_category_table extends Migration
{
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
            'slug' => $this->string(255)->defaultValue(null)->unique(),
            'title' => $this->string(255)->defaultValue(null),
            'keywords' => $this->string(255)->defaultValue(null),
            'description' => $this->text()->defaultValue(null),
            'status' => $this->boolean()->defaultValue(1),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица категорий каталога товаров');

            $comments = [
                'id' => 'id категории',
                'parent_id' => 'id родительской категории',
                'name' => 'Название категории',
                'text' => 'Текст категории',
                'file_id' => 'Картинка категории',
                'slug' => 'URL категории',
                'title' => 'SEO-заголовок',
                'keywords' => 'SEO-keywords',
                'description' => 'SEO-описание',
                'status' => 'Статус',
                'created' => 'Дата создания'
            ];

            foreach ($comments as $key => $value) {
                if( !empty($table->getColumn($key)) ) {
                    $this->addCommentOnColumn($tableName, $key, $value);
                }
            }

            $this->insert($tableName, [
                'name'=>'Все',
                'text' => 'Каталог товаров производственно-строительной компании "ЭкоСИП строй"',
                'slug' =>'all',
                'title' => 'Каталог товаров',
                'keywords' => 'каталог товаров',
                'description' => 'Каталог товаров компании',
            ]);

        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
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
