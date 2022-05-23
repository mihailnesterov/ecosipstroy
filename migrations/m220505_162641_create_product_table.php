<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220505_162641_create_product_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%product}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'articul' => $this->string(10)->notNull()->unique(),
            'name' => $this->string(255)->notNull()->unique(),
            'excerpt' => $this->text(),
            'text' => $this->text(),
            'slug' => $this->string(255)->defaultValue(null)->unique(),
            'price' => $this->money(11,2)->defaultValue(0.00),
            'discount' => $this->integer()->defaultValue(null),
            'new' => $this->boolean()->defaultValue(0),
            'title' => $this->string(60),
            'keywords' => $this->string(255),
            'description' => $this->string(160),
            'status' => $this->boolean()->defaultValue(1),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица товаров');

            $comments = [
                'id' => 'id товара',
                'articul' => 'Артикул',
                'name' => 'Название товара',
                'excerpt' => 'Краткое описание',
                'text' => 'Описание',
                'slug' => 'URL товара',
                'price' => 'Цена, руб.',
                'discount' => 'Скидка %',
                'new' => 'Новинка',
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

        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }

}
