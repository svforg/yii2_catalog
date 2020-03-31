<?php

namespace app\modules\cabinet\controllers;

use kartik\tree\TreeSecurity;
use kartik\tree\TreeView;
use Yii;
use app\models\Tree;
use app\models\TreeSearch;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\cabinet\controllers\DefaultController;
use app\components\ImageUploader;
use \kartik\tree\controllers\NodeController;
/**
 * TreeController implements the CRUD actions for Tree model.
 */
//class TreeController extends DefaultController
class TreeController extends NodeController
{
    public $layout = 'main';

    public function actionSave()
    {
        /**
         * @var Module $module
         * @var Tree $node
         * @var Tree $parent
         * @var \yii\web\Session $session
         */
        $post = Yii::$app->request->post();
        static::checkValidRequest(false, !isset($post['treeNodeModify']));
        $data = static::getPostData();
        $parentKey = ArrayHelper::getValue($data, 'parentKey', null);
        $treeNodeModify = ArrayHelper::getValue($data, 'treeNodeModify', null);
        $currUrl = ArrayHelper::getValue($data, 'currUrl', '');
        $treeClass = TreeSecurity::getModelClass($data);
        $module = TreeView::module();
        $keyAttr = $module->dataStructure['keyAttribute'];
        $nodeTitles = TreeSecurity::getNodeTitles($data);

        if ($treeNodeModify) {
            $node = new $treeClass;
            $successMsg = Yii::t('kvtree', 'The {node} was successfully created.', $nodeTitles);
            $errorMsg = Yii::t('kvtree', 'Error while creating the {node}. Please try again later.', $nodeTitles);
        } else {
            $tag = explode("\\", $treeClass);
            $tag = array_pop($tag);
            $id = $post[$tag][$keyAttr];
            $node = $treeClass::findOne($id);


            $successMsg = Yii::t('kvtree', 'Saved the {node} details successfully.', $nodeTitles);
            $errorMsg = Yii::t('kvtree', 'Error while saving the {node}. Please try again later.', $nodeTitles);
        }
        $node->activeOrig = $node->active;
        $isNewRecord = $node->isNewRecord;
        $node->load($post);
        $errors = $success = false;
        if (Yii::$app->has('session')) {
            $session = Yii::$app->session;
        }
        if ($treeNodeModify) {
            if ($parentKey == TreeView::ROOT_KEY) {
                $node->makeRoot();
            } else {
                $parent = $treeClass::findOne($parentKey);
                if ($parent->isChildAllowed()) {
                    $node->appendTo($parent);
                } else {
                    $errorMsg = Yii::t('kvtree', 'You cannot add children under this {node}.', $nodeTitles);
                    if (Yii::$app->has('session')) {
                        $session->setFlash('error', $errorMsg);
                    } else {
                        throw new ErrorException("Error saving {node}!\n{$errorMsg}", $nodeTitles);
                    }
                    return $this->redirect($currUrl);
                }
            }
        }
        $imageUploader = new ImageUploader($node);
        if ($node->save()) {
            $imageUploader->resizeImageFile($node);
            // check if active status was changed
            if (!$isNewRecord && $node->activeOrig != $node->active) {
                if ($node->active) {
                    $success = $node->activateNode(false);
                    $errors = $node->nodeActivationErrors;
                } else {
                    $success = $node->removeNode(true, false); // only deactivate the node(s)
                    $errors = $node->nodeRemovalErrors;
                }
            } else {
                $success = true;
            }
            if (!empty($errors)) {
                $success = false;
                $errorMsg = "<ul style='padding:0'>\n";
                foreach ($errors as $err) {
                    $errorMsg .= "<li>" . Yii::t('kvtree', "{node} # {id} - '{name}': {error}",
                            $err + $nodeTitles) . "</li>\n";
                }
                $errorMsg .= "</ul>";
            }
        } else {
            $errorMsg = '<ul style="margin:0"><li>' . implode('</li><li>', $node->getFirstErrors()) . '</li></ul>';
        }
        if (Yii::$app->has('session')) {
            $session->set(ArrayHelper::getValue($post, 'nodeSelected', 'kvNodeId'), $node->{$keyAttr});
            if ($success) {
                $session->setFlash('success', $successMsg);
            } else {
                $session->setFlash('error', $errorMsg);
            }
        } elseif (!$success) {
            throw new ErrorException("Error saving {node}!\n{$errorMsg}", $nodeTitles);
        }
        return $this->redirect($currUrl);




    }


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tree models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new TreeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tree model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tree model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tree();

        if( $model->load(Yii::$app->request->post())  && $model->validate() )
        {
            $imageUploader = new ImageUploader($model);
            $model->save();
            $imageUploader->resizeImageFile($model);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tree model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if( $model->load(Yii::$app->request->post())  && $model->validate() )
        {
            $imageUploader = new ImageUploader($model);
            $model->save();
            $imageUploader->resizeImageFile($model);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tree model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        ImageUploader::deleteImageFile($this->findModel($id));

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tree model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tree the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tree::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
