<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mis Resultados</h1>
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
                    <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nuevo Resultado"> Agregar Nuevo <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cod Examen</th>
                                    <th>Tipo Examen</th>
                                    <th>Detalle</th>
                                    <th>DNI Paciente</th>
                                    <th>Nombre Paciente</th>
                                    <th>Fecha</th>
                                    <th>Responsable</th>
                                    <th>Resultado</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['cod_examen'] ?></td>
                                        <td><?php echo $row['tipo_examen'] ?></td>
                                        <td><?php echo $row['detalle'] ?></td>
                                        <td><?php echo $row['dni_paciente'] ?></td>
                                        <td><?php echo $row['nom_paciente'] ?></td>
                                        <td><?php echo $row['fecha'] ?></td>
                                        <td><?php echo $row['nombre_responsable'] ?></td>
                                        
                                        <?php 
                                            if($row['url_resultado']!=''){
                                                ?>        
                                            <td> <a <?="href='$row[url_resultado]'"?> download target="_blank">Descarga</a></td>
                                        <?php }
                                            else{
                                        ?>
                                            <td>-</td>
                                        <?php
                                            }
                                        ?>
                                    
                                        <?php 
                                            if($row['url_imagen']!=''){
                                                ?>        
                                            <td> <a <?="href='$row[url_imagen]'"?> download target="_blank">Descarga</a></td>
                                        <?php }
                                            else{
                                        ?>
                                            <td>-</td>
                                        <?php
                                            }
                                        ?>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_cod_examen').value = <?= $row['cod_examen'] ?>;document.getElementById('update_tipo_examen').value = '<?= $row['codigo'] ?>';document.getElementById('update_detalle').value = '<?= $row['detalle'] ?>';document.getElementById('update_fecha').value = '<?= $row['fecha'] ?>';document.getElementById('update_dni_paciente').value = '<?= $row['dni_paciente'] ?>';document.getElementById('update_dni_responsable').value = '<?= $row['dni_responsable'] ?>';" title="Editar Examen" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_cod_examen').value = <?= $row['cod_examen'] ?>;document.getElementById('delete_detalle').value = '<?= $row['cod_examen'].' - '.$row['tipo_examen'].' DE '.$row['nom_paciente'] ?>';" title="Eliminar Examen" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Resultado</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=misresultados" id="ingresar" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="add_cod_examen" id="add_cod_examen" value="0">                
                    <div class="form-group">
                        <label for="add_tipo_examen">Tipo Examen</label>
                        <br>
                        <select name="add_tipo_examen" id='add_tipo_examen' required="required">  
                            <?php
                                while ($row = mysqli_fetch_assoc($res2b)) :
                                    echo '<option value="'.$row['codigo'].'">'.$row['descripcion'].'</option>';
                                endwhile
                            ?>
                        </select>  
                    </div>

                    <div class="form-group">
                        <label for="add_detalle">Detalle</label>
                        <input type="text" name="add_detalle" id="add_detalle" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_fecha">Fecha</label>
                        <input type="date" name="add_fecha" id="add_fecha" class="form-control" required="required" maxlength="9" minlength="9">
                    </div>

                    <div class="form-group">
                        <label for="add_dni_paciente">Nombre Paciente</label>
                        <br>
                        <select name="add_dni_paciente" id='add_dni_paciente' required="required">  
                            <?php
                                while ($row = mysqli_fetch_assoc($res3b)) :
                                    echo '<option value="'.$row['dni'].'">'.$row['nombre'].'</option>';
                                endwhile
                            ?>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="add_dni_responsable">Nombre Responsable</label>
                        <br>
                        <select name="add_dni_responsable" id='add_dni_responsable' required="required">  
                            <?php
                                while ($row = mysqli_fetch_assoc($res4b)) :
                                    echo '<option value="'.$row['dni'].'">'.$row['nombre'].'</option>';
                                endwhile
                            ?>
                        </select>  
                    </div>  
                    <div class="form-group">
                        <label for="add_resultadopdf">Resultado PDF</label><br>
                        <input type="file" name="add_resultadopdf" id="add_resultadopdf">
                    </div> 
                    <div class="form-group">
                        <label for="add_resultadozip">Resultado  Imagen (zip)</label><br>
                        <input type="file" name="add_resultadozip" id="add_resultadozip">
                    </div> 
                    <input type="submit" name="add_misresultados" Value="Registrar" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Modificar -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Editar Resultado</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=misresultados" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update_cod_examen" id="update_cod_examen" value="">

                    <div class="form-group">
                        <label for="update_tipo_examen">Tipo Examen</label>
                        <br>
                        <select name="update_tipo_examen" id='update_tipo_examen' required="required">  
                            <?php
                                while ($row = mysqli_fetch_assoc($res2)) :
                                    echo '<option value="'.$row['codigo'].'">'.$row['descripcion'].'</option>';
                                endwhile
                            ?>
                        </select>  
                    </div>

                    <div class="form-group">
                        <label for="update_detalle">Detalle</label>
                        <input type="text" name="update_detalle" id="update_detalle" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_fecha">Fecha</label>
                        <input type="date" name="update_fecha" id="update_fecha" class="form-control" required="required" maxlength="9" minlength="9">
                    </div>

                    <div class="form-group">
                        <label for="update_dni_paciente">Nombre Paciente</label>
                        <br>
                        <select name="update_dni_paciente" id='update_dni_paciente' required="required">  
                            <?php
                                while ($row = mysqli_fetch_assoc($res3)) :
                                    echo '<option value="'.$row['dni'].'">'.$row['nombre'].'</option>';
                                endwhile
                            ?>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="update_dni_responsable">Nombre Responsable</label>
                        <br>
                        <select name="update_dni_responsable" id='update_dni_responsable' required="required">  
                            <?php
                                while ($row = mysqli_fetch_assoc($res4)) :
                                    echo '<option value="'.$row['dni'].'">'.$row['nombre'].'</option>';
                                endwhile
                            ?>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="update_resultadopdf">Resultado (pdf)</label><br>
                        <input type="file" name="update_resultadopdf" id="update_resultadopdf">
                    </div> 
                    <div class="form-group">
                        <label for="update_resultadozip">Resultado  Imagen (zip)</label><br>
                        <input type="file" name="update_resultadozip" id="update_resultadozip">
                    </div> 
                    <input type="submit" name="update_misresultados" id="update_misresultados" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Resultado</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=misresultados" method="POST">
                    <input type="hidden" name="delete_cod_examen" id="delete_cod_examen" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Resultado?</label>
                        <input type="text" name="delete_detalle" id="delete_detalle" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_misresultados" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>