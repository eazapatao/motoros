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
                        <a class="btn btn-app"  href="<?= base_url()?>control/nuevo_control">
                            <i class="fa fa-edit"></i> Nuevo control de adicionales
                        </a>

                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Línea</th>
                                    <th>fecha</th>
                                    <th>Valor facturado</th>
                                    <th>Cárgo básico</th>
                                    <th>Adicionales</th>
                                    <th>Descuentos</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Línea</th>
                                    <th>fecha</th>
                                    <th>Valor facturado</th>
                                    <th>Cárgo básico</th>
                                    <th>Adicionales</th>
                                    <th>Descuentos</th>

                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($controles as $control) {?>
                                    <tr>
                                        <td><?= $control['lin_numero']?></td>
                                        <td><?= $control['con_fecha']?></td>
                                        <td><?= $control['con_facturacion']?></td>
                                        <td><?= $control['pla_cargobasico']?></td>
                                        <td><?= $control['con_facturacion'] - $control['pla_cargobasico']?></td>
                                        <td><?= $control['con_descuentos']?></td>

                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->