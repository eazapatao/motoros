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
                        <a class="btn btn-app"  href="<?= base_url()?>usuario/nuevo_usuario">
                            <i class="fa fa-edit"></i> Nuevo usuario
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                <table id="usuario_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Cargo</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Salida</th>
                        <?php   $arr = $arr = $this->session->userdata('logged_in');
                        if($arr['role'] == 1)
                        {?>
                        <th>Opciones</th>
                        <?php }?>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Cargo</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Salida</th>
                        <?php   $arr = $arr = $this->session->userdata('logged_in');
                        if($arr['role'] == 1)
                        {?>
                        <th>Opciones</th>
                        <?php }?>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($usuario as $key) {?>
                        <tr>
                            <td><?= $key['usu_nombre']?></td>
                            <td><?= $key['usu_apellido']?></td>
                            <td><?= $key['usu_cedula']?></td>
                            <td><?= $key['usu_direccion']?></td>
                            <td><?= $key['usu_telefono']?></td>
                            <td><?= $key['car_nombre']?></td>
                            <td><?= $key['usu_fechaingreso']?></td>
                            <td><?= $key['usu_fechaegreso']?></td>
                            <?php   $arr = $arr = $this->session->userdata('logged_in');
                            if($arr['role'] == 1)
                            {?>
                            <td>
                                <a href="<?php echo base_url()?>usuario/editar/<?php echo $key['usu_id']?>" type="button" class="btn btn-xs btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a data-ref="<?php echo base_url()?>usuario/del/<?php echo $key['usu_id']?>"  type="button" class="btn btn-xs btn-danger delete" data-toggle="confirmation" data-placement="left">
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