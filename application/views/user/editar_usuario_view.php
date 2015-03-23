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
                        <h3 class="box-title">Edición de usuarios</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach($usuario as $key)?>
                    <form action="<?= base_url()?>index.php/usuario/upd_usuario/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"value="<?= $key['usu_nombre'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?= $key['usu_apellido'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" value="<?= $key['usu_cedula'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="<?= $key['usu_direccion'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?= $key['usu_telefono'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Cargo</label><br>
                                <select class="selectpicker" name="cargo" id="cargo" data-live-search="true">
                                    <option value="<?= $key['usu_car_id'] ?>"><?= $key['car_nombre'] ?></option>
                                    <?php foreach($cargos as $cargo){?>
                                        <option value="<?= $cargo['car_id'] ?>"><?= $cargo['car_nombre'] ?></option>

                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nick</label>
                                <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick" value="<?= $key['usu_nick'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" value="<?= $key['usu_contrasena'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Fecha de ingreso</label>
                                <input type="text" class="form-control" id="fechai" name="fechai" placeholder="Fecha de ingreso" value="<?= $key['usu_fechaingreso'] ?>">

                            </div>
                            <div class="form-group">
                                <label>Fecha de egreso</label>
                                <input type="text" class="form-control" id="fechae" name="fechae" placeholder="Fecha de egreso" value="<?= $key['usu_fechaegreso'] ?>">
                            </div>
                        </div><!-- /.box-body -->
                        <input type="hidden" value="<?= $key["usu_id"] ?>" name="usu_id">

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->