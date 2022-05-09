<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%option}}`.
 */
class m220507_211538_create_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%option}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique(),
            'type_id' => $this->integer(11),
            'group_id' => $this->integer(11),
            'value' => $this->string(255)->defaultValue(null),
            'price' => $this->money(11,2)->defaultValue(null),
            'description' => $this->text()->defaultValue(null)
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица опций шаблонов');

            $comments = [
                'id' => 'id опции',
                'name' => 'Название опции',
                'type_id' => 'id типа опции',
                'group_id' => 'id группы опции',
                'value' => 'Значение',
                'price' => 'Цена, руб.',
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
        $this->dropTable('{{%option}}');
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
