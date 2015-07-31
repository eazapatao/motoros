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
                        <h3 class="box-title">Agregar o quitar Datos</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/alquiler/upd_adddatos/" method="POST" enctype="multipart/form-data" id="form_nomina">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cliente</label><br>
                                <select class="selectpicker" name="cliente" id="cliente_alq" data-live-search="true">
                                    <option>Seleccione Cliente</option>
                                    <?php foreach($clientes as $cliente){?>
                                        <option value="<?= $cliente['cli_id']?>"><?= $cliente['cli_nombre'].' '.$cliente['cli_apellido']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Línea</label><br>
                                <select class="selectpicker" name="linea" id="linea" data-live-search="true">
                                    <option>Seleccione línea</option>
                                    <?php foreach($lineas as $linea){?>
                                        <option value="<?= $linea['lin_id']?>"><?= 'Línea '.$linea['lin_numero'].' Pasaminutos '.$linea['lin_pasaminutos'].' Disponibles '.$linea['lin_minutosconsumidos']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Datos</label><br>
                                <select class="selectpicker" name="datos" id="datos" data-live-search="true">
                                    <option value="3"><?php echo "Sin datos"; ?></option>
                                    <?php foreach($datos as $dato){?>

                                        <option value="<?= $dato['dat_id']?>"><?= $dato['dat_nombre']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Opción</label>

                                <select class="form-control" id="opcion" name="opcion" placeholder="Opcion">
                                    <option value="Agregar datos">Agregar datos</option>
                                    <option value="Quitar datos">Quitar datos</option>
                                </select>
                            </div>
                        <div class="box-footer">
                            <button id="guardar_nomina" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->