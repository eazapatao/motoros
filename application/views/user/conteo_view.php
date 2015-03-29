<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-lg-12">
                <div class="box box-success">
                    <div class="box-header">

                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url()?>index.php/nomina/calcular/" method="POST" enctype="multipart/form-data" >
                        <div class="box-body">
                            <div class="form-group">
                                <label>$50</label>
                                <input type="text" class="form-control" id="50" name="50" placeholder="Cantidad">
                            </div>

                            <div class="form-group">
                                <label>$100</label>
                                <input type="text" class="form-control" id="100" name="100" placeholder="Cantidad">
                            </div>

                            <div class="form-group">
                                <label>$500</label>
                                <input type="text" class="form-control" id="500" name="500" placeholder="Cantidad">
                            </div>

                            <div class="form-group">
                                <label>$1.000</label>
                                <input type="text" class="form-control" id="1000" name="1000" placeholder="Cantidad">
                            </div>

                            <div class="form-group">
                                <label>$2.000</label>
                                <input type="text" class="form-control" id="2000" name="2000" placeholder="Cantidad">
                            </div>

                            <div class="form-group">
                                <label>$5.000</label>
                                <input type="text" class="form-control" id="5000" name="5000" placeholder="Cantidad">
                            </div>

                            <div class="form-group">
                                <label>$10.000</label>
                                <input type="text" class="form-control" id="10000" name="10000" placeholder="Cantidad">
                            </div>
                            <div class="form-group">
                                <label>$20.000</label>
                                <input type="text" class="form-control" id="20000" name="20000" placeholder="Cantidad">
                            </div>


                            <div class="form-group">
                                <label>$50.000</label>
                                <input type="text" class="form-control" id="50000" name="50000" placeholder="Cantidad">
                            </div>



                            </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button  type="submit" class="btn btn-primary" >Calcular</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->