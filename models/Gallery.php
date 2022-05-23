<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id id фото
 * @property int|null $file_id id файла
 * @property string|null $category Категория
 * @property string|null $description Описание
 * @property string|null $created Дата создания
 *
 * @property File $file
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id'], 'integer'],
            [['created'], 'safe'],
            [['category'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['file_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id фото',
            'file_id' => 'id файла',
            'category' => 'Категория',
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
