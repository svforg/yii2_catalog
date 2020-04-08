<?php

use yii\helpers\Url;

?>
<li class="menu__item">
    <a href="<?= Url::to(['product/view/', 'id' => $model->url]); ?>" title="<?= $model->name ?>" class="menu__link">
        <?= $model->name ?>
    </a>
</li>