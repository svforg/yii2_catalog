<?php

use app\models\Orders;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'subject')->textInput() ?>

    <?= $form->field($model, 'text')->textInput() ?>

    <!--?= $form->field($model, 'product_id')->textInput() ?-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>
