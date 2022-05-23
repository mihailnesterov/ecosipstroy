<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dimension}}`.
 */
class m220509_183009_create_dimension_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%dimension}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'description' => $this->string(255)->defaultValue(null)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-template-option-dimensionId', 
            'template_option', 
            'dimension_id', 
            'dimension', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица размерностей');

            $comments = [
                'id' => 'id размерности',
                'name' => 'Название',
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
        $this->dropForeignKey('fk-template-option-dimensionId', 'template_option');
        $this->dropTable('{{%dimension}}');
    }

}
