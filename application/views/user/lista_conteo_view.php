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
                                <a class="btn btn-app"  href="<?= base_url()?>conteo/nuevo_conteo">
                                    <i class="fa fa-edit"></i> Nuevo conteo
                                </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">

                <table id="client_list" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Detalle</th>
                        <th>50</th>
                        <th>100</th>
                        <th>200</th>
                        <th>500</th>
                        <th>1.000</th>
                        <th>2.000</th>
                        <th>5.000</th>
                        <th>10.000</th>
                        <th>20.000</th>
                        <th>50.000</th>
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
                        <th>Fecha</th>
                        <th>Detalle</th>
                        <th>50</th>
                        <th>100</th>
                        <th>200</th>
                        <th>500</th>
                        <th>1.000</th>
                        <th>2.000</th>
                        <th>5.000</th>
                        <th>10.000</th>
                        <th>20.000</th>
                        <th>50.000</th>
                        <th>Total</th>
                        <?php   $arr = $arr = $this->session->userdata('logged_in');
                        if($arr['role'] == 1)
                        {?>
                        <th>Opciones</th>
                        <?php }?>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($conteo as $key) {?>
                        <tr>
                            <td><?= $key['den_fecha']?></td>
                            <td><?= $key['den_detalle']?></td>
                            <td><?= $key['den_50']?></td>
                            <td><?= $key['den_100']?></td>
                            <td><?= $key['den_200']?></td>
                            <td><?= $key['den_500']?></td>
                            <td><?= $key['den_1000']?></td>
                            <td><?= $key['den_2000']?></td>
                            <td><?= $key['den_5000']?></td>
                            <td><?= $key['den_10000']?></td>
                            <td><?= $key['den_20000']?></td>
                            <td><?= $key['den_50000']?></td>
                            <td><?= $key['den_total']?></td>
                            <?php   $arr = $arr = $this->session->userdata('logged_in');
                            if($arr['role'] == 1)
                            {?>
                            <td>
                                <a href="<?php echo base_url()?>conteo/editar/<?php echo $key['den_id']?>" type="button" class="btn btn-xs btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a data-ref="<?php echo base_url()?>conteo/del/<?php echo $key['den_id']?>"  type="button" class="btn btn-xs btn-danger delete" data-toggle="confirmation" data-placement="left">
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