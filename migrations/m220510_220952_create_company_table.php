<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company}}`.
 */
class m220510_220952_create_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = $this->getTableOptions();

        $tableName = '{{%company}}';

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'jurName' => $this->string(255),
            'phone1' => $this->string(100),
            'phone2' => $this->string(100),
            'email' => $this->string(100),
            'inn' => $this->string(50),
            'kpp' => $this->string(50),
            'address' => $this->string(512),
            'jurAddress' => $this->string(512),
            'bank' => $this->string(255),
            'bik' => $this->string(50),
            'account' => $this->string(50),
            'corrAccount' => $this->string(50),
            'about' => $this->text(),
            'map' => $this->text(),
            'vk' => $this->string(255),
            'whatsapp' => $this->string(255),
            'viber' => $this->string(255),
            'telegram' => $this->string(255),
            'title' => $this->string(60),
            'keywords' => $this->string(255),
            'description' => $this->string(160),
            'status' => $this->boolean()->defaultValue(1),
            'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);

        $table = $this->getDb()->getSchema()->getTableSchema($tableName);
        
        if( isset($table) ) {

            $this->addCommentOnTable($tableName, 'Таблица компаний');

            $comments = [
                'id' => 'id компании',
                'name' => 'Название компании',
                'jurName' => 'Юридическое название',
                'phone1' => 'Телефон 1',
                'phone2' => 'Телефон 2',
                'email' => 'Email',
                'inn' => 'ИНН',
                'kpp' => 'КПП',
                'address' => 'Адрес',
                'jurAddress' => 'Юридический адрес',
                'bank' => 'Банк',
                'bik' => 'БИК',
                'account' => 'Банковский счет',
                'corrAccount' => 'Корреспондентский счет',
                'about' => 'О компании',
                'map' => 'Карта',
                'vk' => 'ВКонтакте',
                'whatsapp' => 'WhatsApp',
                'viber' => 'Viber',
                'telegram' => 'Telegram',
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
        $this->dropTable('{{%company}}');
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
