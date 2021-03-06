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
                        <a class="btn btn-app"  href="<?= base_url()?>alquiler/nuevo_alquiler">
                            <i class="fa fa-edit"></i> Nuevo alquiler
                        </a>
                        <a class="btn btn-app"  href="<?= base_url()?>linea/verhistorial">
                            <i class="fa fa-edit"></i> Historial
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Obervaciones</th>
                                    <th>Tipo</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha finalizacion</th>
                                    <?php   $arr = $arr = $this->session->userdata('logged_in');
                                    if($arr['role'] == 1)
                                    {?>
                                    <th>Opciones</th>
                                    <?php }?>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Obervaciones</th>
                                    <th>Tipo</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha finalizacion</th>
                                    <?php   $arr = $arr = $this->session->userdata('logged_in');
                                    if($arr['role'] == 1)
                                    {?>
                                    <th>Opciones</th>
                                    <?php }?>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($alquiler as $key) {?>
                                    <tr>
                                        <td><?= $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                                        <td><?= $key['alq_observaciones']?></td>
                                        <td><?= $key['alq_tipo']?></td>
                                        <td><?= $key['alq_fecha']?></td>
                                        <td><?= $key['alq_fechafin']?></td>
                                        <?php   $arr = $arr = $this->session->userdata('logged_in');
                                        if($arr['role'] == 1)
                                        {?>
                                  <td>
                                            <a href="<?php echo base_url()?>alquiler/editar/<?php echo $key['alq_id']?>" type="button" class="btn btn-xs btn-warning">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>

                                        <a data-ref="<?php echo base_url()?>alquiler/del/<?php echo $key['alq_id']?>"  type="button" class="btn btn-xs btn-danger delete" data-toggle="confirmation" data-placement="left">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                        </td>
                                        <?php }?>
                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->