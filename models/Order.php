<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id id заказа
 * @property int|null $client_id id клиента
 * @property int|null $source_id id источника заказа
 * @property string|null $number
 * @property int|null $status Статус
 * @property string|null $created Дата создания
 *
 * @property Client $client
 * @property OrderItem[] $orderItems
 * @property OrderSource $source
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'source_id', 'status'], 'integer'],
            [['created'], 'safe'],
            [['number'], 'string', 'max' => 50],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['source_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderSource::className(), 'targetAttribute' => ['source_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id заказа',
            'client_id' => 'id клиента',
            'source_id' => 'id источника заказа',
            'number' => 'Number',
            'status' => 'Статус',
            'created' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Source]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(OrderSource::className(), ['id' => 'source_id']);
    }
}
