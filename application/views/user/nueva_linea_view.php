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
                        <h3 class="box-title">Nueva línea</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/linea/guardar_linea/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Plan</label><br>
                                <select class="selectpicker" name="plan" id="plan_detban" data-live-search="true">
                                    <option>Seleccione el plan</option>
                                    <?php foreach($planes as $plan){?>
                                        <option value="<?= $plan['pla_id']?>"><?= $plan['pla_nombre']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Número celular</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número celular">
                            </div>
                            <div class="form-group">
                                <label>Corte</label>

                                <select class="form-control" id="corte" name="corte" placeholder="Fecha de corte">
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="9">9</option>
                                    <option value="12">12</option>
                                    <option value="14">14</option>
                                    <option value="18">18</option>
                                    <option value="24">24</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Estado de la línea</label>
                                <select class="form-control" id="estado" name="estado" placeholder="Estado de la línea">
                                    <option value="Disponible">Disponible</option>
                                    <option value="Alquilada">Alquilada</option>
                                    <option value="Devuelta al operador">Devuelta al operador</option>
                                    <option value="Perdida">Perdida</option>
                                    <option value="Acabada">Acabada</option>
                                    <option value="Suspendida a petición">Suspendida a petición del cliente</option>
                                    <option value="Suspendida por pago">Suspendida a petición del cliente</option>
                                </select>
                                <div class="form-group">
                                    <label>Minutos consumidos</label>
                                    <input type="text" class="form-control" id="minutos" name="minutos" placeholder="Minutos consumidos">
                                </div>
                                <div class="form-group">
                                    <label>Pasaminutos</label>
                                    <input type="text" class="form-control" id="pasaminutos" name="pasaminutos" placeholder="Pasaminutos">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Operador</label>
                                <select class="form-control" id="operador" name="operador" placeholder="Operador" >
                                    <option value="Claro">Claro</option>
                                    <option value="Movistar">Movistar</option>
                                    <option value="Tigo">Tigo</option>
                                    <option value="Uff">Uff</option>
                                    <option value="Virgin mobile">Virgin mobile</option>
                                </select>

                            </div>


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