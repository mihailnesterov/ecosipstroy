<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id id категории
 * @property int $parent_id id родительской категории
 * @property string $name Название категории
 * @property string|null $text Текст категории
 * @property int|null $file_id id картинки категории
 * @property int|null $icon_id id иконки категории
 * @property string|null $slug URL категории
 * @property string|null $title SEO-заголовок
 * @property string|null $keywords SEO-keywords
 * @property string|null $description SEO-описание
 * @property int|null $status Статус
 *
 * @property CategoryProduct[] $categoryProducts
 * @property File $file
 * @property Icon $icon
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'file_id', 'icon_id', 'status'], 'integer'],
            [['name'], 'required'],
            [['text'], 'string'],
            [['name', 'slug', 'keywords'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 160],
            [['name'], 'unique'],
            [['slug'], 'unique'],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['file_id' => 'id']],
            [['icon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Icon::className(), 'targetAttribute' => ['icon_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id категории',
            'parent_id' => 'id родительской категории',
            'name' => 'Название категории',
            'text' => 'Текст категории',
            'file_id' => 'id картинки категории',
            'icon_id' => 'id иконки категории',
            'slug' => 'URL категории',
            'title' => 'SEO-заголовок',
            'keywords' => 'SEO-keywords',
            'description' => 'SEO-описание',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[CategoryProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProduct::className(), ['category_id' => 'id']);
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

    /**
     * Gets query for [[Icon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIcon()
    {
        return $this->hasOne(Icon::className(), ['id' => 'icon_id']);
    }
}
