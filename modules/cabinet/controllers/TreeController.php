<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\modules\cabinet\controllers\DefaultController;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class TreeController extends DefaultController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
