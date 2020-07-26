<aside class="main-sidebar">

    <section class="sidebar">
    <?php
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Login', 'icon' => 'circle-o', 'url' => ['../../backend/web/site/login']];
            $menuItems[] = ['label' => 'Recuperar Usuario', 'icon' => 'unlock', 'url' => ['../../backend/web/site/recuperar']];
        } else {
            $menuItems[] = ['label' => 'Configuración', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Registro', 'icon' => 'check', 'url' => ['../../backend/web/site/register']],
                                    ['label' => 'Accion', 'icon' => 'check', 'url' => ['../../backend/web/accion']],
                                    ['label' => 'Rol', 'icon' => 'check', 'url' => ['../../backend/web/rol']],
                                    ['label' => 'Rol - Accion', 'icon' => 'check', 'url' => ['../../backend/web/rol-accion']],
                                    ['label' => 'Recuperar Usuario', 'icon' => 'check', 'url' => ['../../backend/web/site/recuperar']],
                                    ['label' => 'Activar Usuario', 'icon' => 'check', 'url' => ['../../backend/web/site/activar']],
                                    ['label' => 'Cambiar Clave', 'icon' => 'check', 'url' => ['../../backend/web/site/cambiar']],
                            ],];
            $menuItems[] = ['label' => 'Tablas Básicas', 'icon' => 'folder-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Conceptos', 'icon' => 'check', 'url' => ['../../backend/web/conceptos']],
                                    ['label' => 'Bancos', 'icon' => 'check', 'url' => ['../../backend/web/bancos']],
                                    ['label' => 'Cuentas Bancarias', 'icon' => 'check', 'url' => ['../../backend/web/cuentas-bancarias']],
                            ],];
            $menuItems[] = ['label' => 'Enviar correo', 'icon' => 'envelope', 'url' => ['../../backend/web/site/']];
        }
    ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
