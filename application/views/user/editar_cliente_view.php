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
                        <h3 class="box-title">Nuevo cliente</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach($cliente as $key)?>
                    <form action="<?= base_url()?>index.php/directorio/upd_cliente/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" value="<?= $key['cli_cedula'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= $key['cli_nombre'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?= $key['cli_apellido'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="<?= $key['cli_direccion'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Barrio</label>
                                <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio" value="<?= $key['cli_barrio'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Telefono fijo</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono fijo" value="<?= $key['cli_telefono'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="<?= $key['cli_celular'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?= $key['cli_ciudad'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Tipo de cliente</label>
                                <select class="form-control" id="tipo" name="tipo" placeholder="Tipo de cliente">
                                    <option value="<?= $key['cli_tipo'] ?>"><?= $key['cli_tipo'] ?></option>
                                    <option value="Paga Diario">Paga Diario</option>
                                    <option value="Regular">Regular</option>
                                </select>
                               </div>
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea type="text" class="form-control" id="observaciones" name="observaciones" ><?php echo $key['cli_observaciones']?></textarea>
                            </div>
                        </div><!-- /.box-body -->
                        <input type="hidden" value="<?= $key["cli_id"] ?>" name="cli_id">

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->