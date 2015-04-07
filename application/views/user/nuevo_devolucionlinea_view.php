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
                        <h3 class="box-title">Devolución de líneas</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/linea/devolucion_linea/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                                <div class="form-group">
                                    <label>Cédula</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                                </div>
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                                </div>
                                <div class="form-group">
                                    <label>Barrio</label>
                                    <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio">
                                </div>
                                <div class="form-group">
                                    <label>Telefono fijo</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono fijo">
                                </div>
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
                                </div>
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad">
                            </div>
                            <div class="form-group">
                                <label>Tipo de cliente</label>

                                <select class="form-control" id="tipo" name="tipo" placeholder="Tipo de cliente">
                                    <option value="Paga Diario">Paga Diario</option>
                                    <option value="Regular">Regular</option>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <textarea type="text" class="form-control" id="observaciones" name="observaciones"></textarea>
                                </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->