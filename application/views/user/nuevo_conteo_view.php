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
                        <h3 class="box-title">Nuevo conteo</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/conteo/guardar_conteo/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo date("d-m-Y"); ?>" readonly="true">
                            </div>
                            <div class="form-group">
                                <label>Detalle</label>
                                <input type="text" class="form-control" id="detalle" name="detalle" placeholder="Detalle">
                            </div>
                            <div class="form-group">
                                <label>$50</label>
                                <input type="text" class="form-control" id="50" name="50" placeholder="50" >
                            </div>
                            <div class="form-group">
                                <label>$100</label>
                                <input type="text" class="form-control" id="100" name="100" placeholder="100" >
                            </div>
                            <div class="form-group">
                                <label>$200</label>
                                <input type="text" class="form-control" id="200" name="200" placeholder="200" >
                            </div>
                            <div class="form-group">
                                <label>$500</label>
                                <input type="text" class="form-control" id="500" name="500" placeholder="500" >
                            </div>
                            <div class="form-group">
                                <label>$1.000</label>
                                <input type="text" class="form-control" id="1000" name="1000" placeholder="1000">
                            </div>
                            <div class="form-group">
                                <label>$2.000</label>
                                <input type="text" class="form-control" id="2000" name="2000" placeholder="2000">
                            </div>

                            <div class="form-group">
                                <label>$5.000</label>
                                <input type="text" class="form-control" id="5000" name="5000" placeholder="5000">
                            </div>
                            <div class="form-group">
                                <label>$10.000</label>
                                <input type="text" class="form-control" id="10000" name="10000" placeholder="10000">
                            </div>
                            <div class="form-group">
                                <label>$20.000</label>
                                <input type="text" class="form-control" id="20000" name="20000" placeholder="20000" >
                            </div>
                            <div class="form-group">
                                <label>$50.000</label>
                                <input type="text" class="form-control" id="50000" name="50000" placeholder="50000">
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