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

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <br>

                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Línea</th>
                                    <th>Corte</th>

                                    <th>Valor del minuto vendido</th>
                                    <th>Cargo por voz</th>
                                    <th>Datos</th>
                                    <th>Cargo por datos</th>
                                    <th>Total</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Línea</th>
                                    <th>Corte</th>

                                    <th>Valor del minuto vendido</th>
                                    <th>Cargo por voz</th>
                                    <th>Datos</th>
                                    <th>Cargo por datos</th>
                                    <th>Total</th>

                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($historial as $key) {?>
                                    <tr>
                                        <td><?= $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                                        <td><?= $key['lin_numero']?></td>
                                        <td><?= $key['lin_corte']?></td>

                                        <td><?= $key['his_valor_minvend']?></td>
                                        <td><?= $key['his_valor_minvend'] * ($key['pla_totalmin']+$key['lin_pasaminutos']-$key['lin_minutosconsumidos'])?></td>
                                        <td><?= $key['dat_nombre']?></td>
                                        <td><?= $key['dat_precio']?></td>
                                        <td><?= $key['his_cargobasico']?></td>

                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->