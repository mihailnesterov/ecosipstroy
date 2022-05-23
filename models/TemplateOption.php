<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "template_option".
 *
 * @property int $id id
 * @property int|null $template_id id шаблона
 * @property int|null $option_id id опции
 * @property string|null $value Значение опции
 * @property int|null $dimension_id
 * @property float|null $price Цена, руб.
 *
 * @property Dimension $dimension
 * @property Option $option
 * @property Template $template
 */
class TemplateOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template_option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['template_id', 'option_id', 'dimension_id'], 'integer'],
            [['price'], 'number'],
            [['value'], 'string', 'max' => 255],
            [['dimension_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dimension::className(), 'targetAttribute' => ['dimension_id' => 'id']],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Option::className(), 'targetAttribute' => ['option_id' => 'id']],
            [['template_id'], 'exist', 'skipOnError' => true, 'targetClass' => Template::className(), 'targetAttribute' => ['template_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'template_id' => 'id шаблона',
            'option_id' => 'id опции',
            'value' => 'Значение опции',
            'dimension_id' => 'Dimension ID',
            'price' => 'Цена, руб.',
        ];
    }

    /**
     * Gets query for [[Dimension]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDimension()
    {
        return $this->hasOne(Dimension::className(), ['id' => 'dimension_id']);
    }

    /**
     * Gets query for [[Option]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Option::className(), ['id' => 'option_id']);
    }

    /**
     * Gets query for [[Template]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(Template::className(), ['id' => 'template_id']);
    }
}
