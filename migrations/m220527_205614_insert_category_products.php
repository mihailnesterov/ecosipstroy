<?php

use yii\db\Migration;

/**
 * Class m220527_205614_insert_category_products
 */
class m220527_205614_insert_category_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for($i = 1; $i < 15; $i++) {
            $this->insert('{{%category_product}}', [
                'category_id' => 1,
                'product_id' => intval($i),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        app\models\CategoryProduct::deleteAll();
    }

}
