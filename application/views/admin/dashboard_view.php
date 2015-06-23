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
            <a href="http://www.claro.com.co" class="small-box-footer" target="_blank">
                Claro <i class="fa fa-arrow-circle-right"></i>
            </a>
            <a href="http://www.tigo.com.co" class="small-box-footer" target="_blank">
                Tigo <i class="fa fa-arrow-circle-right"></i>
            </a>
            <a href="http://www.movistar.com.co" class="small-box-footer" target="_blank">
                Movistar <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- Informe mensual de caja -->
    <div class="col-lg-6">
        <div class="box box-success">
            <div class="box-header">
                <?php $mes=date('M');?>
                <h3 class="box-title">Informe en caja</h3>
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
    </div>


    <!-- Main content -->
    <section class="content">

    </section><!-- /.content -->
</aside><!-- /.right-side -->