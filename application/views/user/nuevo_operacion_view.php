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
                        <h3 class="box-title">Nueva operación</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/operacion/guardar_operacion/" method="POST" enctype="multipart/form-data" id="form_guardar_operacion">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cliente</label><br>
                                <select class="selectpicker" name="cliente" id="cliente_ope" data-live-search="true">
                                    <option>Seleccione Cliente</option>
                                    <?php foreach($clientes as $cliente){?>
                                        <option value="<?= $cliente['cli_id']?>"><?= $cliente['cli_nombre'].' '.$cliente['cli_apellido']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Usuario</label><br>
                                <select class="selectpicker" name="usuario" id="usuario_ope" data-live-search="true">
                                    <option>Seleccione Usuario</option>
                                    <?php foreach($usuarios as $usuario){?>
                                        <option value="<?= $usuario['usu_id']?>"><?= $usuario['usu_nombre'].' '.$usuario['usu_apellido']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" id="tipo" name="tipo" placeholder="Tipo">
                                    <option value="Ingresos" disabled="true" >Ingresos</option>
                                    <option value="Ingreso Cliente">Ingreso Cliente</option>
                                    <option value="Ingreso Prestamo">Ingreso Préstamo</option>
                                    <option value="Ingreso Tarjeta de credito">Ingreso Tarjeta de credito</option>
                                    <option value="Ingreso Caja fuerte">Ingreso Caja fuerte</option>
                                    <option value="Ingreso Cargo">Ingreso Cargo</option>
                                    <option value="Ingreso otros">Ingreso otros</option>
                                    <option value="Egresos" disabled="true" >Egresos</option>
                                    <option value="Egreso Cliente">Egreso Cliente</option>
                                    <option value="Egreso Préstamo">Egreso Préstamo</option>
                                    <option value="Egreso Tarjeta de credito">Egreso Tarjeta de credito</option>
                                    <option value="Egreso Caja fuerte">Egreso Caja fuerte</option>
                                    <option value="Egreso Nómina">Egreso Nómina</option>
                                    <option value="Egreso Servicios">Egreso Servicios</option>
                                    <option value="Egreso Alejandro">Egreso Alejandro</option>
                                    <option value="Egreso Bienes raices">Egreso Bienes raices</option>
                                    <option value="Egreso Papelería">Egreso Papelería</option>
                                    <option value="Egreso Gasolina">Egreso Gasolina</option>
                                    <option value="Egreso Publicidad">Egreso Publicidad</option>
                                    <option value="Egreso otros">Egreso otros</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
                            </div>

                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo date("d-m-Y"); ?>" readonly="true" >
                            </div>
                            <div class="form-group">
                                <label>Número de factura</label>
                                <input type="text" class="form-control" id="nfactura" name="nfactura" placeholder="Número de factura">
                            </div>
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea type="text" class="form-control" id="observaciones" name="observaciones" ></textarea>

                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="guardar_operacion" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->