<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pacientes</h1>
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
                    <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nuevo Paciente">Agregar Nuevo  <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>DNI</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['dni'] ?></td>
                                        <td><?php echo $row['telefono'] ?></td>
                                        <td><?php echo $row['correo'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_dni').value = <?= $row['dni'] ?>;document.getElementById('update_nombre').value = '<?= $row['nombre'] ?>';document.getElementById('update_telefono').value = '<?= $row['telefono'] ?>';document.getElementById('update_correo').value = '<?= $row['correo'] ?>';document.getElementById('update_direccion').value = '<?= $row['direccion'] ?>';" title="Editar Paciente" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_dni').value = <?= $row['dni'] ?>;document.getElementById('delete_nombre').value = '<?= $row['nombre'] ?>';" title="Eliminar Paciente" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Paciente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=pacientes" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_nombre">Nombre</label>
                        <input type="text" name="add_nombre" id="add_nombre" placeholder="Nombre de Cliente" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_dni">DNI</label>
                        <input type="number" name="add_dni" id="add_dni" placeholder="DNI del Paciente" class="form-control" required="required" minlength="8" maxlength="8">
                    </div>

                    <div class="form-group">
                        <label for="add_telefono">Telefóno</label>
                        <input type="text" name="add_telefono" id="add_telefono" placeholder="Telefóno del Paciente" class="form-control" required="required" minlength="6" maxlength="9">
                    </div>

                    <div class="form-group">
                        <label for="add_correo">Correo</label>
                        <input type="email" name="add_correo" id="add_correo" placeholder="Correo de Cliente" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_direccion">Dirección</label>
                        <input type="text" name="add_direccion" id="add_direccion" placeholder="Dirección del Cliente" class="form-control" required="required">
                    </div>

                    <input type="submit" name="add_paciente" Value="Registrar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Editar Paciente</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=pacientes" method="POST">
                    <input type="hidden" name="update_dni" id="update_dni" value="">
                    <div class="form-group">
                        <label for="update_nombre">Nombre</label>
                        <input type="text" name="update_nombre" id="update_nombre" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_telefono">Telefóno</label>
                        <input type="text" name="update_telefono" id="update_telefono" class="form-control" required="required" maxlength="9" minlength="9">
                    </div>

                    <div class="form-group">
                        <label for="update_correo">Correo</label>
                        <input type="email" name="update_correo" id="update_correo" class="form-control" value="" required="required">
                    </div>
                    <div class="form-group">
                        <label for="update_direccion">Dirección</label>
                        <input type="text" name="update_direccion" id="update_direccion" class="form-control" required="required">
                    </div>

                    <input type="submit" name="update_paciente" id="update_paciente" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Paciente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=pacientes" method="POST">
                    <input type="hidden" name="delete_dni" id="delete_dni" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este paciente?</label>
                        <input type="text" name="delete_nombre" id="delete_nombre" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_paciente" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>