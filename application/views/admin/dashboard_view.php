<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $menu?>
            <small><?= $titulo?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?= $menu?></a></li>
            <li class="active"><?= $titulo?></li>
        </ol>
    </section>

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    Motoros
                </h3>
                <p>
                    Página oficial
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="http://www.motoros.co" class="small-box-footer" target="_blank">
               Ir a la página <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- links del dashboard -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    Bancos
                </h3>
                <p>
                    Página oficial
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="http://www.bancolombia.com" class="small-box-footer" target="_blank">
                Bancolombia <i class="fa fa-arrow-circle-right"></i>
            </a>
            <a href="http://www.davivienda.com" class="small-box-footer" target="_blank">
                Davivienda <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- operadores -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    Operadores
                </h3>
                <p>
                   Página oficial
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="http://www.claro.com.co/wps/portal/co/pc/empresas" class="small-box-footer" target="_blank">
                Claro <i class="fa fa-arrow-circle-right"></i>
            </a>
            <a href="http://www.tigo.com.co" class="small-box-footer" target="_blank">
                Tigo <i class="fa fa-arrow-circle-right"></i>
            </a>
            <a href="http://www.movistar.co" class="small-box-footer" target="_blank">
                Movistar <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- Informe mensual de caja -->
    <div class="col-lg-12">
        <!--Informe de caja -->
        <div class="box box-success">
            <div class="box-header">
                <?php $mes=date('M');?>
                <h3 class="box-title">Informe al mes en caja</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">

                    <tbody><tr>
                        <th style="">Total ingresos</th>
                        <th>Total egresos</th>
                        <th style="">Saldo</th>
                    </tr>
                    <tr>
                        <td>$<?= number_format ($totalesM['debeb'], 0, ',', '.')?></td>
                        <td>$<?= number_format ($totalesM['haberb'], 0, ',', '.')?></td>
                        <td>$<?= number_format ($totalesM['deferenciab'], 0, ',', '.')?></td>
                    </tr>

                    </tbody></table>
            </div><!-- /.box-body -->
        </div>

        <!-- Informe de les cliente-->
        <div class="box box-success">
            <div class="box-header">
                <?php $mes=date('M');?>
                <h3 class="box-title">Informe al mes de transacciones de clientes</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">

                    <tbody><tr>
                        <th style="">Total ingresos</th>
                        <th>Total egresos</th>
                        <th style="">Saldo</th>
                    </tr>
                    <tr>
                        <td>$<?= number_format ($totalesMCliente['debeb'], 0, ',', '.')?></td>
                        <td>$<?= number_format ($totalesMCliente['haberb'], 0, ',', '.')?></td>
                        <td>$<?= number_format ($totalesMCliente['deferenciab'], 0, ',', '.')?></td>
                    </tr>

                    </tbody></table>
            </div><!-- /.box-body -->
        </div>

        <!-- Papeleria-->
        <div class="box box-success">
            <div class="box-header">
                <?php $mes=date('M');?>
                <h3 class="box-title">Informe al mes de gastos de papeleria</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">

                    <tbody><tr>
                        <th style="">Total</th>

                    </tr>
                    <tr>
                        <td>$<?= number_format ($totalesMPapeleria['debeb'], 0, ',', '.')?></td>

                    </tr>

                    </tbody></table>
            </div><!-- /.box-body -->
        </div>
        <!-- gasolina-->
        <div class="box box-success">
            <div class="box-header">
                <?php $mes=date('M');?>
                <h3 class="box-title">Informe al mes de gastos de gasolina</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">

                    <tbody><tr>
                        <th style="">Total</th>

                    </tr>
                    <tr>
                        <td>$<?= number_format ($totalesMgasolina['debeb'], 0, ',', '.')?></td>

                    </tr>

                    </tbody></table>
            </div><!-- /.box-body -->
        </div>
        <!-- Min vendido min comprado-->
        <div class="box box-success">
            <div class="box-header">
                <?php $mes=date('M');?>
                <h3 class="box-title">Informe al mes de facturaciones a pagar al operador / facturaciones clientes</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">

                    <tbody><tr>
                        <th style="">Total Facturaciones a cancelar</th>
                        <th>Total Facturaciones clientes</th>
                        <th style="">Saldo</th>
                    </tr>
                    <tr>
                        <td>$<?= number_format ($totalesminvend['debeb'], 0, ',', '.')?></td>
                        <td>$<?= number_format ($totalesminvend['haberb'], 0, ',', '.')?></td>
                        <td>$<?= number_format ($totalesminvend['deferenciab'], 0, ',', '.')?></td>
                    </tr>

                    </tbody></table>
            </div><!-- /.box-body -->
        </div>
    </div>



    <!-- Main content -->
    <section class="content">

    </section><!-- /.content -->
</aside><!-- /.right-side -->