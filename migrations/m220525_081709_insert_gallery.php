<?php

use yii\db\Migration;

/**
 * Class m220525_081709_insert_gallery
 */
class m220525_081709_insert_gallery extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $files = [
            ['name' => '24w1vmbz6lzcan4xzs8b', 'extention' => 'jpg'],
            ['name' => 'a0aphp9fluygaip3an3w', 'extention' => 'jpg'],
            ['name' => 'busudflnyckfkfn8pz8c', 'extention' => 'jpg'],
            ['name' => 'f4ab33sbm1e386bnxdbo', 'extention' => 'jpg'],
            ['name' => 'ipmjy5ckmni3gyfoq4ls', 'extention' => 'jpg'],
            ['name' => 'p0ueuy8qoud7obx0test', 'extention' => 'jpg'],
            ['name' => 'sislpnkjihr966yl_jti', 'extention' => 'jpg'],
            ['name' => 'uxai0lcwcvguucrtzwvx', 'extention' => 'jpg'],
            ['name' => 'wsdugajosalgfumhgwcv', 'extention' => 'jpg'],
            ['name' => 'zjcqepvdue2kwr612n9b', 'extention' => 'jpg'],
        ];

        $images = [
            ['category' => 'Производство', 'description' => 'Описание'],
            ['category' => 'Производство', 'description' => 'Описание'],
            ['category' => 'Производство', 'description' => 'Описание'],
            ['category' => 'Строительство', 'description' => 'Описание'],
            ['category' => 'Строительство', 'description' => 'Описание'],
            ['category' => 'Строительство', 'description' => 'Описание'],
            ['category' => 'Строительство', 'description' => 'Описание'],
            ['category' => 'СИП-панели', 'description' => 'Описание'],
            ['category' => 'СИП-панели', 'description' => 'Описание'],
            ['category' => 'СИП-панели', 'description' => 'Описание'],
        ];

        foreach($files as $key => $file) {
            $date = new DateTime("2022-04-22 16:05:0$key");
            $this->insert('{{%file}}', [
                'id' => intval($key + 1),
                'name' => $file['name'],
                'extention' => $file['extention'],
                'created' => $date->format('Y-m-d H:i:s')
            ]);
        }

        foreach($images as $key => $image) {
            $this->insert('{{%gallery}}', [
                'id' => intval($key + 1),
                'file_id' => intval($key + 1),
                'category' => $image['category'],
                'description' => $image['description'] . ' ' . ($key + 1)
            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        app\models\File::deleteAll();
        app\models\Gallery::deleteAll();
    }

}
