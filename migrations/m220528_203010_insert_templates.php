<?php

use yii\db\Migration;

/**
 * Class m220528_203010_insert_templates
 */
class m220528_203010_insert_templates extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $templates = [
            ['name' => 'СИП-дом', 'type' => 'house', 'description' => 'Шаблон для СИП-домов'],
            ['name' => 'СИП-панель', 'type' => 'pannel', 'description' => 'Шаблон для СИП-панелей'],
        ];

        foreach($templates as $key => $template) {
            $this->insert('{{%template}}', [
                'id' => intval($key + 1),
                'name' => $template['name'],
                'type' => $template['type'],
                'description' => $template['description']
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        app\models\Template::deleteAll();
    }

}
