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
                    <form action="<?= base_url()?>index.php/nomina/guardar_nomina/" method="POST" enctype="multipart/form-data" id="form_nomina">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Usuario</label><br>
                                <select class="selectpicker" name="usuario" id="usuario_nom" data-live-search="true">
                                    <option>Seleccione Usuario</option>
                                    <?php foreach($usuarios as $usuario){?>
                                        <option value="<?= $usuario['usu_id']?>"><?= $usuario['usu_nombre'].' '.$usuario['usu_apellido']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nómina</label>
                                <input type="text" class="form-control" id="nomina" name="nomina" placeholder="Nómina">
                            </div>
                            <div class="form-group">
                                <label>Días laborados</label>
                                <input type="text" class="form-control" id="diaslaborados" name="diaslaborados" placeholder="Días laboados">
                            </div>
                            <div class="form-group">
                                <label>Descuentos</label>
                                <input type="text" class="form-control" id="descuentos" name="descuentos" placeholder="Descuentos">

                            </div>
                            <div class="form-group">
                                <label>Descuadres</label>
                                <input type="text" class="form-control" id="descuadres" name="descuadres" placeholder="Descuadres">
                            </div>
                            <div class="form-group">
                                <label>Liquidación</label>
                                <input type="text" class="form-control" id="liquidacion" name="liquidacion" placeholder="Liquidación">
                            </div>
                            <div class="form-group">
                                <label>Novedades</label>
                                <textarea type="text" class="form-control" id="novedades" name="novedades" placeholder="Novedades"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Desde</label>
                                <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="Desde">
                            </div>
                            <div class="form-group">
                                <label>Hasta</label>
                                <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Hasta">
                            </div>
                        </div><!-- /.box-body -->


                        <div class="box-footer">
                            <button id="guardar_nomina" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->