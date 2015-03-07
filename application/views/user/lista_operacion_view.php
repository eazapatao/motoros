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
                        <a class="btn btn-app"  href="<?= base_url()?>operacion/nuevo_operacion">
                            <i class="fa fa-edit"></i> Nueva operación
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Fecha</th>
                                    <th>Número de factura</th>
                                    <th>Observaciones</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Fecha</th>
                                    <th>Número de factura</th>
                                    <th>Observaciones</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($operacion as $key) {?>
                                    <tr>
                                        <td><?=  $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                                        <td><?= $key['usu_nombre'].' '.$key['usu_apellido']?></td>
                                        <td><?= $key['ope_tipo']?></td>
                                        <td><?= $key['ope_valor']?></td>
                                        <td><?= $key['ope_fecha']?></td>
                                        <td><?= $key['ope_nfactura']?></td>
                                        <td><?= $key['ope_observaciones']?></td>
                                    <td>
                                            <a href="<?php echo base_url()?>operacion/editar/<?php echo $key['ope_id']?>" type="button" class="btn btn-xs btn-warning">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url()?>operacion/del/<?php echo $key['ope_id']?>" type="button" class="btn btn-xs btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
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