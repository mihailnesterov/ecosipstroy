<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id id клиента
 * @property string|null $company Название компании
 * @property string|null $contact Контактное лицо
 * @property string|null $phone Телефон
 * @property string|null $email Email
 * @property string|null $inn ИНН
 * @property string|null $kpp КПП
 * @property string|null $address Адрес
 * @property string|null $bank Банк
 * @property string|null $bik БИК
 * @property string|null $account Банковский счет
 * @property string|null $corrAccount Корреспондентский счет
 * @property string|null $description Описание
 * @property int|null $status Статус
 * @property string|null $created Дата создания
 *
 * @property Order[] $orders
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created'], 'safe'],
            [['company', 'contact', 'address', 'bank', 'description'], 'string', 'max' => 255],
            [['phone', 'email'], 'string', 'max' => 100],
            [['inn', 'kpp', 'bik', 'account', 'corrAccount'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id клиента',
            'company' => 'Название компании',
            'contact' => 'Контактное лицо',
            'phone' => 'Телефон',
            'email' => 'Email',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'address' => 'Адрес',
            'bank' => 'Банк',
            'bik' => 'БИК',
            'account' => 'Банковский счет',
            'corrAccount' => 'Корреспондентский счет',
            'description' => 'Описание',
            'status' => 'Статус',
            'created' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['client_id' => 'id']);
    }
}
