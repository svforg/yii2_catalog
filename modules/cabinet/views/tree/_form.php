<?php
use kartik\file\FileInput;
?>
<div class="row">
    <div class="col-sm-8">
        <?=

        $form->field($node, 'file')->widget(FileInput::className(), [
            'options' => ['accept' => '@images/*'],
        ]);

        ?>
    </div>
</div>