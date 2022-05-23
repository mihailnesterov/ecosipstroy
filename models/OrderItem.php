<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id id пункта заказа
 * @property int|null $order_id id заказа
 * @property string|null $name Название товара
 * @property string|null $options Опции товара
 * @property float|null $sum Сумма, руб.
 * @property int|null $count Количество
 *
 * @property Order $order
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'count'], 'integer'],
            [['options'], 'safe'],
            [['sum'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id пункта заказа',
            'order_id' => 'id заказа',
            'name' => 'Название товара',
            'options' => 'Опции товара',
            'sum' => 'Сумма, руб.',
            'count' => 'Количество',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
