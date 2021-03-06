<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%template}}`.
 */
class m220506_162830_create_template_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%template}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique(),
            'type' => $this->string(50)->notNull(),
            'description' => $this->string(255)->defaultValue(null),
            'status' => $this->boolean()->defaultValue(1)
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица шаблонов товаров');

            $comments = [
                'id' => 'id товара',
                'name' => 'Название',
                'type' => 'Тип шаблона',
                'description' => 'Описание',
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
        $this->dropTable('{{%template}}');
    }

}
