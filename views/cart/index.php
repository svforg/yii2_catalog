<?php
/* @var $this yii\web\View */
/* @var $cart \devanych\cart\Cart */
/* @var $item \devanych\cart\CartItem */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php if(!empty($cartItems = $cart->getItems())): ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="active">
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th><i aria-hidden="true">&times;</i></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($cartItems as $item): ?>
                <tr>
                    <td><?=Html::img("@web{$item->getProduct()->photo}", ['alt' => $item->getProduct()->name, 'width' => 50])?></td>
                    <td><a href="<?=Url::to('@web/product/' . $item->getProduct()->alias)?>"><?= $item->getProduct()->name ?></a></td>
                    <td><?=$item->getQuantity()?></td>
                    <td><?=$item->getPrice()?></td>
                    <td><?=$item->getCost()?></td>
                    <td><a href="<?=Url::to(['cart/remove', 'id' => $item->getId()])?>">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
            <tr class="active">
                <td colspan="4">Общее кол-во:</td>
                <td colspan="2"><?= $cart->getTotalCount()?></td>
            </tr>
            <tr class="active">
                <td colspan="4">Общая сумма:</td>
                <td colspan="2"><?=$cart->getTotalCost() ?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else:?>
    <h3>Корзина пуста</h3>
<?php endif;?>