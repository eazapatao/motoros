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
            <div class="col-lg-6">
                <div class="box box-danger">

                    <div class="box-header">
                        <h3 class="box-title">Cortes hoy</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                            <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                                <thead>
                                <tr>
                                    <th>Linea</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Celular</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Linea</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Celular</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($data["hoy"] as $key) {?>
                                    <tr>
                                        <td><?= $key['lin_num']?></td>
                                        <td><?= $key[0]['cli_nombre'].' '.$key[0]['cli_apellido']?></td>
                                        <td><?= $key[0]['cli_telefono']?></td>
                                        <td><?= $key[0]['cli_celular']?></td>
                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                   </div>
            </div>
            <div class="col-lg-6">
                <div class="box box-warning">

                    <div class="box-header">
                        <h3 class="box-title">Cortes +2 días</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>Linea</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Linea</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php foreach ($data["dos"] as $key) {?>
                                <tr>
                                    <td><?= $key['lin_num']?></td>
                                    <td><?= $key[0]['cli_nombre'].' '.$key[0]['cli_apellido']?></td>
                                    <td><?= $key[0]['cli_telefono']?></td>
                                    <td><?= $key[0]['cli_celular']?></td>
                                </tr>
                            <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box box-success">

                    <div class="box-header">
                        <h3 class="box-title">Cortes +3 dias</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>Linea</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Linea</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php foreach ($data["otros"] as $key) {?>
                                <tr>
                                    <td><?= $key['lin_num']?></td>
                                    <td><?= $key[0]['cli_nombre'].' '.$key[0]['cli_apellido']?></td>
                                    <td><?= $key[0]['cli_telefono']?></td>
                                    <td><?= $key[0]['cli_celular']?></td>
                                </tr>
                            <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.rig