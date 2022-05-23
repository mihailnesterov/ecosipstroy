<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id id товара
 * @property string $articul Артикул
 * @property string $name Название товара
 * @property string|null $excerpt Краткое описание
 * @property string|null $text Описание
 * @property string|null $slug URL товара
 * @property float|null $price Цена, руб.
 * @property int|null $discount Скидка %
 * @property int|null $new Новинка
 * @property string|null $title SEO-заголовок
 * @property string|null $keywords SEO-keywords
 * @property string|null $description SEO-описание
 * @property int|null $status Статус
 * @property string|null $created Дата создания
 *
 * @property CategoryProduct[] $categoryProducts
 * @property ProductFile[] $productFiles
 * @property ProductTag[] $productTags
 * @property ProductTemplate[] $productTemplates
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['articul', 'name'], 'required'],
            [['excerpt', 'text'], 'string'],
            [['price'], 'number'],
            [['discount', 'new', 'status'], 'integer'],
            [['created'], 'safe'],
            [['articul'], 'string', 'max' => 10],
            [['name', 'slug', 'keywords'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 160],
            [['articul'], 'unique'],
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
            'id' => 'id товара',
            'articul' => 'Артикул',
            'name' => 'Название товара',
            'excerpt' => 'Краткое описание',
            'text' => 'Описание',
            'slug' => 'URL товара',
            'price' => 'Цена, руб.',
            'discount' => 'Скидка %',
            'new' => 'Новинка',
            'title' => 'SEO-заголовок',
            'keywords' => 'SEO-keywords',
            'description' => 'SEO-описание',
            'status' => 'Статус',
            'created' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[CategoryProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProduct::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductFiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductFiles()
    {
        return $this->hasMany(ProductFile::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductTemplates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTemplates()
    {
        return $this->hasMany(ProductTemplate::className(), ['product_id' => 'id']);
    }
}
