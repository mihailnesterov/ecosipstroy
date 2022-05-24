<?php

use yii\db\Migration;

/**
 * Class m220524_105620_insert_icons
 */
class m220524_105620_insert_icons extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = '{{%icon}}';

        $icons = [
            'fas fa-home',
            'fas fa-bars',
            'fas fa-coins',
            'fas fa-square',
            'fas fa-building',
            'fas fa-warehouse',
            'fas fa-chevron-up',
            'fas fa-th-large',
            'fas fa-arrows-alt-v',
            'fas fa-arrows-alt-h',
            'fas fa-grip-lines-vertical',
            'fas fa-paint-roller',
            'fas fa-border-all',
            'fas fa-door-open',
        ];

        foreach($icons as $key => $value) {
            $this->insert($tableName, [
                'id' => intval($key + 1),
                'name' => $value
            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return app\models\Icon::deleteAll();
    }

}
