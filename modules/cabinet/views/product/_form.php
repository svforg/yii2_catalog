<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PostHelper;
use app\models\Tree;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($modelProduct, 'name')->textInput(['maxlength' => true]) ?>

    <?= \kartik\tree\TreeViewInput::widget([
        'name' => 'Product[category_id]',
        'value' => 'true', // preselected values
        'query' => Tree::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Store'],
        'rootOptions' => ['label'=>'<i class="fas fa-tree text-success"></i>'],
        'fontAwesome' => true,
        'asDropdown' => true,
        'multiple' => true,
        'options' => ['disabled' => false]
    ]); ?>

    <?= $form->field($modelSeo, 'seo_title')->textInput() ?>
    <?= $form->field($modelSeo, 'seo_descr')->textarea(['rows' => 6]) ?>
    <?= $form->field($modelSeo, 'seo_slug')->textInput() ?>

    <?= $form->field($modelProduct, 'file')->widget(\kartik\file\FileInput::className(), [
        'options' => ['accept' => '@images/*'],
    ]); ?>

    <?= $form->field($modelProduct, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelProduct, 'status')->dropDownList(PostHelper::statusList()) ?>

    <?= $form->field($modelProduct, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($modelProduct, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
