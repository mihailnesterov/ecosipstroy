<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%settings}}`.
 */
class m220510_233307_create_settings_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%settings}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique(),
            'group' => $this->string(100),
            'value' => $this->string(50),
            'description' => $this->string(255)
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица настроек');

            $comments = [
                'id' => 'id настройки',
                'name' => 'Название',
                'group' => 'Группа',
                'value' => 'Значение',
                'description' => 'Описание'
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
        $this->dropTable('{{%settings}}');
    }

}
