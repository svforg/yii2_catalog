<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

    <?php $form = ActiveForm::begin([
        //'action' => '/orders/create',
        'options' => [
            'class' => 'add_order_form'
        ]
    ]); ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'email')->textInput() ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'subject')->textInput() ?>

        <?= $form->field($model, 'text')->textInput() ?>

        <?= $form->field($model, 'product_id')->hiddenInput(['value' => $product_id])->label(''); ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success add_order_product']) ?>
        </div>

    <?php ActiveForm::end(); ?>

<?php

$js = <<<JS
    $('.add_order_form').on("submit", function(e) {
            
         var dataSend = $(this).serialize();
                 
         $.ajax({
            url: "/orders/create",
            type: "POST",          
            processData: false,
            contentType: false,
            dataType: "json",            
            data: dataSend,            
            beforeSend: function() {
              
            },
            success: function(data) {
              console.log(data);
              alert("ok");
            },
            error: function(jqXHR, exception) {
                console.log(jqXHR);
                alert("ERROR");
            }
         });
    });
JS;

$this->registerJS($js);

