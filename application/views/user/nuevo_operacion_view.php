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
                                    <option value="Ricardo">Ricardo</option>
                                    <option value="Wilson">Wilson</option>
                                    <option value="Clientes">Clientes</option>
                                    <option value="Pago Préstamos">Pago préstamos</option>
                                    <option value="Tarjetas">Tarjetas</option>
                                    <option value="Caja Fuerte">Caja Fuerte</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
                            </div>

                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
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