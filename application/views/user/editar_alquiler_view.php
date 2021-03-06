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
                    <?php foreach($alquiler as $key)?>
                    <form action="<?= base_url()?>index.php/alquiler/upd_alquiler/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cliente</label><br>
                                <select class="selectpicker" name="cliente" id="cliente" data-live-search="true">
                                    <option value="<?= $key['alq_cli_id'] ?>"><?= $key['cli_nombre'].' '.$key['cli_apellido'] ?></option>
                                    <?php foreach($clientes as $cliente){?>
                                        <option value="<?= $cliente['cli_id'] ?>"><?= $cliente['cli_nombre'].' '.$cliente['cli_apellido'] ?></option>

                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea type="text" class="form-control" id="observaciones" name="observaciones" ><?php echo $key['alq_observaciones']?></textarea>

                            </div>
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" id="tipo" name="tipo" placeholder="Tipo" value="<?= $key['alq_tipo'] ?>">
                                    <option value="Contado">Contado</option>
                                    <option value="Crédito">Crédito</option>
                                   </select>

                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?= $key['alq_fecha'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Fecha Finalización</label>
                                <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Fecha de finalización" value="<?= $key['alq_fechafin'] ?>">
                            </div>



                        </div><!-- /.box-body -->
                        <input type="hidden" value="<?= $key["alq_id"] ?>" name="alq_id">

                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->