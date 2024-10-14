<?php
    date_default_timezone_set('America/Lima');
    $hoy=date("Y-m-d"); 
    $user=$_SESSION['usuario'];
    $queryu = "SELECT * from personal where dni=$user LIMIT 1;";
    $resu = mysqli_query($con, $queryu);
    while ($row = mysqli_fetch_assoc($resu)) :
        $nombres=$row['nombres'];
    endwhile;
    
    ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Lista de Tareas</h1>
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
                        Agregar Nueva Tarea
                    </button>
                    
                    <div class="table-responsive">         
                    <table id="example2" class="table table-bordered table-hover" style="text-align:center;">
                        <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th>Tarea</th>
                                    <th>Asignada por</th>
                                    <th>Asignada a</th>
                                    <th>Estado Tarea</th>
                                    <th>Fecha Creada</th>
                                    <th>Fecha En Desarrollo</th>
                                    <th>Fecha Respuesta</th>
                                    <th>Fecha Cierre</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Estado Vencimiento</th>
                                    <th>Observacion</th>
                                    <th>Entregable</th>
                                    <th>Acciones</th>
                                </tr>
                        </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['descripcion'] ?></td>
                                        <td><?php echo $row['nombres'] ?></td>
                                        <td><?php echo $row['asignada_a'] ?></td>
                                        <td><?php if($row['estado_tarea']=='ASIGNADA'){ ?>
                                            <span class="badge badge-warning">ASIGNADA</span>
                                            <?php } if($row['estado_tarea']=='EN DESARROLLO'){ ?>
                                            <span class="badge badge-primary">EN DESARROLLO</span>
                                            <?php } if($row['estado_tarea']=='ENVIADO A REVISION'){ ?>
                                            <span class="badge badge-info">ENVIADO A REVISION</span>
                                            <?php } if($row['estado_tarea']=='ACEPTADO'){ ?>
                                            <span class="badge badge-success">ACEPTADO</span>
                                            <?php } if($row['estado_tarea']=='RECHAZADO'){ ?>
                                            <span class="badge badge-danger">RECHAZADO</span>
                                            <?php } ?>                          
                                        </td>
                                        <td><?php echo $row['fecha_registro'] ?></td>
                                        <td><?php 
                                            if ($row['fecha_endesarrollo']=='2001-01-01') {
                                                echo "-";
                                            }
                                            else{
                                                echo $row['fecha_endesarrollo'];
                                            }
                                            ?></td>
                                        <td><?php 
                                            if ($row['fecha_enviadoarevision']=='2001-01-01') {
                                                echo "-";
                                            }
                                            else{
                                                echo $row['fecha_enviadoarevision'];
                                            }
                                            ?></td>
                                        <td><?php 
                                            if($row['fecha_calificado']=='2001-01-01'){
                                                echo "-";
                                            } 
                                            else{
                                                echo $row['fecha_calificado'];
                                            }?></td>
                                        <td><?php echo $row['fecha_vencimiento'] ?></td>
                                        <td><?php if($hoy>$row['fecha_vencimiento']){?>
                                            <span class="badge badge-danger">VENCIDA</span>
                                        <?php }else{?>
                                            <span class="badge badge-success">VIGENTE</span>
                                        <?php } ?></td>
                                        <td><?php echo $row['observacion'] ?></td>
                                        <?php
                                            if (file_exists("documentos/tareas/ENTREGABLE".'_'.$row['id_tarea'].'_'.$row['asignada_a'].'_'.$row['fecha_vencimiento'].'.pdf')) { ?>
                                                <td> <a <?="href=documentos/tareas/ENTREGABLE".$row['id_proveedor'].$row['fecha_emitida'].'_'.'_'.$row['serie'].'-'.$row['num_documento'].'.pdf' ?> download target="_blank"><img src="images/logo_descargar.png" width="30"/></a></td>
                                        <?php
                                            }if (file_exists("documentos/tareas/ENTREGABLE".'_'.$row['id_tarea'].'_'.$row['asignada_a'].'_'.$row['fecha_vencimiento'].'.xls')) { ?>
                                                <td> <a <?="href=documentos/tareas/ENTREGABLE".'_'.$row['id_tarea'].'_'.$row['asignada_a'].'_'.$row['fecha_vencimiento'].'.xls' ?> download target="_blank"><img src="images/logo_descargar.png" width="30"/></a></td>
                                        <?php
                                            }if (file_exists("documentos/tareas/ENTREGABLE".'_'.$row['id_tarea'].'_'.$row['asignada_a'].'_'.$row['fecha_vencimiento'].'.xlsx')) { ?>
                                                <td> <a <?="href=documentos/tareas/ENTREGABLE".'_'.$row['id_tarea'].'_'.$row['asignada_a'].'_'.$row['fecha_vencimiento'].'.xlsx' ?> download target="_blank"><img src="images/logo_descargar.png" width="30"/></a></td>
                                        <?php
                                            }else{?>
                                                <td>Sin Entregable</td>
                                        <?php
                                           }
                                        ?>
                                        <td>
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id_tarea').value = '<?= $row['id_tarea'] ?>';document.getElementById('update_fecha_registro').value = '<?= $row['fecha_registro'] ?>';document.getElementById('update_asignada_por').value = '<?= $row['asignada_por'] ?>';document.getElementById('update_asignada_a').value = '<?= $row['asignada_a'] ?>';document.getElementById('update_descripcion').value = '<?= $row['descripcion'] ?>';document.getElementById('update_fecha_vencimiento').value = '<?= $row['fecha_vencimiento'] ?>';document.getElementById('update_estado_tarea').value = '<?= $row['estado_tarea'] ?>';document.getElementById('update_observacion').value = '<?= $row['observacion'] ?>';document.getElementById('update_fecha_endesarrollo').value = '<?= $row['fecha_endesarrollo'] ?>';document.getElementById('update_fecha_enviadoarevision').value = '<?= $row['fecha_enviadoarevision'] ?>';document.getElementById('update_fecha_calificado').value = '<?= $row['fecha_calificado'] ?>';document.getElementById('update_asignada_porn').value = '<?= $row['nombres'] ?>';" title="Editar Tarea" style="margin-right: 5px;"><img src="images/actualizar_icono.png" width="30" /></a>
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id_tarea').value =' <?= $row['id_tarea'] ?>';document.getElementById('delete_descripcion').value = '<?= $row['descripcion'] ?>';" title="Eliminar Tarea"><img src="images/eliminar_icono.png" width="30" /></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        </div>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nueva Tarea</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=tareas" id="ingresar" method="POST">
                <input type="hidden" name="add_user" id="add_user" value="<?php echo $user;?>">
                <table id="example2" class="table table-bordered table-hover">
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="add_fecha_registro">Fecha Registro</label>
                                <input type="date" name="add_fecha_registro" id="add_fecha_registro" class="form-control" required="required" value=<?php echo $hoy; ?> readonly="readonly">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="add_asignada_por">Asignada Por:</label>
                                <input type="hidden" name="add_asignada_por" id="add_asignada_por" value="<?php echo $user;?>">
                                <input type="text" name="add_asignada_porn" id="add_asignada_porn" class="form-control" required="required" value="<?php echo $nombres;?>" readonly="readonly">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="add_asignada_a">Asignada A:</label><br>
                                <select style="width:200px;border:1px solid #04467E" name="add_asignada_a" id='add_asignada_a' required="required">  
                                    <option value="OPERACIONES">OPERACIONES</option>  
                                    <option value="RRHH">RECURSOS HUMANOS</option>
                                    <option value="CONTABILIDAD">CONTABILIDAD</option>
                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option> 
                                	<option value="SSOMA">SSOMA</option> 
                                	<option value="PLANEAMIENTO">PLANEAMIENTO</option> 
                                
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="add_descripcion">Tarea</label>
                                <input type="text" name="add_descripcion" id="add_descripcion" class="form-control" required="required" >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="add_fecha_vencimiento">Fecha Vencimiento</label>
                                <input type="date" name="add_fecha_vencimiento" id="add_fecha_vencimiento" class="form-control" required="required" >
                            </div>
                        </td>
                    </tr>
                    </table>
                    <input type="submit" name="add_tarea" Value="Registrar" class="btn btn-primary">
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
            <h4 class="modal-title" id="defaultModalLabel">Editar Tarea</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=tareas" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update_id_tarea" id="update_id_tarea" value="">
                    <input type="hidden" name="update_fecha_endesarrollo" id="update_fecha_endesarrollo" value="">
                    <input type="hidden" name="update_fecha_enviadoarevision" id="update_fecha_enviadoarevision" value="">
                    <input type="hidden" name="update_fecha_calificado" id="update_fecha_calificado" value="">
                    <input type="hidden" name="update_asignada_por" id="update_asignada_por" value="">
                    <table id="example2" class="table table-bordered table-hover">
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="update_fecha_registro">Fecha Registro</label>
                                <input type="date" name="update_fecha_registro" id="update_fecha_registro" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_asignada_porn">Asignada Por:</label>
                                <input type="text" name="update_asignada_porn" id="update_asignada_porn" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_asignada_a">Asignada A:</label><br>
                                <select style="width:200px;border:1px solid #04467E" name="update_asignada_a" id='update_asignada_a' required="required">  
                                    <option value="OPERACIONES">OPERACIONES</option>  
                                    <option value="RRHH">RECURSOS HUMANOS</option>
                                    <option value="CONTABILIDAD">CONTABILIDAD</option>
                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option> 
                                	<option value="SSOMA">SSOMA</option> 
                                	<option value="PLANEAMIENTO">PLANEAMIENTO</option> 
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="update_descripcion">Tarea</label>
                                <input type="text" name="update_descripcion" id="update_descripcion" class="form-control" required="required" >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="update_fecha_vencimiento">Fecha Vencimiento</label>
                                <input type="date" name="update_fecha_vencimiento" id="update_fecha_vencimiento" class="form-control" required="required" >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_estado_tarea">Estado Tarea:</label><br>
                                <select style="width:200px;border:1px solid #04467E" name="update_estado_tarea" id='update_estado_tarea' required="required">  
                                    <option value="ASIGNADA">Asignada</option>  
                                    <option value="EN DESARROLLO">En Desarrollo</option>
                                    <option value="ENVIADO A REVISION">Enviado a Revision</option>
                                    <option value="ACEPTADO">Aceptado</option>
                                    <option value="RECHAZADO">Rechazado</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="update_observacion">Observacion</label>
                                <input type="text" name="update_observacion" id="update_observacion" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="update_archivo_tarea">Archivo</label><br>
                            <input type="file" name="update_archivo_tarea" id="update_archivo_tarea" accept="application/pdf, .xls, .xlsx">
                        </td>
                    </tr>
                    </table>
                    <input type="submit" name="update_tarea" id="update_tarea" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Tarea</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=tareas" method="POST">
                    <input type="hidden" name="delete_id_tarea" id="delete_id_tarea" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar esta Tarea?</label>
                        <input type="text" name="delete_descripcion" id="delete_descripcion" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_tarea" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>