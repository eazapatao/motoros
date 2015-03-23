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
                                <a class="btn btn-app"  href="<?= base_url()?>directorio/nuevo_cliente">
                                    <i class="fa fa-edit"></i> Nuevo cliente
                                </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">

                <table id="client_list" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dirección</th>
                        <th>Barrio</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Ciudad</th>
                        <th>Categoría</th>
                        <th>Observaciones</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dirección</th>
                        <th>Barrio</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Ciudad</th>
                        <th>Categoría</th>
                        <th>Observaciones</th>
                        <th>Opciones</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($clientes as $key) {?>
                        <tr>
                            <td><?= $key['cli_cedula']?></td>
                            <td><?= $key['cli_nombre']?></td>
                            <td><?= $key['cli_apellido']?></td>
                            <td><?= $key['cli_direccion']?></td>
                            <td><?= $key['cli_barrio']?></td>
                            <td><?= $key['cli_telefono']?></td>
                            <td><?= $key['cli_celular']?></td>
                            <td><?= $key['cli_ciudad']?></td>
                            <td><?= $key['cli_tipo']?></td>
                            <td><?= $key['cli_observaciones']?></td>
                            <td>
                                <a href="<?php echo base_url()?>directorio/editar/<?php echo $key['cli_id']?>" type="button" class="btn btn-xs btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a data-ref="<?php echo base_url()?>directorio/del/<?php echo $key['cli_id']?>"  type="button" class="btn btn-xs btn-danger delete" data-toggle="confirmation" data-placement="left">
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

    </section><!-- /.content  -->
</aside><!-- /.right-side -->