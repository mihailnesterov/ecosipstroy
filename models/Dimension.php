<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dimension".
 *
 * @property int $id id размерности
 * @property string $name Название
 * @property string|null $description Описание
 *
 * @property TemplateOption[] $templateOptions
 */
class Dimension extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dimension';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id размерности',
            'name' => 'Название',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[TemplateOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemplateOptions()
    {
        return $this->hasMany(TemplateOption::className(), ['dimension_id' => 'id']);
    }
}
