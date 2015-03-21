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
                    <form id="form_historial">
                        <input type="hidden" name="alquiler" id="alquiler" value="<?= $id_ticket?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Línea</label><br>
                                <select class="selectpicker" name="linea" id="linea" data-live-search="true">
                                    <option>Seleccione línea</option>
                                    <?php foreach($lineas as $linea){?>
                                        <option value="<?= $linea['lin_id']?>"><?= 'Línea '.$linea['lin_numero'].' Pasaminutos '.$linea['lin_pasaminutos'].' Disponibles '.$linea['lin_minutosconsumidos']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Valor del minuto vendido</label>
                                <input type="text" class="form-control" id="vlorminvend" name="vlorminvend" placeholder="Valor del minuto vendido">
                            </div>

                        </div><!-- /.box-body -->


                    </form>
                    <div class="box-footer">
                        <button id="guardar_historial"  class="btn btn-primary">Guardar</button>
                        <a class="btn btn-primary" href="<?= base_url()?>linea/verhistorial">Finalizar</a>
                    </div>

                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->