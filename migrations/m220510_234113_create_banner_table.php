<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banner}}`.
 */
class m220510_234113_create_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%banner}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'file_id' => $this->integer(11),
            'name' => $this->string(255)->notNull()->unique(),
            'position' => $this->integer(11),
            'url' => $this->string(255),
            'text' => $this->text(),
            'description' => $this->string(255),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица баннеров');

            $comments = [
                'id' => 'id баннера',
                'file_id' => 'id файла',
                'name' => 'Название',
                'position' => '№ позиции',
                'url' => 'URL на ресурс',
                'text' => 'Текст',
                'description' => 'Описание',
                'created' => 'Дата создания'
            ];

            foreach ($comments as $key => $value) {
                if( !empty($table->getColumn($key)) ) {
                    $this->addCommentOnColumn($tableName, $key, $value);
                }
            }

            $this->addForeignKey(
                'fk-banner-file-id', 
                'banner', 
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
        $this->dropForeignKey('fk-banner-file-id', 'banner');
        $this->dropTable('{{%banner}}');
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
