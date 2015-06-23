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
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Bancolombia</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tbody><tr>
                    <th style="">Total ingreso</th>
                    <th>Total egreso</th>
                    <th style="">Saldo</th>
                </tr>
                <tr>
                    <td>$<?= number_format ($totalesB['debeb'], 0, ',', '.')?></td>
                    <td>$<?= number_format ($totalesB['haberb'], 0, ',', '.')?></td>
                    <td>$<?= number_format ($totalesB['deferenciab'], 0, ',', '.')?></td>
                </tr>

                </tbody></table>
        </div><!-- /.box-body -->
    </div>
</div>
            <div class="col-lg-6">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Davivienda</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="">Total ingreso</th>
                                <th>Total egreso</th>
                                <th style="">Saldo</th>
                            </tr>
                            <tr>
                                <td>$<?= number_format ($totalesD['debed'], 0, ',', '.')?></td>
                                <td>$<?= number_format ($totalesD['haberd'], 0, ',', '.')?></td>
                                <td>$<?= number_format ($totalesD['deferenciad'], 0, ',', '.')?></td>
                            </tr>

                            </tbody></table>
                    </div><!-- /.box-body -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header"><br>
                        <a class="btn btn-app"  href="<?= base_url()?>detallebanco/nuevo_detallebanco">
                            <i class="fa fa-edit"></i> Nueva transaccion bancaria
                        </a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <table id="banco_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Banco</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Transacción</th>
                                    <th>Corte</th>
                                    <th>Valor</th>
                                    <th>Detalle</th>
                                    <?php   $arr = $arr = $this->session->userdata('logged_in');
                                    if($arr['role'] == 1)
                                    {?>
                                    <th>Opciones</th>
                                    <?php }?>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Banco</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Transacción</th>
                                    <th>Corte</th>
                                    <th>Valor</th>
                                    <th>Detalle</th>
                                    <?php   $arr = $arr = $this->session->userdata('logged_in');
                                    if($arr['role'] == 1)
                                    {?>
                                    <th>Opciones</th>
                                    <?php }?>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php foreach ($detallebanco as $key) {?>
                                    <tr>
                                        <td><?= $key['ban_nombre']?></td>
                                        <td><?= $key['cli_nombre'].' '.$key['cli_apellido']?></td>
                                        <td><?= $key['detban_fecha']?></td>
                                        <td><?= $key['detban_transaccion']?></td>
                                        <td><?= $key['detban_corte']?></td>
                                        <td><?= $key['detban_valor']?></td>
                                        <td><?= $key['detban_detalle']?></td>
                                        <?php   $arr = $arr = $this->session->userdata('logged_in');
                                        if($arr['role'] == 1)
                                        {?>
                                        <td>
                                            <a href="<?php echo base_url()?>detallebanco/editar/<?php echo $key['detban_id']?>" type="button" class="btn btn-xs btn-warning">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-ref="<?php echo base_url()?>detallebanco/del/<?php echo $key['detban_id']?>" type="button" class="btn btn-xs btn-danger delete" data-toggle="confirmation" data-placement="left">
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