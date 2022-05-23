<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option_type".
 *
 * @property int $id id типа
 * @property int|null $icon_id id иконки типа
 * @property string $name Название типа
 * @property string|null $description Описание
 *
 * @property Icon $icon
 * @property Option[] $options
 */
class OptionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'option_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon_id'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['icon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Icon::className(), 'targetAttribute' => ['icon_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id типа',
            'icon_id' => 'id иконки типа',
            'name' => 'Название типа',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Icon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIcon()
    {
        return $this->hasOne(Icon::className(), ['id' => 'icon_id']);
    }

    /**
     * Gets query for [[Options]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Option::className(), ['type_id' => 'id']);
    }
}
