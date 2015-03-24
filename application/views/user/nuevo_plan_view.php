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
                        <h3 class="box-title">Nuevo plan</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/plan/guardar_plan/" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                            </div>
                            <div class="form-group">
                                <label>Total de minutos</label>
                                <input type="text" class="form-control" id="minutos" name="minutos" placeholder="minutos">
                            </div>
                            <div class="form-group">
                                <label>Valor del minuto</label>
                                <input type="text" class="form-control" id="vlrmin" name="vlrmin" placeholder="Valor del minuto">
                            </div>
                            <div class="form-group">
                                <label>Cargo básico</label>
                                <input type="text" class="form-control" id="cargobasico" name="cargobasico" placeholder="Cargo basico">
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