<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="<?php if($label == "dash") echo "class=active" ?>">
                <a href="index.html">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview <?php if($label == "dir")  ?>">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Directorio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php if($label2 == "list") echo "class=active" ?>><a href="<?= base_url()?>directorio"><i class="fa fa-angle-double-right"></i> Lista de clientes</a></li>

                </ul>
            </li>

            <li class="treeview <?php if($label == "lin")  ?>">
                <a href="#">
                    <i class="fa fa-tty"></i>
                    <span>Administración de líneas</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php if($label2 == "list") echo "class=active" ?>><a href="<?= base_url()?>linea"><i class="fa fa-angle-double-right"></i>Líneas</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>alquiler"><i class="fa fa-angle-double-right"></i>Alquiler de líneas</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>plan"><i class="fa fa-angle-double-right"></i>Administración de planes</a></li>

                </ul>
            </li>

            <li class="treeview <?php if($label == "fac") echo "active" ?>">
                <a href="#">
                    <i class="fa fa-building-o"></i>
                    <span>Facturación</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">


                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>detallebanco"><i class="fa fa-angle-double-right"></i>Bancos</a></li>
                    <li <?php if($label2 == "list") echo "class=active" ?>><a href="<?= base_url()?>operacion"><i class="fa fa-angle-double-right"></i>Ingresos/Egresos</a></li>

                </ul>
            </li>

            <li class="treeview <?php if($label == "usu") echo "active" ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">

                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>usuario"><i class="fa fa-angle-double-right"></i>Listar usuarios</a></li>


                </ul>

            </li>


            <li class="treeview <?php if($label == "nom") echo "active" ?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Nómina</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">

                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>nomina"><i class="fa fa-angle-double-right"></i>Listar Pagos</a></li>

                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>nomina/verprestamo"><i class="fa fa-angle-double-right"></i>Ver Préstamos</a></li>

                </ul>

            </li>

            <li class="active">
                <a href="<?= base_url()?>nomina/conteo">
                    <i class="fa fa-usd"></i> <span>Conteo de dinero</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>