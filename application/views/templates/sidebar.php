<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?php   $arr = $arr = $this->session->userdata('logged_in');
            if($arr['role'] == 1)
            {?>
            <li class="<?php if($label == "dash") echo "class=active" ?>">
                <a href="<?=base_url()?>admin">
                    <i class="fa fa-dashboard"></i> <span>Inicio</span>
                </a>
            </li>
            <?php } else {?>
            <li class="<?php if($label == "dash") echo "class=active" ?>">
                <a href="<?=base_url()?>inicio">
                    <i class="fa fa-dashboard"></i> <span>Inicio</span>
                </a>
            </li>
            <?php }?>
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
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>alquiler/agregaroquitardatos"><i class="fa fa-angle-double-right"></i>Agregar o quitar datos</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>plan"><i class="fa fa-angle-double-right"></i>Administración de planes</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>linea/devolucion_linea"><i class="fa fa-angle-double-right"></i>Devolución de líneas</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>linea/programar_entregasim"><i class="fa fa-angle-double-right"></i>Programar devolución sim</a></li>
                 <!--   <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>control"><i class="fa fa-angle-double-right"></i>Control de adicionales</a></li> -->

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
            <?php   $arr = $arr = $this->session->userdata('logged_in');
            if($arr['role'] == 1)
            {?>
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
            <?php }?>

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

            <li class="">
                <a href="<?= base_url()?>conteo">
                    <i class="fa fa-usd"></i> <span>Conteo de dinero</span>
                </a>
            </li>

            <li class="treeview <?php if($label == "nom") echo "active" ?>">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Reportes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">

                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>reportes/ver_estadocuentas"><i class="fa fa-angle-double-right"></i>Estados de cuentas</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>reportes/ver_estadocuentasxfecha"><i class="fa fa-angle-double-right"></i>Estado de cuentas x fecha</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>reportes/ver_informediario"><i class="fa fa-angle-double-right"></i>Informe diario</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>nomina/verprestamo"><i class="fa fa-angle-double-right"></i>Ver Préstamos</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>reportes/lineasxcorte"><i class="fa fa-angle-double-right"></i>Líneas x corte</a></li>
                    <li <?php if($label2 == "new") echo "class=active" ?>><a href="<?= base_url()?>reportes/morosos"><i class="fa fa-angle-double-right"></i>EC clientes sin lineas</a></li>


                </ul>

            </li>
            <?php   $arr = $arr = $this->session->userdata('logged_in');
            if($arr['role'] == 2)
            {?>
            <li class="treeview <?php if($label == "nom") echo "active" ?>">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Registrar cambios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">

                    <li <?php if($label2 == "list") echo "class=active" ?>><a href="<?= base_url()?>cambios"><i class="fa fa-angle-double-right"></i>Lista de cambios</a></li>


                </ul>

            </li>
<?php } else{?>
                <li class="treeview <?php if($label == "nom") echo "active" ?>">
                    <a href="#">
                        <i class="fa fa-file"></i>
                        <span>cambios pendientes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu">

                        <li <?php if($label2 == "list") echo "class=active" ?>><a href="<?= base_url()?>cambios"><i class="fa fa-angle-double-right"></i>Lista de cambios</a></li>


                    </ul>

                </li>
<?php }?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>