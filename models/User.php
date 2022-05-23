<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id id пользователя
 * @property string $email Email
 * @property string $password Пароль
 * @property string|null $auth_key Authorization Key
 * @property string|null $token Токен
 * @property string|null $firstName Имя
 * @property string|null $lastName Фамилия
 * @property string|null $phone Телефон
 * @property string|null $address Адрес
 * @property string|null $role Роль
 * @property int|null $status Статус
 * @property string|null $created Дата создания
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['status'], 'integer'],
            [['created'], 'safe'],
            [['email', 'password', 'firstName', 'lastName', 'phone', 'role'], 'string', 'max' => 100],
            [['auth_key', 'address'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 50],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id пользователя',
            'email' => 'Email',
            'password' => 'Пароль',
            'auth_key' => 'Authorization Key',
            'token' => 'Токен',
            'firstName' => 'Имя',
            'lastName' => 'Фамилия',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'role' => 'Роль',
            'status' => 'Статус',
            'created' => 'Дата создания',
        ];
    }
}
