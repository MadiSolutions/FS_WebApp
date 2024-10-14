<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">TIPO DE JORNADAS PERSONAL</h1>
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
                        <table id="example2" class="table table-bordered table-hover">
                        <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                <th>CODIGO JORNADA</th>
                                <th>TIPO DE JORNADA</th>
                                <th>DESCRIPCION DE JORNADA</th>
                                <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['cod_servicio'] ?></td>
                                        <td><?php echo $row['tipo_servicio'] ?></td>
                                        <td><?php echo $row['descripcion_servicio'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_cod_servicio').value ='<?= $row['cod_servicio']?>';document.getElementById('update_tipo_servicio').value ='<?= $row['tipo_servicio']?>';document.getElementById('update_descripcion_servicio').value ='<?= $row['descripcion_servicio'] ?>';" title="Editar Personal" style="margin-right:5px;"> <i class="fas fa-edit"></i> </a>
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_cod_servicio').value ='<?= $row['cod_servicio'] ?>';document.getElementById('delete_tipo_servicio').value ='<?= $row['tipo_servicio'].' - '.$row['descripcion_servicio'] ?>';" title="Eliminar Servicio" class="text-danger"> <i class="fas fa-trash"></i> </a>
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



<!-- Modal para Modificar -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">EDITAR JORNADA</h4>
            </div>
            <div class="modal-body">
            <form action="panel.php?modulo=jornadas" id="ingresar" method="POST">
                    <input type="hidden" name="update_cod_servicio" id="update_cod_servicio" value="">
                    <h4 style="font-family:candara; color:#1338BE">DATOS DEL SERVICIO</h4>
                    <div class="form-group">
                        <label for="update_tipo_servicio">TIPO DE SERVICIO</label>
                        <input type="text" name="update_tipo_servicio" id="update_tipo_servicio" placeholder="Tipo de Servicio" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_descripcion_servicio">DESCRIPCION DEL SERVICIO</label>
                        <input type="text" name="update_descripcion_servicio" id="update_descripcion_servicio" placeholder="Descripcion del Servicio" class="form-control" required="required">
                    </div>
                    <input type="submit" name="update_jornada" id="update_servicio" Value="Actualizar" class="btn btn-primary">
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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Servicio</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=jornadas" method="POST">
                    <input type="hidden" name="delete_cod_servicio" id="delete_cod_servicio" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Servicio?</label>
                        <input type="text" name="delete_tipo_servicio" id="delete_tipo_servicio" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_jornada" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>