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
    public function resizeImageFile($model)
    {

        $dir = Yii::getAlias('@app/web/uploads/');
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

    public function __construct($model, array $config = [])
    {
        self::saveImageFile($model);
        //self::resizeImageFile($model);
        parent::__construct($config);

    }

    public function deleteImageFile($model)
    {
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