<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option_group".
 *
 * @property int $id id типа
 * @property string $name Название группы
 * @property string|null $description Описание
 *
 * @property Option[] $options
 */
class OptionGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'option_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
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
            'id' => 'id типа',
            'name' => 'Название группы',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Options]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Option::className(), ['group_id' => 'id']);
    }
}
