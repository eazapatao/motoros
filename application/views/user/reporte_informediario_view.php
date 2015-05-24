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
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="">Total saldo hoy</th>


                            </tr>
                            <tr>
                                <td>$<?= number_format ($totales[0]['sal_saldo'], 0, ',', '.')?></td>


                            </tr>

                            </tbody></table>
                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">

                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>No Factura</th>
                                    <th>Tipo</th>
                                    <th>Entra</th>
                                    <th>Sale</th>
                                    <th>Detalle</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>No Factura</th>
                                    <th>Tipo</th>
                                    <th>Entra</th>
                                    <th>Sale</th>
                                    <th>Detalle</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($informesdiarios as $key) {?>
                                    <tr>
                                        <td><?= $key['ope_fecha']?></td>
                                        <td><?= $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                                        <td><?= $key['usu_nombre'].' '.$key['usu_apellido']?></td>
                                        <td><?= $key['ope_nfactura']?></td>
                                        <td><?= $key['ope_tipo']?></td>
                                        <td><?= $key['inf_entra']?></td>
                                        <td><?= $key['inf_sale']?></td>
                                        <td><?= $key['ope_observaciones']?></td>


                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->