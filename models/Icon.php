<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "icon".
 *
 * @property int $id id иконки
 * @property string $name Имя иконки
 * @property int|null $status Статус
 *
 * @property Category[] $categories
 * @property OptionType[] $optionTypes
 */
class Icon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'icon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id иконки',
            'name' => 'Имя иконки',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['icon_id' => 'id']);
    }

    /**
     * Gets query for [[OptionTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptionTypes()
    {
        return $this->hasMany(OptionType::className(), ['icon_id' => 'id']);
    }
}
