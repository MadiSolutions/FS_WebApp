<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">LISTA DE MARCACION</h1>
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
                            <thead>
                                <tr>
                                <th style="color:#1338BE";>Nombre</th>
                                <th style="color:#1338BE";>DNI</th>
                                <th style="color:#1338BE";>Fecha</th>
                                <th style="color:#1338BE";>Hora</th>
                                <th style="color:#1338BE";>Tipo Marcacion</th>
                                <th style="color:#1338BE";>GPS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['nombres'] ?></td>
                                        <td><?php echo $row['dni'] ?></td>
                                        <td><?php echo $row['fecha'] ?></td>
                                        <td><?php echo $row['hora'] ?></td>
                                        <td><?php echo $row['tipo_marcacion'] ?></td>
                                        <td><?php echo $row['gps'] ?></td>
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
                <h4 class="modal-title" id="defaultModalLabel">EDITAR PERSONAL</h4>
            </div>
            <div class="modal-body">
            <form action="panel.php?modulo=personal" id="ingresar" method="POST">
                    <input type="hidden" name="update_id_personal" id="update_id_personal" value="">
                    <h4 style="font-family:candara; color:#1338BE">DATOS PERSONALES</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_nombre">NOMBRE COMPLETO</label>
                            </th>
                            <th>
                                <input type="text" name="update_nombre" id="update_nombre" placeholder="NOMBRE" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_dni">DNI</label>
                            </th>
                            <th>
                                <input type="number" name="update_dni" id="update_dni" placeholder="DNI" class="form-control" required="required">      
                            </th>
                            <th>
                                <label for="update_direccion">DIRECCION</label>                 
                            </th>
                            <th>
                                <input type="text" name="update_direccion" id="update_direccion" placeholder="DIRECCION" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>  
                            <th>
                                <label for="update_telefono">TELEFONO</label>  
                            </th>
                            <th>
                                <input type="number" name="update_telefono" id="update_telefono" placeholder="TELÉFONO" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_correo_electronico">CORREO</label>  
                            </th>
                            <th>
                                <input type="text" name="update_correo_electronico" id="update_correo_electronico" placeholder="E-MAIL" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_grado_instruccion">GRADO DE INSTRUCCION</label> 
                            </th>
                            <th>
                                <select name="update_grado_instruccion" id='update_grado_instruccion' required="required">  
                                    <option value="PRIMARIA"> PRIMARIA </option>  
                                    <option value="PRIMARIA INCOMPLETA"> PRIMARIA INCOMPLETA </option>  
                                    <option value="SECUNDARIA"> SECUNDARIA </option>
                                    <option value="SECUNDARIA INCOMPLETA"> SECUNDARIA INCOMPLETA </option>
                                    <option value="SUPERIOR"> SUPERIOR </option>
                                    <option value="SUPERIOR INCOMPLETA"> SUPERIOR INCOMPLETA </option>  
                                </select>   
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_fecha_nacimiento">FECHA DE NACIMIENTO</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_nacimiento" id="update_fecha_nacimiento" placeholder="FECHA DE NACIMIENTO" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_lugar_nacimiento">LUGAR DE NACIMIENTO</label>
                            </th>
                            <th>
                                <input type="text" name="update_lugar_nacimiento" id="update_lugar_nacimiento" placeholder="LUGAR DE NACIMIENTO" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_grupo_sanguineo">GRUPO SANGUINEO</label>
                            </th>
                            <th>
                                <input type="text" name="update_grupo_sanguineo" id="update_grupo_sanguineo" placeholder="GRUPO SANGUINEO" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_cargo">CARGO</label>
                            </th>
                            <th>
                                <input type="text" name="update_cargo" id="update_cargo" placeholder="CARGO" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_tipo_licencia_conducir">TIPO LICENCIA DE CONDUCIR</label>
                            </th>
                            <th>
                                <input type="text" name="update_tipo_licencia_conducir" id="update_tipo_licencia_conducir" placeholder="LICENCIA DE CONDUCIR" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_num_licencia_conducir">NRO LICENCIA DE CONDUCIR</label>
                            </th>
                            <th>
                                <input type="text" name="update_num_licencia_conducir" id="update_num_licencia_conducir" placeholder="NRO LICENCIA DE CONDUCIR" class="form-control" required="required">
                            </th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">DATOS DEL CONYUGUE</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_estado_civil">ESTADO CIVIL</label>
                            </th>
                            <th>
                                <select name="update_estado_civil" id='update_estado_civil' required="required">  
                                    <option value="SOLTERO"> SOLTERO </option>  
                                    <option value="CASADO"> CASADO </option>  
                                    <option value="VIUDO"> VIUDO </option>
                                    <option value="DIVORCIADO"> DIVORCIADO </option>  
                                </select> 
                            </th>
                            <th>
                                <label for="update_nombre_esposoa">NOMBRE ESPOSO(A)*</label>
                            </th>
                            <th>
                                <input type="text" name="update_nombre_esposoa" id="update_nombre_esposoa" placeholder="NOMBRE ESPOSO(A)" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_dni_esposoa">DNI ESPOSO(A)</label>
                            </th>
                            <th>
                                <input type="text" name="update_dni_esposoa" id="update_dni_esposoa" placeholder="DNI ESPOSO(A)" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>
                                <label for="update_num_hijos">NRO HIJOS</label>            
                            </th>
                            <th>
                                <input type="number" name="update_num_hijos" id="update_num_hijos" placeholder="NUM HIJOS" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_datos_hijos">DATOS HIJOS</label>    
                            </th>
                            <th>
                                <input type="text" name="update_datos_hijos" id="update_datos_hijos" placeholder="NOMBRE - DNI, ..." class="form-control" required="required">
                            </th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">INFORMACION BANCARIA</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_salario">SALARIO</label>
                            </th>
                            <th>
                                <input type="text" name="update_salario" id="update_salario" placeholder="SALARIO" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_banco_salario">BANCO SALARIO</label>
                            </th>
                            <th>
                                <select name="update_banco_salario" id='update_banco_salario' required="required">  
                                    <option value="BCP"> BCP </option>  
                                    <option value="INTERBANK"> INTERBANK </option>  
                                    <option value="BBVA"> BBVA </option>
                                    <option value="SCOTIABANK"> SCOTIABANK </option>  
                                    <option value="CAJA AREQUIPA"> CAJA AREQUIPA </option> 
                                </select> 
                            </th>
                            <th>
                                <label for="update_nro_cuenta_salario">NRO. CUENTA SALARIO</label>
                            </th>
                            <th>
                                <input type="text" name="update_nro_cuenta_salario" id="update_nro_cuenta_salario" placeholder="NRO CUENTA" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>
                                <label for="update_banco_cts">BANCO CTS</label>
                            </th>
                            <th>
                                <select name="update_banco_cts" id='update_banco_cts' required="required">  
                                    <option value="BCP"> BCP </option>  
                                    <option value="INTERBANK"> INTERBANK </option>  
                                    <option value="BBVA"> BBVA </option>
                                    <option value="SCOTIABANK"> SCOTIABANK </option>  
                                    <option value="CAJA AREQUIPA"> CAJA AREQUIPA </option> 
                                </select> 
                            </th>
                            <th>
                                <label for="update_nro_cuenta_cts">NRO. CUENTA CTS</label>
                            </th>
                            <th>
                                <input type="text" name="update_nro_cuenta_cts" id="update_nro_cuenta_cts" placeholder="NRO CUENTA" class="form-control" required="required">
                            </th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">SISTEMA DE PENSIONES</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_sistema_pensiones">SISTEMA DE PENSIONES</label>            
                            </th>
                            <th>
                                <select name="update_sistema_pensiones" id='update_sistema_pensiones' required="required">  
                                    <option value="ONP"> ONP </option>  
                                    <option value="AFP"> AFP </option>  
                                </select> 
                            </th>
                            <th>
                                <label for="update_nombre_afp">NOMBRE AFP</label>    
                            </th>
                            <th>
                                <select name="update_nombre_afp" id='update_nombre_afp' required="required">  
                                    <option value="ONP"> ONP </option>  
                                    <option value="HABITAD"> HABITAD </option>
                                    <option value="PROFUTURO"> PROFUTURO </option>  
                                    <option value="PRIMA"> PRIMA </option>
                                    <option value="INTEGRA"> INTEGRA </option>    
                                </select> 
                            </th>
                            <th>
                                <label for="update_cuenta_sistema_pensiones">NRO DE CUENTA</label>    
                            </th>
                            <th>
                                <input type="number" name="update_cuenta_sistema_pensiones" id="update_cuenta_sistema_pensiones" placeholder="NRO CUENTA" class="form-control" required="required">
                            </th>
                        </tr>                  
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">INFORMACION DE EMERGENCIA</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_nombre_emergencia">CONTACTO DE EMERGENCIA</label>
                            </th>
                            <th>
                                <input type="text" name="update_nombre_emergencia" id="update_nombre_emergencia" placeholder="NOMBRE" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_telefono_emergencia">TELEFONO DE EMERGENCIA</label>
                            </th>
                            <th>
                                <input type="number" name="update_telefono_emergencia" id="update_telefono_emergencia" placeholder="TELEFONO" class="form-control" required="required">      
                            </th>
                            <th>
                                <label for="update_direccion_emergencia">DIRECCION DE EMERGENCIA</label>                 
                            </th>
                            <th>
                                <input type="text" name="update_direccion_emergencia" id="update_direccion_emergencia" placeholder="Dirección" class="form-control" required="required">
                            </th>
                        </tr>
                    </table>
                    <input type="submit" name="update_personal" id="update_personal" Value="Actualizar" class="btn btn-primary">
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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Personal</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=medicos" method="POST">
                    <input type="hidden" name="delete_dni" id="delete_dni" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Personal?</label>
                        <input type="text" name="delete_nombre" id="delete_nombre" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_personal" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>