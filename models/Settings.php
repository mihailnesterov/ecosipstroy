<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id id настройки
 * @property string $name Название
 * @property string|null $group Группа
 * @property string|null $value Значение
 * @property string|null $description Описание
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
            [['group'], 'string', 'max' => 100],
            [['value'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id настройки',
            'name' => 'Название',
            'group' => 'Группа',
            'value' => 'Значение',
            'description' => 'Описание',
        ];
    }
}
