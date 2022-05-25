<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "file".
 *
 * @property int $id id файла
 * @property string $name Имя файла
 * @property string $extention Расширение файла
 * @property int|null $status Статус
 * @property string|null $created Дата создания
 *
 * @property Banner[] $banners
 * @property Category[] $categories
 * @property Gallery[] $galleries
 * @property NewsFile[] $newsFiles
 * @property ProductFile[] $productFiles
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'extention'], 'required'],
            [['status'], 'integer'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['extention'], 'string', 'max' => 10],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id файла',
            'name' => 'Имя файла',
            'extention' => 'Расширение файла',
            'status' => 'Статус',
            'created' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[Banners]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBanners()
    {
        return $this->hasMany(Banner::className(), ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Galleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::className(), ['file_id' => 'id']);
    }

    /**
     * Gets query for [[NewsFiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsFiles()
    {
        return $this->hasMany(NewsFile::className(), ['file_id' => 'id']);
    }

    /**
     * Gets query for [[ProductFiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductFiles()
    {
        return $this->hasMany(ProductFile::className(), ['file_id' => 'id']);
    }

    /**
     * Gets path from file's created date
     * 
     * @param mixed
     * @return string
     */
    public static function getFilePath($file)
    {
        $base = Yii::getAlias('@uploads');

        $datePath = array_reduce(
            explode('-', explode(' ', $file->created)[0]),
            function($acc, $item) {
                return "$acc/$item";
            }
        );

        return "{$base}{$datePath}/{$file->name}.{$file->extention}";
    }

    /**
     * Gets uploads directory path.
     * 
     * @return string
     */
    public function getUploadsPath()
    {
        $uploadsPath = Yii::$app->basePath . Yii::getAlias('@uploads') . $this->getCurrentDateAsString();
        $this->createUploadsFolder($uploadsPath);
        
        return $uploadsPath;
    }

    /**
     * Gets current date as string like "2022/01/01".
     * 
     * @return string
     */
    public function getCurrentDateAsString()
    {
        date_default_timezone_set('Asia/Krasnoyarsk');
        $date = new \DateTime();
        $day = $date->format('d');
        $month = $date->format('m');
        $year = $date->format('Y');
        
        return "$year/$month/$day";
    }

    /**
     * Creates upload folder if it doesn't exist.
     * 
     * @param string $uploadPath
     */
    public function createUploadsFolder($uploadsPath)
    {
        if (!file_exists($uploadsPath)) {
            mkdir($uploadsPath, 0777, true);
        }
    }
}
