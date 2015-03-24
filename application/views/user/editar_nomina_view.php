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
                        <h3 class="box-title">Editar registro de nómina</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach($nomina as $key)?>
                    <form action="<?= base_url()?>index.php/nomina/upd_nomina/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Usuario</label><br>
                                <select class="selectpicker" name="usuario" id="usuario" data-live-search="true">
                                    <option value="<?= $key['nomquin_usu_id'] ?>"><?= $key['usu_nombre'].' '.$key['usu_apellido'] ?></option>
                                    <?php foreach($usuarios as $usuario){?>
                                        <option value="<?= $usuario['usu_id'] ?>"><?= $usuario['usu_nombre'].' '.$usuario['usu_apellido'] ?></option>

                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nómina</label>
                                <input type="text" class="form-control" id="nomina" name="nomina" placeholder="Nómina" value="<?= $key['nomquin_nomina'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Días laborados</label>
                                <input type="text" class="form-control" id="diaslaborados" name="diaslaborados" placeholder="Días laboados" value="<?= $key['nomquin_diaslaborados'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Descuentos</label>
                                <input type="text" class="form-control" id="descuentos" name="descuentos" placeholder="Descuentos" value="<?= $key['nomquin_descuentos'] ?>">

                            </div>
                            <div class="form-group">
                                <label>Descuadres</label>
                                <input type="text" class="form-control" id="descuadres" name="descuadres" placeholder="Descuadres" value="<?= $key['nomquin_descuadres'] ?>">
                            </div>
                           <div class="form-group">
                                <label>Liquidación</label>
                                <input type="text" class="form-control" id="liquidacion" name="liquidacion" value="<?= $key['nomquin_liquidacion'] ?>">
                            </div>
                            <div class="form-group">
                            <label>Novedades</label>
                            <textarea type="text" class="form-control" id="novedades" name="novedades" ><?php echo $key['nomquin_novedades']?></textarea>
                             </div>
                            <div class="form-group">
                                <label>Desde</label>
                                <input type="date" class="form-control" id="fechainicio" name="fechainicio" value="<?= $key['nomquin_fechainicio'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Hasta</label>
                                <input type="date" class="form-control" id="fechafin" name="fechafin" value="<?= $key['nomquin_fechafin'] ?>">
                            </div>

                        </div><!-- /.box-body -->
                        <input type="hidden" value="<?= $key["nomquin_id"] ?>" name="nomquin_id">


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->