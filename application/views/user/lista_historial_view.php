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
                        <a class="btn btn-app"  href="<?= base_url()?>linea/nuevo_historial">
                            <i class="fa fa-edit"></i> Lista historial
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Línea</th>
                                    <th>Ticket Alquiler</th>
                                    <th>Valor del minuto vendido</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Línea</th>
                                    <th>Ticket Alquiler</th>
                                    <th>Valor del minuto vendido</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($historial as $key) {?>
                                    <tr>
                                        <td><?= $key['his_lin_id']?></td>
                                        <td><?= $key['his_alq_id']?></td>
                                        <td><?= $key['his_valor_minvend']?></td>

                                        <td>
                                            <a href="<?php echo base_url()?>linea/editarh/<?php echo $key['lin_id']?>" type="button" class="btn btn-xs btn-warning">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url()?>linea/delh/<?php echo $key['lin_id']?>" type="button" class="btn btn-xs btn-danger">
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