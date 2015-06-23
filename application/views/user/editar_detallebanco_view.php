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
                        <h3 class="box-title">Editar Registro bancario</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach($detallebanco as $key)?>
                    <form action="<?= base_url()?>index.php/detallebanco/upd_detallebanco/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Banco</label><br>
                                <select class="selectpicker" name="banco" id="banco" data-live-search="true">
                                    <option value="<?= $key['detban_ban_id'] ?>"><?= $key['ban_nombre'] ?></option>
                                    <?php foreach($bancos as $ban){?>
                                        <option value="<?= $ban['ban_id'] ?>"><?= $ban['ban_nombre'] ?></option>

                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cliente</label>
                                <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Cliente" value="<?= $key['detban_cli_id'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?= $key['detban_fecha'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Transacción</label>
                                <select class="form-control" id="transaccion" name="transaccion" value="<?= $key['detban_transaccion'] ?>">
                                    <option value="<?= $key['detban_transaccion'] ?>"><?= $key['detban_transaccion'] ?></option>
                                    <option value="Ingreso">Ingreso</option>
                                    <option value="Egreso">Egreso</option>
                                </select>
                               </div>
                            <div class="form-group">
                                <label>Corte</label>
                                <input type="text" class="form-control" id="corte" name="corte" placeholder="Valor" value="<?= $key['detban_corte'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor" value="<?= $key['detban_valor'] ?>">
                            </div>
                           <div class="form-group">
                                <label>Detalle</label>
                                <textarea type="text" class="form-control" id="detalle" name="detalle" ><?php echo $key['detban_detalle']?></textarea>
                            </div>
                        </div><!-- /.box-body -->
                        <input type="hidden" value="<?= $key["detban_id"] ?>" name="detban_id">

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->