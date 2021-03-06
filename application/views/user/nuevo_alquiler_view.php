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
                        <h3 class="box-title">Nuevo alquiler</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form id="form_alquiler">
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
                                <label>Observaciones</label>
                                <textarea type="text" class="form-control" id="observaciones" name="observaciones" ></textarea>

                            </div>
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" id="tipo" name="tipo" placeholder="Tipo">
                                    <option value="Contado">Contado</option>
                                    <option value="Crédito">Crédito</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo date("d-m-Y"); ?>" readonly="true" >
                            </div>
                            <div class="form-group">
                                <label>Fecha Finalización</label>
                                <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Fecha de finalización">
                            </div>


                        </div><!-- /.box-body -->
                    </form>
                        <div class="box-footer">
                            <button id="guardar_alquiler" type="submit" class="btn btn-primary">Guardar</button>
                            <a id="asociar_alquiler" style="display: none;" class="btn btn-primary" href="">Asociar lineas</a>
                        </div>

                </div>
            </div>

        </div>

    </section><!-- /.content -->

</aside><!-- /.right-side -->