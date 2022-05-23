<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id id баннера
 * @property int|null $file_id id файла
 * @property string $name Название
 * @property int|null $position № позиции
 * @property string|null $url URL на ресурс
 * @property string|null $text Текст
 * @property string|null $description Описание
 * @property string|null $created Дата создания
 *
 * @property File $file
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'position'], 'integer'],
            [['name'], 'required'],
            [['text'], 'string'],
            [['created'], 'safe'],
            [['name', 'url', 'description'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['file_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id баннера',
            'file_id' => 'id файла',
            'name' => 'Название',
            'position' => '№ позиции',
            'url' => 'URL на ресурс',
            'text' => 'Текст',
            'description' => 'Описание',
            'created' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::className(), ['id' => 'file_id']);
    }
}
