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
                    <form action="<?= base_url()?>index.php/notificacion/guardar_programarproxpago/" method="POST" enctype="multipart/form-data">
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
                                <label>Fecha de próximo pago</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
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