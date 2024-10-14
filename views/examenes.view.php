<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Examenes</h1>
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
                    <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nuevo Examen"> Agregar Nuevo <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Examen</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['codigo'] ?></td>
                                        <td><?php echo $row['descripcion'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_codigo').value = <?= $row['codigo'] ?>;document.getElementById('update_descripcion').value = '<?= $row['descripcion'] ?>';" title="Editar Examen" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_codigo').value = <?= $row['codigo'] ?>;document.getElementById('delete_descripcion').value = '<?= $row['descripcion'] ?>';" title="Eliminar Examen" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Examen</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=examenes" id="ingresar" method="POST">
                <input type="hidden" name="add_codigo" id="add_codigo" value="0">
                    <div class="form-group">
                        <label for="add_descripcion">Descripcion</label>
                        <input type="text" name="add_descripcion" id="add_descripcion" placeholder="Descripcion de Examen" class="form-control" required="required">
                    </div>
                    <input type="submit" name="add_examen" Value="Registrar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Editar Examen</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=examenes" method="POST">
                    <input type="hidden" name="update_codigo" id="update_codigo" value="">
                    <div class="form-group">
                        <label for="update_descripcion">Descripcion</label>
                        <input type="text" name="update_descripcion" id="update_descripcion" class="form-control" required="required">
                    </div>
                    <input type="submit" name="update_examen" id="update_examen" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Examen</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=examenes" method="POST">
                    <input type="hidden" name="delete_codigo" id="delete_codigo" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este examen?</label>
                        <input type="text" name="delete_descripcion" id="delete_descripcion" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_examen" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>