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
        </ol><br>
        <?php
        $dia=date("d");
        ?>


    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-danger">

                    <div class="box-header">
                        <h3 class="box-title">Sim card hoy</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                            <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Observaciones</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Observaciones</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($data["hoy"] as $key=>$value) {?>
                                    <tr>
                                        <td><?= $value['cli_nombre'].' '.$value['cli_apellido']?></td>
                                        <td><?= $value["prox_observaciones"]?></td>
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
                        <h3 class="box-title">Sim card +2 días</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Observaciones</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Observaciones</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php foreach ($data["dos"] as $key=>$value) {?>
                                <tr>
                                    <td><?= $value['cli_nombre'].' '.$value['cli_apellido']?></td>
                                    <td><?= $value["prox_observaciones"]?></td>
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
                        <h3 class="box-title">Sim card +3 dias</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Observaciones</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Observaciones</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php foreach ($data["otros"] as $key=>$value) {?>
                                <tr>
                                    <td><?= $value['cli_nombre'].' '.$value['cli_apellido']?></td>
                                    <td><?= $value["prox_observaciones"]?></td>
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