<?php

use yii\db\Migration;

/**
 * Class m220528_205710_insert_option_types
 */
class m220528_205710_insert_option_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $optionTypes = [
            ['icon_id' => 1, 'name' => 'Кровля', 'description' => ''],
            ['icon_id' => 12, 'name' => 'Отделка фасада', 'description' => ''],
            ['icon_id' => 4, 'name' => 'Цоколь', 'description' => ''],
            ['icon_id' => 13, 'name' => 'Окна', 'description' => ''],
            ['icon_id' => 14, 'name' => 'Двери', 'description' => '']
        ];

        foreach($optionTypes as $key => $type) {
            $this->insert('{{%option_type}}', [
                'id' => intval($key + 1),
                'icon_id' => $type['icon_id'],
                'name' => $type['name'],
                'description' => $type['description']
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        app\models\OptionType::deleteAll();
    }

}
