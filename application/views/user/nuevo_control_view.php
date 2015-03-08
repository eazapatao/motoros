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
                        <h3 class="box-title">Control de adicionales</h3>

                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/control/guardar_control/" method="POST" enctype="multipart/form-data" id="form_control">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Línea</label><br>
                                <select class="selectpicker" name="linea" id="linea_cont" data-live-search="true">
                                    <option>Seleccione línea</option>
                                    <?php
                                    foreach($lineas as $linea){?>
                                        <option value="<?= $linea['lin_id']?>"><?= $linea['lin_numero']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                            </div>
                            <div class="form-group">
                                <label>Facturación</label>
                                <input type="text" class="form-control" id="facturacion" name="facturacion" placeholder="Fecha">
                            </div>
                            <div class="form-group">
                                <label>Descuentos</label>
                                <input type="text" class="form-control" id="descuentos" name="descuentos" placeholder="descuentos">
                            </div>
                           </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="guardar_control" type="submit" class="btn btn-primary">Guardar</button>

                        </div>

                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->