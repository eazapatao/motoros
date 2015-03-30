<header class="header">

<a href="index.html" class="logo icon">
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

<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        <span class="label label-warning"><?php
            echo (count($cortes[5])+count($cortes[10])+count($cortes[15]));
            ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header"><?=(count($cortes[5])+count($cortes[10])+count($cortes[15]));?> Lineas tienen corte en:</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li>
                    <a href="#">
                        <i class="fa fa-warning danger"></i><?=count($cortes[5])?> Lineas en menos cinco días.
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-warning warning"></i> <?=count($cortes[10])?> Lineas en menos diez días.
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-warning success"></i> <?=count($cortes[15])?> Lineas en menos 15 días.
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer"><a href="#">Ver todas</a></li>
    </ul>
</li>
<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-user"></i>
        <span>Jane Doe <i class="caret"></i></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header bg-light-blue">
            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
            <p>
                Jane Doe - Web Developer
                <small>Member since Nov. 2012</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="<?= base_url()?>login/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">