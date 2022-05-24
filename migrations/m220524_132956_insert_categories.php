<?php

use yii\db\Migration;

/**
 * Class m220524_132956_insert_categories
 */
class m220524_132956_insert_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = '{{%category}}';

        // houses

        $this->insert($tableName, [
            'id' => 1,
            'parent_id' => 0,
            'icon_id' => 1,
            'name'=>'СИП-дома',
            'text' => 'Каталог домокомплектов из СИП-панелей производственно-строительной компании "ЭкоСИП строй"',
            'slug' =>'sip-houses',
            'title' => 'СИП-дома',
            'keywords' => 'купить домокомплект из сип панелей',
            'description' => 'Каталог домов из СИП-панелей, заказать домокомплект с доставкой',
        ]);

        $this->insert($tableName, [
            'id' => 2,
            'parent_id' => 0,
            'icon_id' => 2,
            'name'=>'СИП-панели',
            'text' => 'Каталог СИП-панелей производственно-строительной компании "ЭкоСИП строй"',
            'slug' =>'sip-pannels',
            'title' => 'СИП-панели',
            'keywords' => 'купить сип панели',
            'description' => 'Каталог СИП-панелей от производителя',
        ]);

        $this->insert($tableName, [
            'id' => 3,
            'parent_id' => 1,
            'icon_id' => 6,
            'name'=>'Тип помещения',
            'text' => '',
            'slug' =>'house-type',
            'title' => 'Тип помещения',
            'keywords' => 'выбрать тип помещения',
            'description' => 'Выбрать тип помещения',
        ]);

        $this->insert($tableName, [
            'id' => 4,
            'parent_id' => 3,
            'name'=>'Жилой дом',
            'text' => '',
            'slug' =>'house',
            'title' => 'Жилой дом',
            'keywords' => 'Жилой дом',
            'description' => 'Жилой дом',
        ]);

        $this->insert($tableName, [
            'id' => 5,
            'parent_id' => 3,
            'name'=>'Дачный дом',
            'text' => '',
            'slug' =>'country-house',
            'title' => 'Дачный дом',
            'keywords' => 'Дачный дом',
            'description' => 'Дачный дом',
        ]);

        $this->insert($tableName, [
            'id' => 6,
            'parent_id' => 3,
            'name'=>'Садовый дом',
            'text' => '',
            'slug' =>'garden-house',
            'title' => 'Садовый дом',
            'keywords' => 'Садовый дом',
            'description' => 'Садовый дом',
        ]);

        $this->insert($tableName, [
            'id' => 7,
            'parent_id' => 1,
            'icon_id' => 5,
            'name'=>'Этажность',
            'text' => '',
            'slug' =>'floors',
            'title' => 'Этажность',
            'keywords' => 'выбрать количество этажей',
            'description' => 'Выбрать количество этажей',
        ]);

        $this->insert($tableName, [
            'id' => 8,
            'parent_id' => 7,
            'name'=>'1 этаж',
            'text' => '',
            'slug' =>'one-floor',
            'title' => '1 этаж',
            'keywords' => 'одноэтажный дом',
            'description' => 'Одноэтажный дом',
        ]);

        $this->insert($tableName, [
            'id' => 9,
            'parent_id' => 7,
            'name'=>'1.5 этажа',
            'text' => '',
            'slug' =>'attic-floor',
            'title' => '1.5 этажа',
            'keywords' => 'дом с мансардным этажом',
            'description' => 'Дом с мансардным этажом',
        ]);

        $this->insert($tableName, [
            'id' => 10,
            'parent_id' => 7,
            'name'=>'2 этажа',
            'text' => '',
            'slug' =>'two-floors',
            'title' => '2 этажа',
            'keywords' => 'двухэтажный дом',
            'description' => 'Двухэтажный дом',
        ]);

        $this->insert($tableName, [
            'id' => 11,
            'parent_id' => 1,
            'icon_id' => 4,
            'name'=>'Площадь',
            'text' => '',
            'slug' =>'square',
            'title' => 'Площадь',
            'keywords' => 'выбрать площадь',
            'description' => 'Выбрать площадь',
        ]);

        $this->insert($tableName, [
            'id' => 12,
            'parent_id' => 11,
            'name'=>'Менее 100 м2',
            'text' => '',
            'slug' =>'less-100-m2',
            'title' => 'Площадь менее 100 м2',
            'keywords' => 'площадь менее 100 м2',
            'description' => 'Площадь постройки менее 100 м2',
        ]);

        $this->insert($tableName, [
            'id' => 13,
            'parent_id' => 11,
            'name'=>'100-150 м2',
            'text' => '',
            'slug' =>'100-150-m2',
            'title' => '100-150 м2',
            'keywords' => 'площадь 100-150 м2',
            'description' => 'Площадь постройки 100-150 м2',
        ]);

        $this->insert($tableName, [
            'id' => 14,
            'parent_id' => 11,
            'name'=>'150-200 м2',
            'text' => '',
            'slug' =>'150-200-m2',
            'title' => 'Площадь 150-200 м2',
            'keywords' => 'площадь 150-200 м2',
            'description' => 'Площадь постройки 150-200 м2',
        ]);

        $this->insert($tableName, [
            'id' => 15,
            'parent_id' => 11,
            'name'=>'Более 200 м2',
            'text' => '',
            'slug' =>'more-200-m2',
            'title' => 'Площадь более 200 м2',
            'keywords' => 'площадь более 200 м2',
            'description' => 'Площадь постройки более 200 м2',
        ]);

        $this->insert($tableName, [
            'id' => 16,
            'parent_id' => 1,
            'icon_id' => 7,
            'name'=>'Крыша',
            'text' => '',
            'slug' =>'roof',
            'title' => 'Крыша',
            'keywords' => 'выбрать крышу',
            'description' => 'Выбрать крышу',
        ]);

        $this->insert($tableName, [
            'id' => 17,
            'parent_id' => 16,
            'name'=>'Односкатная',
            'text' => '',
            'slug' =>'shed',
            'title' => 'Односкатная крыша',
            'keywords' => 'односкатная крыша',
            'description' => 'Выбрать односкатную крышу',
        ]);

        $this->insert($tableName, [
            'id' => 18,
            'parent_id' => 16,
            'name'=>'Двускатная',
            'text' => '',
            'slug' =>'gable',
            'title' => 'Двускатная крыша',
            'keywords' => 'двускатная крыша',
            'description' => 'Выбрать двускатную крышу',
        ]);

        $this->insert($tableName, [
            'id' => 19,
            'parent_id' => 16,
            'name'=>'Плоская',
            'text' => '',
            'slug' =>'flat',
            'title' => 'Плоская крыша',
            'keywords' => 'плоская крыша',
            'description' => 'Выбрать плоскую крышу',
        ]);

        $this->insert($tableName, [
            'id' => 20,
            'parent_id' => 1,
            'icon_id' => 8,
            'name'=>'Наличие помещений',
            'text' => '',
            'slug' =>'room',
            'title' => 'Наличие помещений',
            'keywords' => 'выбрать помещение',
            'description' => 'Выбрать помещения из которых состоит постройка',
        ]);

        $this->insert($tableName, [
            'id' => 21,
            'parent_id' => 20,
            'name' => 'Терраса',
            'text' => '',
            'slug' =>'veranda',
            'title' => 'Терраса',
            'keywords' => 'Терраса',
            'description' => 'Выбрать помещение с терассой',
        ]);

        $this->insert($tableName, [
            'id' => 22,
            'parent_id' => 20,
            'name' => 'Котельная',
            'text' => '',
            'slug' =>'boiler-room',
            'title' => 'Котельная',
            'keywords' => 'котельная',
            'description' => 'Выбрать помещение с котельной',
        ]);

        $this->insert($tableName, [
            'id' => 23,
            'parent_id' => 20,
            'name' => 'Гараж',
            'text' => '',
            'slug' =>'garage',
            'title' => 'Гараж',
            'keywords' => 'гараж',
            'description' => 'Выбрать помещение с гаражом',
        ]);

        $this->insert($tableName, [
            'id' => 24,
            'parent_id' => 20,
            'name' => 'Кухня',
            'text' => '',
            'slug' =>'kitchen',
            'title' => 'Кухня',
            'keywords' => 'кухня',
            'description' => 'Выбрать помещение с кухней',
        ]);

        $this->insert($tableName, [
            'id' => 25,
            'parent_id' => 20,
            'name' => 'Кабинет',
            'text' => '',
            'slug' =>'cabinet',
            'title' => 'Кабинет',
            'keywords' => 'кабинет',
            'description' => 'Выбрать помещение с кабинетом',
        ]);

        $this->insert($tableName, [
            'id' => 26,
            'parent_id' => 20,
            'name' => 'Гардеробная',
            'text' => '',
            'slug' =>'wardrobe',
            'title' => 'Гардеробная',
            'keywords' => 'гардеробная',
            'description' => 'Выбрать помещение с гардеробной',
        ]);

        $this->insert($tableName, [
            'id' => 27,
            'parent_id' => 20,
            'name' => 'Камин',
            'text' => '',
            'slug' =>'fireplace',
            'title' => 'Камин',
            'keywords' => 'камин',
            'description' => 'Выбрать помещение с камином',
        ]);

        $this->insert($tableName, [
            'id' => 28,
            'parent_id' => 20,
            'name' => 'Второй свет',
            'text' => '',
            'slug' =>'second-light',
            'title' => 'Второй свет',
            'keywords' => 'второй свет',
            'description' => 'Выбрать помещение со вторым светом',
        ]);

        // pannels

        $this->insert($tableName, [
            'id' => 29,
            'parent_id' => 2,
            'icon_id' => 2,
            'name'=>'Тип панели',
            'text' => '',
            'slug' =>'pannel-type',
            'title' => 'Тип СИП-панели',
            'keywords' => 'выбрать тип сип-панели',
            'description' => 'Выбрать тип СИП-панели',
        ]);

        $this->insert($tableName, [
            'id' => 30,
            'parent_id' => 29,
            'name' => 'Стеновая',
            'text' => '',
            'slug' =>'wall-pannel',
            'title' => 'Стеновая панель',
            'keywords' => 'стеновая сип-панель',
            'description' => 'Выбрать стеновую СИП-панель',
        ]);

        $this->insert($tableName, [
            'id' => 31,
            'parent_id' => 29,
            'name' => 'Перегородка',
            'text' => '',
            'slug' =>'partition',
            'title' => 'Перегородка',
            'keywords' => 'перегородка',
            'description' => 'Выбрать перегородку',
        ]);

        $this->insert($tableName, [
            'id' => 32,
            'parent_id' => 29,
            'name' => 'Перекрытие',
            'text' => '',
            'slug' =>'overlap',
            'title' => 'Перекрытие',
            'keywords' => 'перекрытие',
            'description' => 'Выбрать перекрытие',
        ]);

        $this->insert($tableName, [
            'id' => 33,
            'parent_id' => 2,
            'icon_id' => 9,
            'name'=>'Длина, мм',
            'text' => '',
            'slug' =>'pannel-length',
            'title' => 'Длина СИП-панели, мм',
            'keywords' => 'выбрать длину сип-панели',
            'description' => 'Выбрать длину сип-панели',
        ]);

        $this->insert($tableName, [
            'id' => 34,
            'parent_id' => 33,
            'name' => '2800',
            'text' => '',
            'slug' =>'length-2800',
            'title' => '2800 мм',
            'keywords' => 'длина панели 2800 мм',
            'description' => 'Выбрать длину панели 2800 мм',
        ]);

        $this->insert($tableName, [
            'id' => 35,
            'parent_id' => 33,
            'name' => '2500',
            'text' => '',
            'slug' =>'length-2500',
            'title' => '2500 мм',
            'keywords' => 'длина панели 2500 мм',
            'description' => 'Выбрать длину панели 2500 мм',
        ]);

        $this->insert($tableName, [
            'id' => 36,
            'parent_id' => 2,
            'icon_id' => 10,
            'name'=>'Ширина, мм',
            'text' => '',
            'slug' =>'pannel-width',
            'title' => 'Ширина СИП-панели, мм',
            'keywords' => 'выбрать ширину сип-панели',
            'description' => 'Выбрать ширину сип-панели',
        ]);

        $this->insert($tableName, [
            'id' => 37,
            'parent_id' => 36,
            'name' => '1250',
            'text' => '',
            'slug' =>'width-1250',
            'title' => '1250 мм',
            'keywords' => 'ширина панели 1250 мм',
            'description' => 'Выбрать ширину панели 1250 мм',
        ]);

        $this->insert($tableName, [
            'id' => 38,
            'parent_id' => 2,
            'icon_id' => 11,
            'name'=>'Толщина, мм',
            'text' => '',
            'slug' =>'pannel-thikness',
            'title' => 'Толщина СИП-панели, мм',
            'keywords' => 'выбрать толщину сип-панели',
            'description' => 'Выбрать толщину СИП-панели',
        ]);

        $this->insert($tableName, [
            'id' => 39,
            'parent_id' => 38,
            'name' => '124',
            'text' => '',
            'slug' =>'thikness-124',
            'title' => '124 мм',
            'keywords' => 'толщина панели 124 мм',
            'description' => 'Выбрать толщину панели 124 мм',
        ]);

        $this->insert($tableName, [
            'id' => 40,
            'parent_id' => 38,
            'name' => '174',
            'text' => '',
            'slug' =>'thikness-174',
            'title' => '174 мм',
            'keywords' => 'толщина панели 174 мм',
            'description' => 'Выбрать толщину панели 174 мм',
        ]);

        $this->insert($tableName, [
            'id' => 41,
            'parent_id' => 38,
            'name' => '224',
            'text' => '',
            'slug' =>'thikness-224',
            'title' => '224 мм',
            'keywords' => 'толщина панели 224 мм',
            'description' => 'Выбрать толщину панели 224 мм',
        ]);

        $this->insert($tableName, [
            'id' => 42,
            'parent_id' => 2,
            'icon_id' => 11,
            'name'=>'Толщина OSB-3, мм',
            'text' => '',
            'slug' =>'osb-3-thikness',
            'title' => 'Толщина OSB-3, мм',
            'keywords' => 'выбрать толщину OSB-3',
            'description' => 'Выбрать толщину OSB-3',
        ]);

        $this->insert($tableName, [
            'id' => 43,
            'parent_id' => 42,
            'name' => '9',
            'text' => '',
            'slug' =>'osb-3-thikness-9',
            'title' => '9 мм',
            'keywords' => 'толщина OSB-3 9 мм',
            'description' => 'Выбрать толщину OSB-3 9 мм',
        ]);

        $this->insert($tableName, [
            'id' => 44,
            'parent_id' => 42,
            'name' => '12',
            'text' => '',
            'slug' =>'osb-3-thikness-12',
            'title' => '12 мм',
            'keywords' => 'толщина OSB-3 12 мм',
            'description' => 'Выбрать толщину OSB-3 12 мм',
        ]);

        $this->insert($tableName, [
            'id' => 45,
            'parent_id' => 2,
            'icon_id' => 4,
            'name'=>'Площадь, м2',
            'text' => '',
            'slug' =>'pannel-square',
            'title' => 'Площадь, м2',
            'keywords' => 'выбрать площадь сип-панели',
            'description' => 'Выбрать площадь СИП-панели',
        ]);

        $this->insert($tableName, [
            'id' => 46,
            'parent_id' => 45,
            'name' => '3.125',
            'text' => '',
            'slug' =>'pannel-square-3.125',
            'title' => '3.125 м3',
            'keywords' => 'площадь сип-панели 3.125 м2',
            'description' => 'Площадь сип-панели 3.125 м2',
        ]);

        $this->insert($tableName, [
            'id' => 47,
            'parent_id' => 45,
            'name' => '3.5',
            'text' => '',
            'slug' =>'pannel-square-3.5',
            'title' => '3.5 м3',
            'keywords' => 'площадь сип-панели 3.5 м2',
            'description' => 'Площадь сип-панели 3.5 м2',
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return app\models\Category::deleteAll();
    }
}
