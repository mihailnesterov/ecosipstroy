<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m220510_205453_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%client}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'company' => $this->string(255),
            'contact' => $this->string(255),
            'phone' => $this->string(100),
            'email' => $this->string(100),
            'inn' => $this->string(50),
            'kpp' => $this->string(50),
            'address' => $this->string(255),
            'bank' => $this->string(255),
            'bik' => $this->string(50),
            'account' => $this->string(50),
            'corrAccount' => $this->string(50),
            'description' => $this->string(255),
            'status' => $this->boolean()->defaultValue(1),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица клиентов');

            $comments = [
                'id' => 'id клиента',
                'company' => 'Название компании',
                'contact' => 'Контактное лицо',
                'phone' => 'Телефон',
                'email' => 'Email',
                'inn' => 'ИНН',
                'kpp' => 'КПП',
                'address' => 'Адрес',
                'bank' => 'Банк',
                'bik' => 'БИК',
                'account' => 'Банковский счет',
                'corrAccount' => 'Корреспондентский счет',
                'description' => 'Описание',
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
        $this->dropTable('{{%client}}');
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
