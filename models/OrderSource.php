<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_source".
 *
 * @property int $id id источника заказа
 * @property string|null $name Название
 * @property string|null $description Описание
 *
 * @property Order[] $orders
 */
class OrderSource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id источника заказа',
            'name' => 'Название',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['source_id' => 'id']);
    }
}
