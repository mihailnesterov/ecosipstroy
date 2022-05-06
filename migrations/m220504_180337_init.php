<?php

use yii\db\Migration;

/**
 * Class m220504_180337_init
 */
class m220504_180337_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%user}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'email' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(100)->notNull(),
            'auth_key' => $this->string(255)->defaultValue(null),
            'token' => $this->string(50)->defaultValue(null),
            'firstName' => $this->string(100)->defaultValue(null),
            'lastName' => $this->string(100)->defaultValue(null),
            'phone' => $this->string(100)->defaultValue(null),
            'address' => $this->string(255)->defaultValue(null),
            'role' => $this->string(100)->defaultValue('user'),
            'status' => $this->boolean()->defaultValue(1),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица пользователей');

            $comments = [
                'id' => 'id пользователя',
                'email' => 'Email',
                'password' => 'Пароль',
                'auth_key' => 'Authorization Key',
                'token' => 'Токен',
                'firstName' => 'Имя',
                'lastName' => 'Фамилия',
                'phone' => 'Телефон',
                'address' => 'Адрес',
                'role' => 'Роль',
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
        $this->dropTable('{{%user}}');
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
