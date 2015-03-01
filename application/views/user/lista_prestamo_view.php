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
                        <a class="btn btn-app"  href="<?= base_url()?>nomina/nuevo_prestamo">
                            <i class="fa fa-edit"></i> Nuevo préstamo
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="prestamo_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                    <th>Coutas</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                    <th>Cuotas</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($nomina as $key) {?>
                                    <tr>
                                        <td><?= $key['emppre_usu_id']?></td>
                                        <td><?= $key['emppre_fecha']?></td>
                                        <td><?= $key['emppre_valor']?></td>
                                        <td><?= $key['emppre_cuotas']?></td>
                                    <td>
                                            <a href="<?php echo base_url()?>linea/editar/<?php echo $key['emppre_id']?>" type="button" class="btn btn-xs btn-warning">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url()?>linea/del/<?php echo $key['emppre_id']?>" type="button" class="btn btn-xs btn-danger">
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