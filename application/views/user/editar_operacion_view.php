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
                        <h3 class="box-title">Editar alquiler</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach($operacion as $key)?>
                    <form action="<?= base_url()?>index.php/operacion/upd_operacion/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cliente</label>
                                <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Cliente" value="<?= $key['ope_cli_id'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?= $key['ope_usu_id'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" id="tipo" name="tipo" placeholder="Tipo" value="<?= $key['ope_tipo'] ?>">
                                    <option value="Ricardo">Ricardo</option>
                                    <option value="Wilson">Wilson</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor" value="<?= $key['ope_valor'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?= $key['ope_fecha'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Número de factura</label>
                                <input type="text" class="form-control" id="nfactura" name="nfactura" placeholder="Número de factura" value="<?= $key['ope_nfactura'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea type="text" class="form-control" id="observaciones" name="observaciones" ><?php echo $key['ope_observaciones']?></textarea>

                            </div>

                        </div><!-- /.box-body -->
                        <input type="hidden" value="<?= $key["ope_id"] ?>" name="ope_id">

                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->