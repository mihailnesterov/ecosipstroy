<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option".
 *
 * @property int $id id опции
 * @property string $name Название опции
 * @property int|null $type_id id типа опции
 * @property int|null $group_id id группы опции
 * @property string|null $description Описание
 *
 * @property OptionGroup $group
 * @property TemplateOption[] $templateOptions
 * @property OptionType $type
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type_id', 'group_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => OptionGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OptionType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id опции',
            'name' => 'Название опции',
            'type_id' => 'id типа опции',
            'group_id' => 'id группы опции',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(OptionGroup::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[TemplateOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemplateOptions()
    {
        return $this->hasMany(TemplateOption::className(), ['option_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(OptionType::className(), ['id' => 'type_id']);
    }
}
