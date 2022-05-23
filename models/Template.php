<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id id товара
 * @property string $name Название
 * @property string $type Тип шаблона
 * @property string|null $description Описание
 * @property int|null $status Статус
 *
 * @property ProductTemplate[] $productTemplates
 * @property TemplateOption[] $templateOptions
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['status'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id товара',
            'name' => 'Название',
            'type' => 'Тип шаблона',
            'description' => 'Описание',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[ProductTemplates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTemplates()
    {
        return $this->hasMany(ProductTemplate::className(), ['template_id' => 'id']);
    }

    /**
     * Gets query for [[TemplateOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemplateOptions()
    {
        return $this->hasMany(TemplateOption::className(), ['template_id' => 'id']);
    }
}
