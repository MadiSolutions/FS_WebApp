<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Clientes</h1>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
                        Agregar Nuevo Cliente
                    </button>
                        <table id="example2" class="table table-bordered table-hover">
                        <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th>RUC</th>
                                    <th>Razon Social</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo Electronico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['ruc'] ?></td>
                                        <td><?php echo $row['razon_social'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td><?php echo $row['telefono'] ?></td>
                                        <td><?php echo $row['correo_electronico'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_cod_cliente').value = '<?= $row['cod_cliente'] ?>';document.getElementById('update_ruc').value = '<?= $row['ruc'] ?>';document.getElementById('update_razon_social').value = '<?= $row['razon_social'] ?>';document.getElementById('update_direccion').value = '<?= $row['direccion'] ?>';document.getElementById('update_telefono').value = '<?= $row['telefono'] ?>';document.getElementById('update_correo_electronico').value = '<?= $row['correo_electronico'] ?>';" title="Editar Usuario" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_cod_cliente').value =' <?= $row['cod_cliente'] ?>';document.getElementById('delete_razon_social').value = '<?= $row['razon_social'] ?>';" title="Eliminar Usuario" class="text-danger"> <i class="fas fa-trash"></i> </a>
                                                </div>
                                            </div>

                                        </td>
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

<!-- Modal para Ingresar -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Agregar Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=clientes" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_ruc">RUC</label>
                        <input type="text" name="add_ruc" id="add_ruc" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="add_razon_social">Razon Social</label>
                        <input type="text" name="add_razon_social" id="add_razon_social" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="add_direccion">Direccion</label>
                        <input type="text" name="add_direccion" id="add_direccion" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="add_telefono">Telefono</label>
                        <input type="text" name="add_telefono" id="add_telefono" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="add_correo_electronico">Correo Electronico</label>
                        <input type="text" name="add_correo_electronico" id="add_correo_electronico" class="form-control" required="required">
                    </div>
                    <input type="submit" name="add_cliente" Value="Registrar" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Modificar -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Editar Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=clientes" method="POST">
                    <input type="hidden" name="update_cod_cliente" id="update_cod_cliente" value="">
                    <div class="form-group">
                        <label for="update_ruc">RUC</label>
                        <input type="text" name="update_ruc" id="update_ruc" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="update_razon_social">Razon Social</label>
                        <input type="text" name="update_razon_social" id="update_razon_social" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="update_direccion">Direccion</label>
                        <input type="text" name="update_direccion" id="update_direccion" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="update_telefono">Telefono</label>
                        <input type="text" name="update_telefono" id="update_telefono" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="update_correo_electronico">Correo Electronico</label>
                        <input type="text" name="update_correo_electronico" id="update_correo_electronico" class="form-control" required="required">
                    </div>
                    <input type="submit" name="update_cliente" id="update_clientes" Value="Actualizar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Eliminar -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=clientes" method="POST">
                    <input type="hidden" name="delete_cod_cliente" id="delete_cod_cliente" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Cliente?</label>
                        <input type="text" name="delete_razon_social" id="delete_razon_social" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_cliente" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>