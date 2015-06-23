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
        <a class="btn btn-primary" id="cortes" href="<?= base_url()?>notificaciones/proximipago/<?=$dia?>">
            <i class="fa fa-edit"></i> Programar próximo pago
        </a>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-danger">

                    <div class="box-header">
                        <h3 class="box-title">Facturaciones hoy</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                            <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                                <thead>
                                <tr>
                                    <th>Linea</th>
                                    <th>Valor a pagar</th>

                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Linea</th>
                                    <th>Valor a pagar</th>

                                </tr>
                                </tfoot>

                                <tbody>
                                <?php

                                foreach ($data["hoy"] as $key=>$value) {
                                  ?>
                                    <tr>
                                        <td><?= $value["lin_numero"]?></td>
                                        <td><?= $value["con_valorapagar"]?></td>

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
                        <h3 class="box-title">Facturación +2 días</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>Linea</th>
                                <th>Valor a pagar</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Linea</th>
                                <th>Valor a pagar</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php foreach ($data["dos"] as $key) {?>
                                <tr>
                                    <td><?= $key['lin_numero']?></td>
                                    <td><?= $key['con_valorapagar']?></td>
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
                        <h3 class="box-title">Facturación +3 dias</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="" class="listas_general table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>Linea</th>
                                <th>Valor a pagar</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Linea</th>
                                <th>Valor a pagar</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php foreach ($data["otros"] as $key) {?>
                                <tr>
                                    <td><?= $key['lin_numero']?></td>
                                    <td><?= $key['con_valorapagar']?></td>
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