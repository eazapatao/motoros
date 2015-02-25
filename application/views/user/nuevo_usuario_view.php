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
                        <h3 class="box-title">Nuevo Usuario</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/usuario/guardar_usuario/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                                </div>
                                <div class="form-group">
                                    <label>Cédula</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula">
                                </div>
                                <div class="form-group">
                                    <label>Fotografía</label>
                                    <input type="files" mutliple="true" name="imagenes[]" class="form-control" id="fotografia" name="fotografia" placeholder="fotografia"/>
                                   <!-- <input type="text" class="form-control" id="fotografia" name="fotografia" placeholder="fotografia" > -->
                                </div>
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                                </div>
                                <div class="form-group">
                                    <label>Nick</label>
                                    <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick">
                                </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <label>Fecha de ingreso</label>
                                <input type="text" class="form-control" id="fechai" name="fechai" placeholder="Fecha de ingreso">
                            </div>
                            <div class="form-group">
                                <label>Fecha de egreso</label>
                                <input type="text" class="form-control" id="fechae" name="fechae" placeholder="Fecha de egreso">
                            </div>
                            <div class="form-group">
                                <label>Tipo de empleado</label>
                            <select class="form-control" id="tipo" name="tipo" placeholder="Tipo de empleado">
                                <option value="Tiempo completo">Tiempo completo</option>
                                <option value="Medio tiempo">Medio tiempo</option>

                            </select>
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