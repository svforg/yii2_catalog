<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 30.03.2020
 * Time: 18:38
 */

namespace app\components;
use Yii;
use yii\image\drivers\Image;
use yii\base\Component;
use yii\web\UploadedFile;

class ImageUploader extends Component
{
    const IMAGE_PATH = 'uploads/images/categories/';

    public function __construct($model, array $config = [])
    {
        static::saveImageFile($model);
        parent::__construct($config);

    }

    public function getImageUrl50x50($model) {
        return  Yii::getAlias('@web/' . self::IMAGE_PATH) . '50x50/' . $model->image;
    }

    public function getImageUrl800x($model) {
        return  Yii::getAlias('@web/' . self::IMAGE_PATH) . '800x/' . $model->image;
    }

    public function resizeImageFile($model)
    {

        $dir = Yii::getAlias('@app/web/uploads/');
        if ($model->file)  {
            $model->file->saveAs($dir . 'images/categories/' . $model->image);

// загружаем изображение для resize 50x50s
            $imageFile = Yii::$app->image->load($dir  . 'images/categories/' . $model->image);

// При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('50', '50', Image::INVERSE);
            $imageFile->crop('50', '50');
            $imageFile->save($dir . 'images/categories/50x50/' . $model->image, 90);

// загружаем изображение для resize 800x
            $imageFile = Yii::$app->image->load($dir . 'images/categories/' . $model->image);
// При resize ставится черный цвет по умолчанию
            $imageFile->background('#fff', 0);
            $imageFile->resize('800', null, Image::INVERSE);
            $imageFile->save($dir . 'images/categories/800x/' . $model->image, 90);
        }
    }

    public function saveImageFile($model)
    {

        $model->file = UploadedFile::getInstance($model, 'file');

        if ( !empty($model->file) )
        {
            $dir = Yii::getAlias('@app/web/uploads/');

//            // Удаляем скопированные файлы
//            if ( file_exists($dir.'images/categories/'.$model->image ) ) {
//
//                unlink($dir.'images/categories/'.$model->image );
//            }
//            if ( file_exists($dir.'images/categories/50x50/'.$model->image ) ) {
//
//                unlink($dir.'images/categories/50x50/'.$model->image );
//            }
//            if ( file_exists($dir.'images/categories/800x/'.$model->image ) ) {
//
//                unlink($dir.'images/categories/800x/'.$model->image );
//            }

            return $model->image = strtotime('now') . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $model->file->extension;
        }

    }

    public function deleteImageFile($model)
    {
        if ($model->image)  {
            $dir = Yii::getAlias('@app/web/uploads/');

            if ( file_exists($dir.'images/categories/'.$model->image ) ) {

                unlink($dir.'images/categories/'.$model->image );
            }
            if ( file_exists($dir.'images/categories/50x50/'.$model->image ) ) {

                unlink($dir.'images/categories/50x50/'.$model->image );
            }
            if ( file_exists($dir.'images/categories/800x/'.$model->image ) ) {

                unlink($dir.'images/categories/800x/'.$model->image );
            }
        }

    }
}