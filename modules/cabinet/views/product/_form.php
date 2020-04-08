<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tree;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
    ]);
    ?>

    <?= $form->field($model, 'seo_title')->textInput() ?>
    <?= $form->field($model, 'seo_descr')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'seo_slug')->textInput() ?>

    <?= $form->field($model, 'feature')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->widget(\kartik\file\FileInput::className(), [
        'options' => ['accept' => '@images/*'],
    ]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'created_at')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
