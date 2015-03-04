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
                        <h3 class="box-title">Nuevo historial | Ticket de alquiler: <?= $id_ticket?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/linea/guardar_historial/" method="POST" enctype="multipart/form-data" id="guardar_historialinea">
                        <input type="hidden" name="alquiler" id="alquiler" value="<?= $id_ticket?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Linea</label><br>
                                <select class="selectpicker" name="linea" id="linea_hist" data-live-search="true">
                                    <option>Seleccione línea</option>
                                    <?php foreach($lineas as $linea){?>
                                        <option value="<?= $linea['lin_id']?>"><?= $linea['lin_numero']?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Valor del minuto vendido</label>
                                <input type="text" class="form-control" id="vlorminvend" name="vlorminvend" placeholder="Valor del minuto vendido">
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="guardar_historialinea" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->