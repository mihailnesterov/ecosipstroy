<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id id новости
 * @property string $name Название новости
 * @property string|null $excerpt Анонс
 * @property string|null $text Текст
 * @property string|null $slug URL новости
 * @property string|null $title SEO-заголовок
 * @property string|null $keywords SEO-keywords
 * @property string|null $description SEO-описание
 * @property int|null $status Статус
 * @property string|null $created Дата создания
 *
 * @property NewsFile[] $newsFiles
 * @property NewsTag[] $newsTags
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['excerpt', 'text'], 'string'],
            [['status'], 'integer'],
            [['created'], 'safe'],
            [['name', 'slug', 'keywords'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 160],
            [['name'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id новости',
            'name' => 'Название новости',
            'excerpt' => 'Анонс',
            'text' => 'Текст',
            'slug' => 'URL новости',
            'title' => 'SEO-заголовок',
            'keywords' => 'SEO-keywords',
            'description' => 'SEO-описание',
            'status' => 'Статус',
            'created' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[NewsFiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsFiles()
    {
        return $this->hasMany(NewsFile::className(), ['news_id' => 'id']);
    }

    /**
     * Gets query for [[NewsTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsTags()
    {
        return $this->hasMany(NewsTag::className(), ['news_id' => 'id']);
    }
}
