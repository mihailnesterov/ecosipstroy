<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id id компании
 * @property string|null $name Название компании
 * @property string|null $jurName Юридическое название
 * @property string|null $phone1 Телефон 1
 * @property string|null $phone2 Телефон 2
 * @property string|null $email Email
 * @property string|null $inn ИНН
 * @property string|null $kpp КПП
 * @property string|null $address Адрес
 * @property string|null $jurAddress Юридический адрес
 * @property string|null $bank Банк
 * @property string|null $bik БИК
 * @property string|null $account Банковский счет
 * @property string|null $corrAccount Корреспондентский счет
 * @property string|null $about О компании
 * @property string|null $map Карта
 * @property string|null $vk ВКонтакте
 * @property string|null $whatsapp WhatsApp
 * @property string|null $viber Viber
 * @property string|null $telegram Telegram
 * @property string|null $title SEO-заголовок
 * @property string|null $keywords SEO-keywords
 * @property string|null $description SEO-описание
 * @property int|null $status Статус
 * @property string|null $created Дата создания
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about', 'map'], 'string'],
            [['status'], 'integer'],
            [['created'], 'safe'],
            [['name', 'jurName', 'bank', 'vk', 'whatsapp', 'viber', 'telegram', 'keywords'], 'string', 'max' => 255],
            [['phone1', 'phone2', 'email'], 'string', 'max' => 100],
            [['inn', 'kpp', 'bik', 'account', 'corrAccount'], 'string', 'max' => 50],
            [['address', 'jurAddress'], 'string', 'max' => 512],
            [['title'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 160],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
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
            'created' => 'Дата создания',
        ];
    }
}
