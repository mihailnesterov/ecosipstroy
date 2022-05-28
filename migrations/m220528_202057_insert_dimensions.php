<?php

use yii\db\Migration;

/**
 * Class m220528_202057_insert_dimensions
 */
class m220528_202057_insert_dimensions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $dimensions = [
            ['name' => 'мм', 'description' => 'миллиметр'],
            ['name' => 'см', 'description' => 'сантиметр'],
            ['name' => 'м', 'description' => 'метр'],
            ['name' => 'м<sup>2</sup>', 'description' => 'метр квадратный'],
            ['name' => 'м<sup>3</sup>', 'description' => 'метр кубический'],
            ['name' => 'шт', 'description' => 'штук']
        ];

        foreach($dimensions as $key => $dimension) {
            $this->insert('{{%dimension}}', [
                'name' => $dimension['name'],
                'description' => $dimension['description']
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        app\models\Dimension::deleteAll();
    }

}
