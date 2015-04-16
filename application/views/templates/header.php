<header class="header">

<a href="<?=base_url()?>admin" class="logo icon">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    <img class="logo" src="<?php echo base_url()?>asset/img/logo.png">
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<div class="navbar-right">
<ul class="nav navbar-nav">



<!-- Messages: style can be found in dropdown.less
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-phone"></i>
        <span class="label label-warning"><?php
            echo ($cortes["hoy"]+$cortes["dos"]+$cortes["otros"]);
            ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header"><?=$cortes["hoy"]+$cortes["dos"]+$cortes["otros"];?> Lineas tienen corte en:</li>
        <li>

            <ul class="menu">
                <li>
                    <a href="#">
                        <i class="fa fa-warning danger"></i><?=$cortes["hoy"]?> Lineas hoy.
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-warning warning"></i> <?=$cortes["dos"]?> Lineas en menos dos días.
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-warning success"></i> <?=$cortes["otros"]?> Lineas en menos 15 días.
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer"><a href="#">Ver todas</a></li>
    </ul>
</li>-->

    <!-- Messages: style can be found in dropdown.less-->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        <span class="label label-warning"><?php
            echo ($cortes["hoy"]+$cortes["dos"]+$cortes["otros"]);
            ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header"><?=$cortes["hoy"]+$cortes["dos"]+$cortes["otros"];?> Lineas tienen corte en:</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-warning danger"></i><?=$cortes["hoy"]?> Lineas hoy.
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-warning warning"></i> <?=$cortes["dos"]?> Lineas en menos dos días.
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-warning success"></i> <?=$cortes["otros"]?> Lineas en menos 15 días.
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer"><a href="<?=base_url()?>notificacion/cortes">Ver todas</a></li>
    </ul>
</li>
<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-user"></i>
        <span>



            <i class="caret"></i></span>
    </a>
    <ul class="dropdown-menu">

        <li class="user-header bg-light-blue">

            <p>
                <?=$user['username']?><br>
               <?php echo date("d-m-Y"); ?>
            </p>
        <div class="pull-center">
                <a href="<?= base_url()?>login/logout" class="btn btn-default btn-flat">Cerrar sesión</a>
            </div>
        </li>

        <!-- Menu Body -->

        <!-- Menu Footer-->

    </ul>
</li>
</ul>
</div>
</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">