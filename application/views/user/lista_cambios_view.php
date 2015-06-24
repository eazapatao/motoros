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
                                <a class="btn btn-app"  href="<?= base_url()?>cambios/nuevo_cambios">
                                    <i class="fa fa-edit"></i> Nuevo Cambio
                                </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">

                <table id="client_list" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Campo</th>
                        <th>Descripción</th>
                        <th>Estado</th>
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
                        <th>Campo</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <?php   $arr = $arr = $this->session->userdata('logged_in');
                        if($arr['role'] == 1)
                        {?>
                            <th>Opciones</th>
                        <?php }?>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($cambios as $key) {?>
                        <tr>
                            <td><?= $key['cam_nombre']?></td>
                            <td><?= $key['cam_campo']?></td>
                            <td><?= $key['cam_descripcion']?></td>
                            <td><?= $key['cam_estado']?></td>
                            <?php   $arr = $arr = $this->session->userdata('logged_in');
                            if($arr['role'] == 1)
                            {?>
                                <td>

                                    <a data-ref="<?php echo base_url()?>cambios/del/<?php echo $key['cam_id']?>"  type="button" class="btn btn-xs btn-danger delete" data-toggle="confirmation" data-placement="left">
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

    </section><!-- /.content  -->
</aside><!-- /.right-side -->