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
                        <h3 class="box-title">Editar historial</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach($historial as $key)?>
                    <form action="<?= base_url()?>index.php/linea/upd_historial/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Línea</label>

                                <select class="form-control" id="linea" name="linea" placeholder="Linea" value="<?= $key['his_lin_id'] ?>">
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ticket de alquiler</label>

                                <select class="form-control" id="alquiler" name="alquiler" placeholder="Alquiler" value="<?= $key['his_alq_id'] ?>">
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Valor del minuto vendido</label>
                                <input type="text" class="form-control" id="vlorminvend" name="vlorminvend" placeholder="Valor del minuto vendido"value="<?= $key['his_valor_minvend'] ?>">
                            </div>


                        </div><!-- /.box-body -->
                        <input type="hidden" value="<?= $key["his_id"] ?>" name="his_id">

                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->