<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Asignacion de Personal</h1>
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
                    <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nuevo Medico"> Agregar Nuevo <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <table id="example2" class="table table-bordered table-hover">
                        <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Jornada</th>
                                    <th>RUC</th>
                                    <th>Cliente</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['dni'] ?></td>
                                        <td><?php echo $row['nombres'] ?></td>
                                        <td><?php echo $row['tipo_servicio'] ?></td>
                                        <td><?php echo $row['ruc'] ?></td>
                                        <td><?php echo $row['razon_social'] ?></td>
                                        <td><?php echo $row['fecha_inicio'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_cod_asig_operacion').value = '<?= $row['cod_asig_operacion'] ?>';document.getElementById('update_dni').value = '<?= $row['dni'] ?>';document.getElementById('update_nombres').value = '<?= $row['nombres'] ?>';document.getElementById('update_cod_servicio').value = '<?= $row['cod_servicio'] ?>';document.getElementById('update_tipo_servicio').value = '<?= $row['tipo_servicio'] ?>';document.getElementById('update_cod_cliente').value = '<?= $row['cod_cliente'] ?>';document.getElementById('update_fecha_inicio').value = '<?= $row['fecha_inicio'] ?>';" title="Editar Usuario" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_cod_asig_operacion').value =' <?= $row['cod_asig_operacion'] ?>';document.getElementById('delete_nombres').value = '<?= $row['nombres'] ?>';" title="Eliminar Asignacion" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Asignacion</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=asignacion_personal" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_dni">Personal</label>
                        <br>
                        <select style="width:300px;border:3px solid #04467E" name="add_dni" id='add_dni' required="required">  
                        <?php
                                while ($row = mysqli_fetch_assoc($res4)) :
                                ?>
                                    <option value=<?php echo $row['dni'];?>><?php echo $row['nombres'];?> </option>  
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_jornada">Jornada</label>
                        <br>
                        <select style="width:300px;border:3px solid #04467E" name="add_jornada" id='add_jornada' required="required">  
                        <?php
                                while ($row = mysqli_fetch_assoc($res2)) :
                                ?>
                                    <option value=<?php echo $row['cod_servicio'];?>><?php echo $row['tipo_servicio'];?> </option>  
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_cliente">Clientes</label>
                        <br>
                        <select style="width:300px;border:3px solid #04467E" name="add_cliente" id='add_cliente' required="required">  
                        <?php
                                while ($row = mysqli_fetch_assoc($res3)) :
                                ?>
                                    <option value=<?php echo $row['cod_cliente'];?>><?php echo $row['razon_social'];?> </option>  
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div>
                        <label for='add_fecha_inicio'>Fecha Inicio</label>
                        <br>
                        <input type="date" name="add_fecha_inicio" id="add_fecha_inicio" value="">            
                    </div>
                    <br>
                    <input type="submit" name="add_asig_operacion" Value="Registrar" class="btn btn-primary">
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
                <h4 class="modal-title" id="defaultModalLabel">Editar Asignacion</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=asignacion_personal" method="POST">
                    <input type="hidden" name="update_cod_asig_operacion" id="update_cod_asig_operacion" value="">
                    <div class="form-group">
                        <label for="update_dni">DNI</label>
                        <input type="text" name="update_dni" id="update_dni" class="form-control" required="required"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="update_nombres">Nombre Completo</label>
                        <input type="text" name="update_nombres" id="update_nombres" class="form-control" required="required" readonly >
                    </div>
                    <div class="form-group">
                        <label for="update_cod_servicio">Jornada</label>
                        <br>
                        <select style="width:300px;border:3px solid #04467E" name="update_cod_servicio" id='update_cod_servicio' required="required">  
                        <?php
                                while ($row = mysqli_fetch_assoc($res5)) :
                                ?>
                                    <option value=<?php echo $row['cod_servicio'];?>><?php echo $row['tipo_servicio'];?> </option>  
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="update_cod_cliente">Cliente</label>
                        <br>
                        <select style="width:300px;border:3px solid #04467E" name="update_cod_cliente" id='update_cod_cliente' required="required">  
                        <?php
                                while ($row = mysqli_fetch_assoc($res6)) :
                                ?>
                                    <option value=<?php echo $row['cod_cliente'];?>><?php echo $row['razon_social'];?> </option>  
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div>
                        <label for='update_fecha_inicio'>Fecha Inicio</label>
                        <br>
                        <input type="date" name="update_fecha_inicio" id="update_fecha_inicio"  class="form-control" required="required">         
                    </div>
                    <br>
                    <input type="submit" name="update_asig_operacion" id="update_asig_operacion" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Asignacion</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=asignacion_personal" method="POST">
                    <input type="hidden" name="delete_cod_asig_operacion" id="delete_cod_asig_operacion" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar la Asignacion?</label>
                        <input type="text" name="delete_nombres" id="delete_nombres" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_asig_operacion" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>