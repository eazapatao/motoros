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

                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">

                <table id="client_list" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        <th>Observaciones</th>

                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        <th>Observaciones</th>

                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($data as $key) {?>
                        <tr>
                            <td><?= $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                            <td><?= $key['cli_telefono'].'-'.$key['cli_celular']?></td>
                            <td><?= $key['prox_fecha']?></td>
                            <td><?= $key['prox_observaciones']?></td>
                        </tr>
                    <?php }?>

                    </tbody>
                </table>
            </div>
            </div>

        </div>

    </section><!-- /.content  -->
</aside><!-- /.right-side -->