<?php

use yii\db\Migration;

/**
 * Class m220527_184109_insert_products
 */
class m220527_184109_insert_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $houseFiles = [
            ['name' => 'gg8ejow-fqhk3fhsdmhn', 'extention' => 'jpg'],
            ['name' => 'pkznw4wia-vvbt5vcvzr', 'extention' => 'jpg'],
            ['name' => 'kagy42edmiildwlarq5e', 'extention' => 'jpg'],
            ['name' => 'nkraeaihedbmyzpfrgxr', 'extention' => 'jpg'],
            ['name' => 'opvvz6dpzgrm-c6u7khx', 'extention' => 'jpg'],
            ['name' => 'p_gf68lupmkt7n2nerd8', 'extention' => 'jpg'],
            ['name' => 'rsr8ejixsf7hmyayth5b', 'extention' => 'jpg'],
        ];

        $house = [            
            'articul' => '1000', 
            'name' => 'СИП-дом',
            'excerpt' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'text' => "<h2>Описание</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <h2>Характеристики</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <h2>Доставка</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <h2>Сборка</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>",
            'slug' => 'sip-house',
            'price' => 1456850,
            'discount' => NULL,
            'new' => 1,
            'title' => 'СИП-дом',
            'keywords' => 'Lorem Ipsum is simply dummy',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        ];

        foreach($houseFiles as $key => $file) {
            $date = new DateTime("2022-04-25 14:22:0$key");
            $this->insert('{{%file}}', [
                'id' => intval($key + 11),
                'name' => $file['name'],
                'extention' => $file['extention'],
                'created' => $date->format('Y-m-d H:i:s')
            ]);
        }

        for($i = 1; $i < 15; $i++) {
            $this->insert('{{%product}}', [
                'id' => intval($i),
                'articul' => intval($house['articul'] + $i),
                'name' => $house['name'] . ' ' . intval($i),
                'excerpt' => $house['excerpt'],
                'text' => $house['text'],
                'slug' => $house['slug'] . '-' . intval($i),
                'price' => $house['price'],
                'discount' => ($i === 5 || $i === 6 || $i === 8 || $i === 10) ? 5 : NULL,
                'new' => ($i === 1 || $i === 2 || $i === 3 || $i === 4) ? 1 : 0,
                'title' => $house['name'] . ' ' . intval($i),
                'keywords' => 'lorem ipsum is simply dummy',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            ]);
        }

        for($i = 1; $i < 15; $i++) {
            for($j = 11; $j <= 17; $j++) {
                $this->insert('{{%product_file}}', [
                    'product_id' => intval($i),
                    'file_id' => intval($j),
                ]);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        app\models\File::deleteAll();
        app\models\Product::deleteAll();
    }

}
