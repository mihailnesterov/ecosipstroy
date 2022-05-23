<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id id тега
 * @property string $name Название
 * @property string $slug URL тега
 * @property string|null $title SEO-заголовок
 * @property string|null $keywords SEO-keywords
 * @property string|null $description SEO-описание
 * @property int|null $status Статус
 *
 * @property NewsTag[] $newsTags
 * @property ProductTag[] $productTags
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['status'], 'integer'],
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
            'id' => 'id тега',
            'name' => 'Название',
            'slug' => 'URL тега',
            'title' => 'SEO-заголовок',
            'keywords' => 'SEO-keywords',
            'description' => 'SEO-описание',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[NewsTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsTags()
    {
        return $this->hasMany(NewsTag::className(), ['tag_id' => 'id']);
    }

    /**
     * Gets query for [[ProductTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::className(), ['tag_id' => 'id']);
    }
}
