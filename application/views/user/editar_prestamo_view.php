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
                        <h3 class="box-title">Editar registro de Préstamo</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach($prestamos as $prestamo)?>
                    <form action="<?= base_url()?>index.php/nomina/upd_prestamo/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Usuario</label><br>
                                <select class="selectpicker" name="usuario" id="usuario" data-live-search="true">
                                    <option value="<?= $prestamo['emppre_usu_id'] ?>"><?= $prestamo['usu_nombre'].' '.$prestamo['usu_apellido'] ?></option>
                                    <?php foreach($usuarios as $usuario){?>
                                        <option value="<?= $usuario['usu_id'] ?>"><?= $usuario['usu_nombre'].' '.$usuario['usu_apellido'] ?></option>

                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?= $prestamo['emppre_fecha'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor" value="<?= $prestamo['emppre_valor'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Coutas</label>
                                <input type="text" class="form-control" id="coutas" name="coutas" placeholder="Descuentos" value="<?= $prestamo['emppre_cuotas'] ?>">

                            </div>


                        </div><!-- /.box-body -->
                        <input type="hidden" value="<?= $prestamo["emppre_id"] ?>" name="emppre_id">


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->