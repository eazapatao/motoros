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
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/linea/guardar_programarentregasim/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cliente</label><br>
                                <select class="selectpicker" name="cliente" id="cliente" data-live-search="true">
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
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo date("d-m-Y"); ?>" readonly="true" >
                            </div>
                            <div class="form-group">
                                <label>Responsable</label><br>
                                <select class="selectpicker" name="usuario" id="usuario" data-live-search="true">
                                    <option>Seleccione responsable</option>
                                    <?php foreach($usuarios as $usuario){?>
                                        <option value="<?= $usuario['usu_id']?>"><?= $usuario['usu_nombre'].' '.$usuario['usu_apellido']?></option>
                                    <?php }?>
                                </select>
                            </div>



                            <input type="hidden" name="fechafin" id="fechafin" value="<?php echo date("d-m-Y"); ?>" readonly="true">

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