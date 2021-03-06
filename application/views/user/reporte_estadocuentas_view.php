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
                            <table id="line_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Ticket de alquiler</th>
                                    <th>Cliente</th>
                                    <th>Debe</th>
                                    <th>Abonos</th>
                                    <th>Saldo</th>
                                    <th>Estado</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Ticket de alquiler</th>
                                    <th>Cliente</th>
                                    <th>Debe</th>
                                    <th>Abonos</th>
                                    <th>Saldo</th>
                                    <th>Estado</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($estadocuentas as $key) {?>
                                    <tr>
                                        <td><?= $key['estcue_alq_id']?></td>
                                        <td><?= $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                                        <td>$<?= number_format ($key['estcue_debe'], 0, ',', '.')?></td>
                                        <td>$<?= number_format ($key['estcue_abono'], 0, ',', '.')?></td>
                                        <td>$<?= number_format ($key['estcue_saldo'], 0, ',', '.')?></td>
                                        <td><?=$key['estcue_estado']?></td>


                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->