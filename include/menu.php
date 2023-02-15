<?php

$menuList = array(
    'Dashboard' => 'index.php',
    'Cadastro' => array(
        'Cliente' => '#',
        'Fornecedor' => '#',
        'Perfil de acesso' => '#',
        'Produtos' => '#',
        'Usuário' => '#',
    ),
    'Relatório' => array(
        'Cliente' => '#',
        'Faturamento' => '#',
        'Produtos' => '#',
    ),
);

?>


<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search" action="extra_search.html" method="POST">
                    <div class="form-container">
                        <div class="input-box">
                            <a href="javascript:;" class="remove"></a>
                            <input type="text" placeholder="Search..." />
                            <input type="button" class="submit" value=" " />
                        </div>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>


            <?php foreach ($menuList as $menuItemName => $menuItemUrl) :


                /**
                 * 
                 * Verifica qual o valor de $menuItemName (nome de cada item do menu) e adiciona o respectivo
                 * icone da lista.
                 * 
                 * */


                $menuItemIcon = '';

                switch ($menuItemName) {

                    case "Dashboard":
                        $menuItemIcon = 'fa-home';
                        break;
                    case "Cadastro":
                        $menuItemIcon = 'fa-file-text';
                        break;
                    case "Relatório":
                        $menuItemIcon = 'fa-bar-chart-o';
                        break;
                    default:
                        $menuItemIcon = '';
                        break;
                }


                /**
                 * 
                 * Verifica se o valor da variável $menuItemUrl não é do tipo array, se a condição for satisfeita 
                 * é montada uma <li> para um link direto para a página desejada (sem sub-listas de dropdown).
                 * 
                 * Se a condição não for satisfeita é renderizada uma uma subcamada de listas com outras tags <li>
                 * contendo os itens do dropdown.
                 * 
                 * */

                if (!is_array($menuItemUrl)) : ?>

                    <li class="start active">
                        <a href="<?= $menuItemUrl ?>">
                            <?php if ($menuItemIcon !== '') : ?>
                                <i class="<?= "fa $menuItemIcon" ?>"></i>
                            <?php endif; ?>
                            <span class="title">
                                <?= $menuItemName ?>
                            </span>
                            <span class="selected">
                            </span>
                        </a>
                    </li>
                    <!--Cliente-->

                <?php else : ?>

                    <li class="">
                        <a href="javascript:;">
                            <?php if ($menuItemIcon !== '') : ?>
                                <i class="<?= "fa $menuItemIcon" ?>"></i>
                            <?php endif; ?>
                            <span class="title">
                                <?= $menuItemName ?>
                            </span>
                            <span class="arrow ">
                            </span>
                        </a>
                        <ul class="sub-menu">

                            <?php foreach ($menuItemUrl as $menuItemDropdownItem => $menuItemDropdownUrl) : ?>
                                <li>
                                    <a href="<?= $menuItemDropdownUrl ?>"><?= $menuItemDropdownItem ?></a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </li>

                <?php endif; ?>

            <?php endforeach; ?>


        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->