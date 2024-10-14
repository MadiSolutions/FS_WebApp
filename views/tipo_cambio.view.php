<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tipo de Cambio - SUNAT</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                    
                        <table id="example2" class="table table-bordered table-hover" style="text-align:center;">
                            <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th>Fecha</th>
                                    <th>Compra</th>
                                    <th>Venta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><button type="button" class="btn btn-sm btn-info"><?php echo $row['fecha'] ?></button></td>
                                        <td><button type="button" class="btn btn-sm btn-success"><?php echo $row['compra'] ?></button></td>
                                        <td><button type="button" class="btn btn-sm btn-success"><?php echo $row['venta'] ?></button></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>