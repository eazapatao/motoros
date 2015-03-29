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
                        <a class="btn btn-app"  href="<?= base_url()?>plan/nuevo_plan">
                            <i class="fa fa-edit"></i> Nuevo Plan
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Minutos</th>
                                    <th>Valor del minuto</th>
                                    <th>Cargo básico</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Minutos</th>
                                    <th>Valor del minuto</th>
                                    <th>Cargo básico</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($plan as $key) {?>
                                    <tr>
                                        <td><?= $key['pla_nombre']?></td>
                                        <td><?= $key['pla_totalmin']?></td>
                                        <td><?= $key['pla_vlrmin']?></td>
                                        <td><?= $key['pla_cargobasico']?></td>

                                        <td>
                                            <a href="<?php echo base_url()?>plan/editar/<?php echo $key['pla_id']?>" type="button" class="btn btn-xs btn-warning">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>

                                            <a data-ref="<?php echo base_url()?>plan/del/<?php echo $key['pla_id']?>"  type="button" class="btn btn-xs btn-danger delete" data-toggle="confirmation" data-placement="left">
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