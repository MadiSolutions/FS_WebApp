<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">LISTA DEL PERSONAL</h1>
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
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['nombres'] ?></td>
                                        <td><?php echo $row['dni'] ?></td>
                                        <td><?php echo $row['telefono'] ?></td>
                                        <td><?php echo $row['correo_electronico'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td><?php echo $row['cargo'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id_personal').value ='<?= $row['id_personal']?>';document.getElementById('update_nombre').value ='<?= $row['nombres']?>';document.getElementById('update_pais').value ='<?= $row['pais'] ?>';document.getElementById('update_ubigeo').value ='<?= $row['ubigeo'] ?>';document.getElementById('update_mina_ciudad').value ='<?= $row['mina_ciudad'] ?>';document.getElementById('update_dni').value ='<?= $row['dni'] ?>';document.getElementById('update_direccion').value ='<?= $row['direccion'] ?>';document.getElementById('update_telefono').value ='<?= $row['telefono'] ?>';document.getElementById('update_correo_electronico').value ='<?= $row['correo_electronico'] ?>';document.getElementById('update_grado_instruccion').value ='<?= $row['grado_instruccion'] ?>';document.getElementById('update_fecha_nacimiento').value ='<?= $row['fecha_nacimiento'] ?>';document.getElementById('update_lugar_nacimiento').value ='<?= $row['lugar_nacimiento'] ?>';document.getElementById('update_grupo_sanguineo').value ='<?= $row['grupo_sanguineo'] ?>';document.getElementById('update_cargo').value ='<?= $row['cargo'] ?>';document.getElementById('update_tipo_licencia_conducir').value ='<?= $row['tipo_licencia_conducir'] ?>';document.getElementById('update_num_licencia_conducir').value ='<?= $row['num_licencia_conducir'] ?>';document.getElementById('update_estado_civil').value ='<?= $row['estado_civil'] ?>';document.getElementById('update_nombre_esposoa').value ='<?= $row['nombre_esposoa'] ?>';document.getElementById('update_dni_esposoa').value ='<?= $row['dni_esposoa'] ?>';document.getElementById('update_num_hijos').value ='<?= $row['num_hijos'] ?>';document.getElementById('update_datos_hijos').value ='<?= $row['datos_hijos'] ?>';document.getElementById('update_salario').value ='<?= $row['salario'] ?>';document.getElementById('update_banco_salario').value ='<?= $row['banco_salario'] ?>';document.getElementById('update_nro_cuenta_salario').value ='<?= $row['nro_cuenta_salario'] ?>';document.getElementById('update_banco_cts').value ='<?= $row['banco_cts'] ?>';document.getElementById('update_nro_cuenta_cts').value ='<?= $row['nro_cuenta_cts'] ?>';document.getElementById('update_sistema_pensiones').value ='<?= $row['sistema_pensiones'] ?>';document.getElementById('update_nombre_afp').value ='<?= $row['nombre_afp'] ?>';document.getElementById('update_cuenta_sistema_pensiones').value ='<?= $row['cuenta_sistema_pensiones'] ?>';document.getElementById('update_nombre_emergencia').value ='<?= $row['nombre_emergencia'] ?>';document.getElementById('update_telefono_emergencia').value ='<?= $row['telefono_emergencia'] ?>';document.getElementById('update_direccion_emergencia').value ='<?= $row['direccion_emergencia'] ?>';document.getElementById('update_inicio_dni').value ='<?= $row['inicio_dni'] ?>';document.getElementById('update_venc_dni').value ='<?= $row['venc_dni'] ?>';document.getElementById('update_num_contrato').value ='<?= $row['num_contrato'] ?>';document.getElementById('update_fecha_ingreso_contrato').value ='<?= $row['fecha_ingreso_contrato'] ?>';document.getElementById('update_fecha_termino_contrato').value ='<?= $row['fecha_termino_contrato'] ?>';document.getElementById('update_venc_contrato').value ='<?= $row['venc_contrato'] ?>';document.getElementById('update_licencia_mtc').value ='<?= $row['licencia_mtc'] ?>';document.getElementById('update_venc_licencia_mtc').value ='<?= $row['venc_licencia_mtc'] ?>';document.getElementById('update_licencia_interna').value ='<?= $row['licencia_interna'] ?>';document.getElementById('update_manejo_teorico').value ='<?= $row['manejo_teorico'] ?>';document.getElementById('update_manejo_practico').value ='<?= $row['manejo_practico'] ?>';document.getElementById('update_examen_medico').value ='<?= $row['examen_medico'] ?>';document.getElementById('update_curso_induccion').value ='<?= $row['curso_induccion'] ?>';document.getElementById('update_sctr').value ='<?= $row['sctr'] ?>';document.getElementById('update_vida_ley').value ='<?= $row['vida_ley'] ?>';" title="Editar Personal" style="margin-right:5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id_personal').value ='<?= $row['id_personal'] ?>';document.getElementById('delete_nombre').value ='<?= $row['nombres'] ?>';" title="Eliminar Personal" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">AGREGAR NUEVO PERSONAL</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=personal" id="ingresar" method="POST">
                    <h4 style="font-family:candara; color:#1338BE">DATOS PERSONALES</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_pais">PAIS</label>
                            </th>
                            <th>
                                <input type="text" name="add_pais" id="add_pais" placeholder="Pais" class="form-control" >
                            </th>
                            <th>
                                <label for="add_ubigeo">UBIGEO</label>
                            </th>
                            <th>
                                <input type="text" name="add_ubigeo" id="add_ubigeo" placeholder="Ubigeo" class="form-control" >      
                            </th>
                            <th>
                                <label for="add_mina_ciudad">MINA - CIUDAD</label>                 
                            </th>
                            <th>
                                <input type="text" name="add_mina_ciudad" id="add_mina_ciudad" placeholder="Mina - Ciudad" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_nombre">NOMBRE COMPLETO</label>
                            </th>
                            <th>
                                <input type="text" name="add_nombre" id="add_nombre" placeholder="NOMBRE" class="form-control" >
                            </th>
                            <th>
                                <label for="add_dni">DNI</label>
                            </th>
                            <th>
                                <input type="number" name="add_dni" id="add_dni" placeholder="DNI" class="form-control" >      
                            </th>
                            <th>
                                <label for="add_direccion">DIRECCION</label>                 
                            </th>
                            <th>
                                <input type="text" name="add_direccion" id="add_direccion" placeholder="DIRECCION" class="form-control" >
                            </th>
                        </tr>
                        <tr>  
                            <th>
                                <label for="add_telefono">TELEFONO</label>  
                            </th>
                            <th>
                                <input type="number" name="add_telefono" id="add_telefono" placeholder="TELÉFONO" class="form-control" >
                            </th>
                            <th>
                                <label for="add_correo_electronico">CORREO</label>  
                            </th>
                            <th>
                                <input type="text" name="add_correo_electronico" id="add_correo_electronico" placeholder="Correo" class="form-control">
                            </th>
                            <th>
                                <label for="add_grado_instruccion">GRADO DE INSTRUCCION</label> 
                            </th>
                            <th>
                                <select name="add_grado_instruccion" id='add_grado_instruccion'>  
                                    <option value="PRIMARIA">PRIMARIA </option>  
                                    <option value="PRIMARIA INCOMPLETA">PRIMARIA INCOMPLETA </option>  
                                    <option value="SECUNDARIA">SECUNDARIA </option>
                                    <option value="SECUNDARIA INCOMPLETA">SECUNDARIA INCOMPLETA </option>
                                    <option value="SUPERIOR">SUPERIOR </option>
                                    <option value="SUPERIOR INCOMPLETA">SUPERIOR INCOMPLETA </option>  
                                </select>   
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_fecha_nacimiento">FECHA DE NACIMIENTO</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_nacimiento" id="add_fecha_nacimiento" placeholder="FECHA DE NACIMIENTO" class="form-control">
                            </th>
                            <th>
                                <label for="add_lugar_nacimiento">LUGAR DE NACIMIENTO</label>
                            </th>
                            <th>
                                <input type="text" name="add_lugar_nacimiento" id="add_lugar_nacimiento" placeholder="LUGAR DE NACIMIENTO" class="form-control">
                            </th>
                            <th>
                                <label for="add_grupo_sanguineo">GRUPO SANGUINEO</label>
                            </th>
                            <th>
                                <input type="text" name="add_grupo_sanguineo" id="add_grupo_sanguineo" placeholder="GRUPO SANGUINEO" class="form-control" >
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_cargo">CARGO</label>
                            </th>
                            <th>
                                <input type="text" name="add_cargo" id="add_cargo" placeholder="CARGO" class="form-control" >
                            </th>
                            <th>
                                <label for="add_tipo_licencia_conducir">TIPO LICENCIA DE CONDUCIR</label>
                            </th>
                            <th>
                                <input type="text" name="add_tipo_licencia_conducir" id="add_tipo_licencia_conducir" placeholder="LICENCIA DE CONDUCIR" class="form-control" >
                            </th>
                            <th>
                                <label for="add_num_licencia_conducir">NRO LICENCIA DE CONDUCIR</label>
                            </th>
                            <th>
                                <input type="text" name="add_num_licencia_conducir" id="add_num_licencia_conducir" placeholder="NRO LICENCIA DE CONDUCIR" class="form-control">
                            </th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">DATOS DEL CONYUGUE</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_estado_civil">ESTADO CIVIL</label>
                            </th>
                            <th>
                                <select name="add_estado_civil" id='add_estado_civil' >  
                                    <option value="SOLTERO"> SOLTERO </option>  
                                    <option value="CASADO"> CASADO </option>  
                                    <option value="VIUDO"> VIUDO </option>
                                    <option value="DIVORCIADO"> DIVORCIADO </option>  
                                </select> 
                            </th>
                            <th>
                                <label for="add_nombre_esposoa">NOMBRE ESPOSO(A)*</label>
                            </th>
                            <th>
                                <input type="text" name="add_nombre_esposoa" id="add_nombre_esposoa" placeholder="NOMBRE ESPOSO(A)" class="form-control" >
                            </th>
                            <th>
                                <label for="add_dni_esposoa">DNI ESPOSO(A)</label>
                            </th>
                            <th>
                                <input type="text" name="add_dni_esposoa" id="add_dni_esposoa" placeholder="DNI ESPOSO(A)" class="form-control" >
                            </th>
                        </tr>
                        <tr>
                        <th colspan="2"></th>
                            <th>
                                <label for="add_num_hijos">NRO HIJOS</label>            
                            </th>
                            <th>
                                <input type="number" name="add_num_hijos" id="add_num_hijos" placeholder="NUM HIJOS" class="form-control" >
                            </th>
                            <th>
                                <label for="add_datos_hijos">DATOS HIJOS</label>    
                            </th>
                            <th>
                                <input type="text" name="add_datos_hijos" id="add_datos_hijos" placeholder="NOMBRE - DNI, ..." class="form-control" >
                            </th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">INFORMACION BANCARIA</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_salario">SALARIO</label>
                            </th>
                            <th>
                                <input type="text" name="add_salario" id="add_salario" placeholder="SALARIO" class="form-control" >
                            </th>
                            <th>
                                <label for="add_banco_salario">BANCO SALARIO</label>
                            </th>
                            <th>
                                <select name="add_banco_salario" id='add_banco_salario' >  
                                    <option value="BCP"> BCP </option>  
                                    <option value="INTERBANK"> INTERBANK </option>  
                                    <option value="BBVA"> BBVA </option>
                                    <option value="SCOTIABANK"> SCOTIABANK </option>  
                                    <option value="CAJA AREQUIPA"> CAJA AREQUIPA </option> 
                                </select> 
                            </th>
                            <th>
                                <label for="add_nro_cuenta_salario">NRO. CUENTA SALARIO</label>
                            </th>
                            <th>
                                <input type="text" name="add_nro_cuenta_salario" id="add_nro_cuenta_salario" placeholder="NRO CUENTA" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2"></th>
                            <th>
                                <label for="add_banco_cts">BANCO CTS</label>
                            </th>
                            <th>
                                <select name="add_banco_cts" id='add_banco_cts'>  
                                    <option value="BCP"> BCP </option>  
                                    <option value="INTERBANK"> INTERBANK </option>  
                                    <option value="BBVA"> BBVA </option>
                                    <option value="SCOTIABANK"> SCOTIABANK </option>  
                                    <option value="CAJA AREQUIPA"> CAJA AREQUIPA </option> 
                                </select> 
                            </th>
                            <th>
                                <label for="add_nro_cuenta_cts">NRO. CUENTA CTS</label>
                            </th>
                            <th>
                                <input type="text" name="add_nro_cuenta_cts" id="add_nro_cuenta_cts" placeholder="NRO CUENTA" class="form-control" >
                            </th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">SISTEMA DE PENSIONES</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_sistema_pensiones">SISTEMA DE PENSIONES</label>            
                            </th>
                            <th>
                                <select name="add_sistema_pensiones" id='add_sistema_pensiones' >  
                                    <option value="ONP"> ONP </option>  
                                    <option value="AFP"> AFP </option>  
                                </select> 
                            </th>
                            <th>
                                <label for="add_nombre_afp">NOMBRE AFP</label>    
                            </th>
                            <th>
                                <select name="add_nombre_afp" id='add_nombre_afp' >  
                                    <option value="ONP"> ONP </option>  
                                    <option value="HABITAD"> HABITAD </option>
                                    <option value="PROFUTURO"> PROFUTURO </option>  
                                    <option value="PRIMA"> PRIMA </option>
                                    <option value="INTEGRA"> INTEGRA </option>    
                                </select> 
                            </th>
                            <th>
                                <label for="add_cuenta_sistema_pensiones">NRO DE CUENTA</label>    
                            </th>
                            <th>
                                <input type="number" name="add_cuenta_sistema_pensiones" id="add_cuenta_sistema_pensiones" placeholder="NRO CUENTA" class="form-control" >
                            </th>
                        </tr>                  
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">INFORMACION DE EMERGENCIA</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_nombre_emergencia">CONTACTO DE EMERGENCIA</label>
                            </th>
                            <th>
                                <input type="text" name="add_nombre_emergencia" id="add_nombre_emergencia" placeholder="NOMBRE" class="form-control" >
                            </th>
                            <th>
                                <label for="add_telefono_emergencia">TELEFONO DE EMERGENCIA</label>
                            </th>
                            <th>
                                <input type="number" name="add_telefono_emergencia" id="add_telefono_emergencia" placeholder="TELEFONO" class="form-control">      
                            </th>
                            <th>
                                <label for="add_direccion_emergencia">DIRECCION DE EMERGENCIA</label>                 
                            </th>
                            <th>
                                <input type="text" name="add_direccion_emergencia" id="add_direccion_emergencia" placeholder="Dirección" class="form-control">
                            </th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">DOCUMENTACION</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_inicio_dni">DNI INICIO</label>            
                            </th>
                            <th>
                                <input type="date" name="add_inicio_dni" id="add_inicio_dni" placeholder="INICIO DNI" class="form-control">
                            </th>
                            <th>
                                <label for="add_venc_dni">DNI FIN</label>            
                            </th>
                            <th>
                                <input type="date" name="add_venc_dni" id="add_venc_dni" placeholder="Fin DNI" class="form-control" >
                            </th>
                            
                        </tr>            
                        <tr>
                            <th>
                                <label for="add_num_contrato">NUM. CONTRATO</label>    
                            </th>
                            <th>
                                <input type="text" name="add_num_contrato" id="add_num_contrato" placeholder="Num Contrato" class="form-control" >
                            </th>
                            <th>
                                <label for="add_fecha_ingreso_contrato">FECHA INGRESO</label>            
                            </th>
                            <th>
                                <input type="date" name="add_fecha_ingreso_contrato" id="add_fecha_ingreso_contrato" placeholder="Fecha Ingreso" class="form-control" >
                            </th>
                            <th>
                                <label for="add_fecha_termino_contrato">FECHA TERMINO</label>            
                            </th>
                            <th>
                                <input type="date" name="add_fecha_termino_contrato" id="add_fecha_termino_contrato" placeholder="Fecha Termino" class="form-control" >
                            </th>
                            
                        </tr> 
                        <tr>
                            <th>
                                <label for="add_venc_contrato">VENC. CONTRATO</label>    
                            </th>
                            <th>
                                <input type="date" name="add_venc_contrato" id="add_venc_contrato" placeholder="Venc Contrato" class="form-control">
                            </th>
                        </tr>     
                        <tr>
                            <th>
                                <label for="add_licencia_mtc">INICIO LICENCIA MTC</label>            
                            </th>
                            <th>
                                <input type="date" name="add_licencia_mtc" id="add_licencia_mtc" placeholder="Fecha Ingreso" class="form-control" >
                            </th>
                            <th>
                                <label for="add_venc_licencia_mtc">FIN LICENCIA MTC</label>            
                            </th>
                            <th>
                                <input type="date" name="add_venc_licencia_mtc" id="add_venc_licencia_mtc" placeholder="Fecha Termino" class="form-control">
                            </th>
                            <th>
                                <label for="add_licencia_interna">INICIO LICENCIA AAQ</label>            
                            </th>
                            <th>
                                <input type="date" name="add_licencia_interna" id="add_licencia_interna" placeholder="Fecha Ingreso" class="form-control" >
                                <input type="hidden" name="add_venc_licencia_interna" id="add_venc_licencia_interna" value="">
                            </th>
                        </tr>
                        <tr>   
                            <th>
                                <label for="add_manejo_teorico">MANEJO TEORICO</label>            
                            </th>
                            <th>
                                <input type="date" name="add_manejo_teorico" id="add_manejo_teorico" placeholder="Examen Teorico" class="form-control" >
                                <input type="hidden" name="add_venc_manejo_teorico" id="add_venc_manejo_teorico" value="">
                            </th>  
                            <th>
                                <label for="add_manejo_practico">MANEJO PRACTICO</label>            
                            </th>
                            <th>
                                <input type="date" name="add_manejo_practico" id="add_manejo_practico" placeholder="Examen Teorico" class="form-control" >
                                <input type="hidden" name="add_venc_manejo_practico" id="add_venc_manejo_practico" value="">
                            </th>
                        </tr>        
                        <tr>   
                            <th>
                                <label for="add_examen_medico">EXAMEN MEDICO</label>            
                            </th>
                            <th>
                                <input type="date" name="add_examen_medico" id="add_examen_medico" placeholder="Examen Medico" class="form-control" >
                                <input type="hidden" name="add_venc_examen_medico" id="add_venc_examen_medico" value="">
                            </th>  
                            <th>
                                <label for="add_curso_induccion">CURSO INDUCCION</label>            
                            </th>
                            <th>
                                <input type="date" name="add_curso_induccion" id="add_curso_induccion" placeholder="Curso Induccion" class="form-control" >
                                <input type="hidden" name="add_venc_curso_induccion" id="add_venc_curso_induccion" value="">
                                
                            </th>
                            <th>
                                <label for="add_sctr">SCTR</label>            
                            </th>
                            <th>
                                <input type="date" name="add_sctr" id="add_sctr" placeholder="Curso Induccion" class="form-control" >
                                <input type="hidden" name="add_venc_sctr" id="add_venc_sctr" value="">
                            </th>
                        </tr>   
                        <tr>
                            <th>
                                <label for="add_vida_ley">VIDA LEY</label>            
                            </th>
                            <th>
                                <input type="date" name="add_vida_ley" id="add_vida_ley" placeholder="Vida Ley" class="form-control" >
                                <input type="hidden" name="add_venc_vida_ley" id="add_venc_vida_ley" value="">
                            </th>  
                        </tr>            
                    </table>


                    <input type="submit" name="add_personal" Value="Registrar" class="btn btn-primary">
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
                                <label for="update_pais">PAIS</label>
                            </th>
                            <th>
                                <input type="text" name="update_pais" id="update_pais" placeholder="Pais" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_ubigeo">UBIGEO</label>
                            </th>
                            <th>
                                <input type="text" name="update_ubigeo" id="update_ubigeo" placeholder="Ubigeo" class="form-control" required="required">      
                            </th>
                            <th>
                                <label for="update_mina_ciudad">MINA - CIUDAD</label>                 
                            </th>
                            <th>
                                <input type="text" name="update_mina_ciudad" id="update_mina_ciudad" placeholder="Mina - Ciudad" class="form-control" required="required">
                            </th>
                        </tr>
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
                        <th colspan="2"></th>
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
                        <th colspan="2"></th>
                            <th>
                                <label for="update_banco_cts">BANCO CTS</label>
                            </th>
                            <th>
                                <select name="update_banco_cts" id='update_banco_cts' required="required">  
                                    <option value="BCP"> BCP </option>  
                                    <option value="INTERBANK"> INTERBANK </option>  
                                    <option value="BBVA"> BBVA </option>
                                    <option value="SCOTIABANK"> SCOTIABANK </optioadd_inicio_finn>  
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
                    <h4 style="font-family:candara; color:#1338BE">DOCUMENTACION</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_inicio_dni">DNI INICIO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_inicio_dni" id="update_inicio_dni" placeholder="INICIO DNI" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_venc_dni">DNI FIN</label>            
                            </th>
                            <th>
                                <input type="date" name="update_venc_dni" id="update_venc_dni" placeholder="FIN DNI" class="form-control" required="required">
                            </th>
                            
                        </tr>            
                        <tr>
                            <th>
                                <label for="update_num_contrato">NUM. CONTRATO</label>    
                            </th>
                            <th>
                                <input type="text" name="update_num_contrato" id="update_num_contrato" placeholder="Num Contrato" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_fecha_ingreso_contrato">FECHA INGRESO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_fecha_ingreso_contrato" id="update_fecha_ingreso_contrato" placeholder="Fecha Ingreso" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_fecha_termino_contrato">FECHA TERMINO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_fecha_termino_contrato" id="update_fecha_termino_contrato" placeholder="Fecha Termino" class="form-control" required="required">
                            </th>
                            
                        </tr> 
                        <tr>
                            <th>
                                <label for="update_venc_contrato">VENC. CONTRATO</label>    
                            </th>
                            <th>
                                <input type="date" name="update_venc_contrato" id="update_venc_contrato" placeholder="Venc Contrato" class="form-control" required="required">
                            </th>
                        </tr>     
                        <tr>
                            <th>
                                <label for="update_licencia_mtc">INICIO LICENCIA MTC</label>            
                            </th>
                            <th>
                                <input type="date" name="update_licencia_mtc" id="update_licencia_mtc" placeholder="Fecha Ingreso" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_venc_licencia_mtc">FIN LICENCIA MTC</label>            
                            </th>
                            <th>
                                <input type="date" name="update_venc_licencia_mtc" id="update_venc_licencia_mtc" placeholder="Fecha Termino" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_licencia_interna">INICIO LICENCIA AAQ</label>  
                                <input type="hidden" name="update_venc_licencia_interna" id="update_venc_licencia_interna" value="">          
                            </th>
                            <th>
                                <input type="date" name="update_licencia_interna" id="update_licencia_interna" placeholder="Fecha Ingreso" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>   
                            <th>
                                <label for="update_manejo_teorico">MANEJO TEORICO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_manejo_teorico" id="update_manejo_teorico" placeholder="Examen Teorico" class="form-control" required="required">
                                <input type="hidden" name="update_venc_manejo_teorico" id="update_venc_manejo_teorico" value="">
                            </th>  
                            <th>
                                <label for="update_manejo_practico">MANEJO PRACTICO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_manejo_practico" id="update_manejo_practico" placeholder="Examen Teorico" class="form-control" required="required">
                                <input type="hidden" name="update_venc_manejo_practico" id="update_venc_manejo_practico" value="">    
                            </th>
                        </tr>        
                        <tr>   
                            <th>
                                <label for="update_examen_medico">EXAMEN MEDICO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_examen_medico" id="update_examen_medico" placeholder="Examen Medico" class="form-control" required="required">
                                <input type="hidden" name="update_venc_examen_medico" id="update_venc_examen_medico" value=""> 
                            </th>  
                            <th>
                                <label for="update_curso_induccion">CURSO INDUCCION</label>            
                            </th>
                            <th>
                                <input type="date" name="update_curso_induccion" id="update_curso_induccion" placeholder="Curso Induccion" class="form-control" required="required">
                                <input type="hidden" name="update_venc_curso_induccion" id="update_venc_curso_induccion" value="">
                                
                            </th>
                            <th>
                                <label for="update_sctr">SCTR</label>            
                            </th>
                            <th>
                                <input type="date" name="update_sctr" id="update_sctr" placeholder="Curso Induccion" class="form-control" required="required">
                                <input type="hidden" name="update_venc_sctr" id="update_venc_sctr" value="">
                                
                            </th>
                        </tr>   
                        <tr>
                            <th>
                                <label for="update_vida_ley">VIDA LEY</label>            
                            </th>
                            <th>
                                <input type="date" name="update_vida_ley" id="update_vida_ley" placeholder="Vida Ley" class="form-control" required="required">
                                <input type="hidden" name="update_venc_vida_ley" id="update_venc_vida_ley" value="">
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
                <form action="panel.php?modulo=personal" method="POST">
                    <input type="hidden" name="delete_id_personal" id="delete_id_personal" value="">
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