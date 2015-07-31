<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            El número líneas de este corte es: <?=$numerodelineas?><br>
            El número líneas de Mys es: <?=$numerodelineasmys?><br>
            El número líneas de Alejandro es: <?=$numerodelineasalejandro?>
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
                                    <th>Línea</th>
                                    <th>Cliente</th>
                                    <th>Propietario</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Línea</th>
                                    <th>Cliente</th>
                                    <th>Propietario</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($lineasxcorte as $key) {?>
                                    <tr>
                                        <td><?= $key['lin_numero']?></td>
                                        <td><?= $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                                        <td><?= $key['lin_propietario']?></td>
                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->