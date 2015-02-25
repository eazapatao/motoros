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
                        <a class="btn btn-app"  href="<?= base_url()?>detallebanco/nuevo_detallebanco">
                            <i class="fa fa-edit"></i> Nueva transaccion bancaria
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="banco_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Banco</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Transacción</th>
                                    <th>Valor</th>
                                    <th>Detalle</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Banco</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Transacción</th>
                                    <th>Valor</th>
                                    <th>Detalle</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($detallebanco as $key) {?>
                                    <tr>
                                        <td><?= $key['detban_ban_id']?></td>
                                        <td><?= $key['detban_cli_id']?></td>
                                        <td><?= $key['detban_fecha']?></td>
                                        <td><?= $key['detban_transaccion']?></td>
                                        <td><?= $key['detban_valor']?></td>
                                        <td><?= $key['detban_detalle']?></td>
                                    <td>
                                            <a href="<?php echo base_url()?>detallebanco/editar/<?php echo $key['detban_id']?>" type="button" class="btn btn-xs btn-warning">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                           <!-- <a href="<?php echo base_url()?>detallebanco/del/<?php echo $key['detban_id']?>" type="button" class="btn btn-xs btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a> -->
                                        </td>
                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->