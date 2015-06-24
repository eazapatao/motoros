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
                        <a class="btn btn-app"  href="<?= base_url()?>nomina/nuevo_nomina">
                            <i class="fa fa-edit"></i> Nuevo registro de nómina
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                <table id="nomina_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nomina</th>
                        <th>Días laborados</th>
                        <th>Descuentos</th>
                        <th>Descuadres</th>
                        <th>Liquidación</th>
                        <th>Novedades</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Total</th>
                        <?php   $arr = $arr = $this->session->userdata('logged_in');
                        if($arr['role'] == 1)
                        {?>
                        <th>Opciones</th>
                        <?php }?>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Usuario</th>
                        <th>Nomina</th>
                        <th>Días laborados</th>
                        <th>Descuentos</th>
                        <th>Descuadres</th>
                        <th>Liquidación</th>
                        <th>Novedades</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Total</th>
                        <?php   $arr = $arr = $this->session->userdata('logged_in');
                        if($arr['role'] == 1)
                        {?>
                        <th>Opciones</th>
                        <?php }?>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($nomina as $key) {?>
                        <tr>
                            <td><?= $key['usu_nombre'].' '.$key['usu_apellido']?></td>
                            <td><?= $key['nomquin_nomina']?></td>
                            <td><?= $key['nomquin_diaslaborados']?></td>
                            <td><?= $key['nomquin_descuentos']?></td>
                            <td><?= $key['nomquin_descuadres']?></td>
                            <td><?= $key['nomquin_liquidacion']?></td>
                            <td><?= $key['nomquin_novedades']?></td>
                            <td><?= $key['nomquin_fechainicio']?></td>
                            <td><?= $key['nomquin_fechafin']?></td>
                            <td><?= $key['nomquin_total']?></td>
                            <?php   $arr = $arr = $this->session->userdata('logged_in');
                            if($arr['role'] == 1)
                            {?>
                            <td>
                                <a href="<?php echo base_url()?>nomina/editar/<?php echo $key['nomquin_id']?>" type="button" class="btn btn-xs btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a data-ref="<?php echo base_url()?>nomina/del/<?php echo $key['nomquin_id']?>"  type="button" class="btn btn-xs btn-danger delete" data-toggle="confirmation" data-placement="left">
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