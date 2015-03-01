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
                        <a class="btn btn-app"  href="<?= base_url()?>linea/nueva_linea">
                            <i class="fa fa-edit"></i> Nueva linea
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Plan</th>
                                    <th>Número celular</th>
                                    <th>Fecha de corte</th>
                                    <th>Estado de la línea</th>
                                    <th>Operador</th>
                                    <th>Valor del minuto vendido</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Plan</th>
                                    <th>Número celular</th>
                                    <th>Fecha de corte</th>
                                    <th>Estado de la línea</th>
                                    <th>Operador</th>
                                    <th>Valor del minuto vendido</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($lineas as $key) {?>
                                    <tr>
                                        <td><?= $key['lin_pla_id']?></td>
                                        <td><?= $key['lin_numero']?></td>
                                        <td><?= $key['lin_corte']?></td>
                                        <td><?= $key['lin_estado']?></td>
                                        <td><?= $key['lin_operador']?></td>
                                        <td><?= $key['lin_vlorminvend']?></td>
                                    <td>
                                            <a href="<?php echo base_url()?>linea/editar/<?php echo $key['lin_id']?>" type="button" class="btn btn-xs btn-warning">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url()?>linea/del/<?php echo $key['lin_id']?>" type="button" class="btn btn-xs btn-danger">
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