<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%template_option}}`.
 */
class m220509_174759_create_template_option_table extends Migration
{
    use \app\traits\MigrationTrait;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%template_option}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'template_id' => $this->integer(11),
            'option_id' => $this->integer(11),
            'value' => $this->string(255)->defaultValue(null),
            'dimension_id' => $this->integer(11),
            'price' => $this->money(11,2)->defaultValue(null)
        ], $tableOptions);

        $this->addForeignKey(
            'fk-template-option-templateId', 
            'template_option', 
            'template_id', 
            'template', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-template-option-optionId', 
            'template_option', 
            'option_id', 
            'option', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);

        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица связей шаблонов с опциями');

            $comments = [
                'id' => 'id',
                'template_id' => 'id шаблона',
                'option_id' => 'id опции',
                'value' => 'Значение опции',
                'dimention_id' => 'id размерности',
                'price' => 'Цена, руб.'
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
        $this->dropForeignKey('fk-template-option-templateId', 'template_option');
        $this->dropForeignKey('fk-template-option-optionId', 'template_option');
        $this->dropTable('{{%template_option}}');
    }

}
