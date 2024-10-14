<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Usuarios FS WebApp</h1>
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
                        Agregar Nueva Usuario - Personal
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal2">
                        Agregar Nuevo Usuario - Proveedor
                    </button>
 
                    <table id="example2" class="table table-bordered table-hover" >
                        <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th>User</th>
                                    <th>Tipo Usuario</th>
                                    <th>Nombres</th>
                                    <th width="100">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['user'] ?></td>
                                        <td><?php echo $row['tipo_user'] ?></td>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td>

                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_user').value = '<?= $row['user'] ?>';document.getElementById('update_contrasena').value = '<?= $row['contrasena'] ?>';document.getElementById('update_tipo_user').value = '<?= $row['tipo_user'] ?>';document.getElementById('update_nombres').value = '<?= $row['nombre'] ?>';" title="Editar Usuario" style="margin-right: 5px;"><img src="images/actualizar_icono.png" width="30"/></a>
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_user').value =' <?= $row['user'] ?>';document.getElementById('delete_nombre').value = '<?= $row['nombre'] ?>';" title="Eliminar Usuario"><img src="images/eliminar_icono.png" width="30"/></a>


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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Usuario</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=usuario" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_dni">Seleccione Personal:</label>
                        <br>
                        <select style="width:400px;border:3px solid #04467E" name="add_dni" id='add_dni' required="required">  
                        <?php
                                while ($row = mysqli_fetch_assoc($res1)) :
                                ?>
                                    <option value=<?php echo $row['dni'];?>><?php echo $row['dni'].' - '.$row['nombres'];?> </option>  
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_tipo_user">Tipo Usuario</label>
                        <br>
                        <select style="width:400px;border:3px solid #04467E" name="add_tipo_user" id='add_tipo_user' required="required">  
                            <option value="ADMIN"> ADMIN </option>
                         	<option value="ADMINISTRADOR"> ADMINISTRADOR </option>
                            <option value="FINAL"> FINAL </option>  
                         	<option value="RRHH"> RRHH </option>
                         	<option value="FINANZAS"> FINANZAS </option>
                         	<option value="OPERACIONES"> OPERACIONES </option>
                        </select>  
                    </div>

                    <input type="submit" name="add_usuario" Value="Registrar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para Ingresar -->
<div class="modal fade" id="AddModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Usuario - Proveedor</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=usuario" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_dni">Seleccione Proveedor:</label>
                        <br>
                        <select style="width:400px;border:3px solid #04467E" name="add_dni" id='add_dni' required="required">  
                        <?php
                                while ($row = mysqli_fetch_assoc($res2)) :
                                ?>
                                    <option value=<?php echo $row['ruc'];?>><?php echo $row['ruc'].' - '.$row['razon_social'];?> </option>  
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_tipo_user">Tipo Usuario</label>
                        <br>
                        <select style="width:400px;border:3px solid #04467E" name="add_tipo_user" id='add_tipo_user' required="required">  
                            <option value="PROVEEDOR"> PROVEEDOR </option>  
                        </select>  
                    </div>

                    <input type="submit" name="add_usuario" Value="Registrar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Editar Usuario</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=usuario" method="POST">
                    <input type="hidden" name="update_user" id="update_user" value="">
                    <div class="form-group">
                        <label for="update_nombres">Nombre</label>
                        <input type="text" name="update_nombres" id="update_nombres" class="form-control" required="required" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="update_tipo_user">Tipo Usuario</label>
                        <br>
                        <select style="width:200px;border:1px solid #04467E" name="update_tipo_user" id='update_tipo_user' required="required">  
                            <option value="ADMIN"> ADMIN </option>  
                            <option value="ADMINISTRADOR"> ADMINISTRADOR </option>
                            <option value="FINAL"> FINAL </option>  
                         	<option value="RRHH"> RRHH </option>
                         	<option value="FINANZAS"> FINANZAS </option>
                         	<option value="OPERACIONES"> OPERACIONES </option>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="update_contrasena">Contraseña</label>
                        <input type="text" name="update_contrasena" id="update_contrasena" class="form-control" required="required">
                    </div>
                    <br>
                    <input type="submit" name="update_usuario" id="update_usuario" Value="Actualizar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para Modificar -->
<div class="modal fade" id="EditModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Editar Usuario</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=usuario" method="POST">
                    <input type="hidden" name="update_user" id="update_user" value="">
                    <div class="form-group">
                        <label for="update_nombres">Nombre</label>
                        <input type="text" name="update_nombres" id="update_nombres" class="form-control" required="required" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="update_tipo_user">Tipo Usuario</label>
                        <br>
                        <select style="width:200px;border:1px solid #04467E" name="update_tipo_user" id='update_tipo_user' required="required">  
                            <option value="PROVEEDOR"> PROVEEDOR </option>   
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="update_contrasena">Contraseña</label>
                        <input type="text" name="update_contrasena" id="update_contrasena" class="form-control" required="required">
                    </div>
                    <br>
                    <input type="submit" name="update_usuario" id="update_usuario" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Usuario</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=usuario" method="POST">
                    <input type="hidden" name="delete_user" id="delete_user" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Usuario?</label>
                        <input type="text" name="delete_nombre" id="delete_nombre" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_usuario" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>