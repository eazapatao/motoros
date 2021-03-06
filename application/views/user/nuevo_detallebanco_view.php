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
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Transacción Bancaria</h3>

                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/detallebanco/guardar_detallebanco/" method="POST" enctype="multipart/form-data" id="form_detallebanco">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Banco</label><br>
                                <select class="selectpicker" name="banco" id="banco_det" data-live-search="true">
                                    <option>Seleccione banco</option>
                                    <?php foreach($bancos as $banco){?>
                                        <option value="<?= $banco['ban_id']?>"><?= $banco['ban_nombre']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cliente</label><br>
                                <select class="selectpicker" name="cliente" id="cliente_detban" data-live-search="true">
                                    <option>Seleccione Cliente</option>
                                    <?php foreach($clientes as $cliente){?>
                                        <option value="<?= $cliente['cli_id']?>"><?= $cliente['cli_nombre'].' '.$cliente['cli_apellido']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha de facturación</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("d-m-Y"); ?>" readonly="true" >

                            </div>
                            <div class="form-group">
                                <label>Transacción</label>
                                <select class="form-control" id="transaccion" name="transaccion">
                                    <option value="Ingreso">Ingreso</option>
                                    <option value="Egreso">Egreso</option>
                                </select>


                            </div>
                            <div class="form-group">
                                <label>Corte</label>
                                <input type="text" class="form-control" id="corte" name="corte" placeholder="Corte">
                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
                            </div>


                            <div class="form-group">
                                <label>Detalle</label>
                                <textarea type="text" class="form-control" id="detalle" name="detalle"></textarea>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="guardar_detallebanco" type="submit" class="btn btn-primary">Guardar</button>

                        </div>

                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->