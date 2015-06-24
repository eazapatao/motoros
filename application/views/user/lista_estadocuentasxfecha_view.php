<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">

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
                                    <th>Cliente</th>
                                    <th>Linea</th>
                                    <th>Debe</th>
                                    <th>Abono</th>
                                    <th>Saldo</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Linea</th>
                                    <th>Debe</th>
                                    <th>Abono</th>
                                    <th>Saldo</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($ecxfecha as $key) {?>
                                    <tr>
                                        <td><?= $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                                        <td><?= $key['lin_numero']?></td>
                                        <td><?= $key['estcuefec_estcue_debe']?></td>
                                        <td><?= $key['estcuefec_estcue_abono']?></td>
                                        <td><?= $key['estcuefec_estcue_saldo']?></td>
                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->