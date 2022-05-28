<?php

use yii\db\Migration;

/**
 * Class m220528_213514_insert_option_groups
 */
class m220528_213514_insert_option_groups extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $optionGroups = [
            ['name' => 'roofing', 'description' => 'Кровельный материал'],
            ['name' => 'ventilation', 'description' => 'Вентиляционные выходы'],
            ['name' => 'drain', 'description' => 'Водосток'],
            ['name' => 'overhangs', 'description' => 'Подшивка кровельных свесов'],
            ['name' => 'facade', 'description' => 'Материал для отделки фасада'],
            ['name' => 'plinth', 'description' => 'Материал для отделки цоколя'],
            ['name' => 'windows', 'description' => 'Окна'],
            ['name' => 'doors', 'description' => 'Двери']
        ];

        foreach($optionGroups as $key => $group) {
            $this->insert('{{%option_group}}', [
                'id' => intval($key + 1),
                'name' => $group['name'],
                'description' => $group['description']
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        app\models\OptionGroup::deleteAll();
    }

}
