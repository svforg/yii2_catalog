<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Администратор</p>
            </div>
        </div>



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Категории', 'icon' => 'folder', 'url' => ['/cabinet/tree']],
                    ['label' => 'Товары', 'icon' => 'file', 'url' => ['/cabinet/product']],
                    ['label' => 'Новости', 'icon' => 'newspaper-o', 'url' => ['/cabinet/news']],
                    ['label' => 'Контакты', 'icon' => 'map-marker', 'url' => ['/cabinet/contact']],
                ],
            ]
        ) ?>

    </section>

</aside>
