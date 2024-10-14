<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">LISTA DEL VEHÍCULOS</h1>
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
                        Agregar Nueva Vehiculo
                    </button>
                    <table id="example2" class="table table-bordered table-hover" style="text-align:center;">
                            <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                <th>Placa</th>
                                <th>Tipo Vehiculo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Color</th>
                                <th>Año Fabricacion</th>
                                <th>Propietario</th>
                                <th>Tipo de Servicio</th>
                                <th>Recepcionado por</th>
                                <th>Foto</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['placa'] ?></td>
                                        <td><?php echo $row['tipo_vehiculo'] ?></td>
                                        <td><?php echo $row['marca'] ?></td>
                                        <td><?php echo $row['modelo'] ?></td>
                                        <td><?php echo $row['color'] ?></td>
                                        <td><?php echo $row['ano_fabricacion'] ?></td>
                                        <td><?php echo $row['propietario'] ?></td>
                                        <td><?php echo $row['tipo_servicio'] ?></td>
                                        <td><?php echo $row['nombres'] ?></td>
                                        <?php
                                            if (file_exists("documentos/vehiculos/EQUIPAMIENTO".'_'.$row['placa'].'.jpg')) { ?>
                                                <td> <a <?="href=documentos/vehiculos/EQUIPAMIENTO".'_'.$row['placa'].'.jpg' ?> target="_blank" rel="noopener noreferrer"><img src="images/logo_visor.png" width="30"/></a></td>
                                        <?php
                                            }else{ ?>
                                                <th><span class="badge badge-danger">Sin Archivo</span></th>
                                        <?php } ?> 
                                        <td>
                                            <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_cod_vehiculo').value ='<?= $row['cod_vehiculo']?>';document.getElementById('update_placa').value ='<?= $row['placa']?>';document.getElementById('update_tipo_vehiculo').value ='<?= $row['tipo_vehiculo']?>';document.getElementById('update_cant_ejes').value ='<?= $row['cant_ejes']?>';document.getElementById('update_chasis').value ='<?= $row['chasis']?>';document.getElementById('update_vin').value ='<?= $row['vin']?>';document.getElementById('update_color').value ='<?= $row['color']?>';document.getElementById('update_marca').value ='<?= $row['marca']?>';document.getElementById('update_cant_pasajeros').value ='<?= $row['cant_pasajeros']?>';document.getElementById('update_tipo_neumatico').value ='<?= $row['tipo_neumatico']?>';document.getElementById('update_num_aro').value ='<?= $row['num_aro']?>';document.getElementById('update_combustible').value ='<?= $row['combustible']?>';document.getElementById('update_aire_acondicionado').value ='<?= $row['aire_acondicionado']?>';document.getElementById('update_tipo_aceite').value ='<?= $row['tipo_aceite']?>';document.getElementById('update_km_actual').value ='<?= $row['km_actual']?>';document.getElementById('update_modelo').value ='<?= $row['modelo']?>';document.getElementById('update_tipo_servicio').value ='<?= $row['tipo_servicio']?>';document.getElementById('update_ano_fabricacion').value ='<?= $row['ano_fabricacion']?>';document.getElementById('update_tiempo_trabajo').value ='<?= $row['tiempo_trabajo']?>';document.getElementById('update_recepcionado_por').value ='<?= $row['recepcionado_por']?>';document.getElementById('update_propietario').value ='<?= $row['propietario']?>';document.getElementById('update_telefono_prop').value ='<?= $row['telefono_prop']?>';document.getElementById('update_correo_prop').value ='<?= $row['correo_prop']?>';document.getElementById('update_soat').value ='<?= $row['soat']?>';document.getElementById('update_poliza').value ='<?= $row['poliza']?>';document.getElementById('update_poliza_mercancia').value ='<?= $row['poliza_mercancia']?>';document.getElementById('update_rev_tecnica').value ='<?= $row['rev_tecnica']?>';document.getElementById('update_venc_rev_tecnica').value ='<?= $row['venc_rev_tecnica']?>';document.getElementById('update_link_acceso_gps').value ='<?= $row['link_acceso_gps']?>';document.getElementById('update_empresa_gps').value ='<?= $row['empresa_gps']?>';document.getElementById('update_gps').value ='<?= $row['gps']?>';document.getElementById('update_tuc').value ='<?= $row['tuc']?>';document.getElementById('update_venc_tuc').value ='<?= $row['venc_tuc']?>';document.getElementById('update_gps_mtc').value ='<?= $row['gps_mtc']?>';document.getElementById('update_cert_matpel').value ='<?= $row['cert_matpel']?>';document.getElementById('update_venc_cert_matpel').value ='<?= $row['venc_cert_matpel']?>';document.getElementById('update_homo_vehicular').value ='<?= $row['homo_vehicular']?>';document.getElementById('update_fecha_implem_adas').value ='<?= $row['fecha_implem_adas']?>';document.getElementById('update_cert_operatividad').value ='<?= $row['cert_operatividad']?>';document.getElementById('update_extintor').value ='<?= $row['extintor']?>';document.getElementById('update_cod_radio_base').value ='<?= $row['cod_radio_base']?>';document.getElementById('update_cert_tacos').value ='<?= $row['cert_tacos']?>';document.getElementById('update_checklist').value ='<?= $row['checklist']?>';document.getElementById('update_rb_propietario').value ='<?= $row['rb_propietario']?>';document.getElementById('update_adas_propietario').value ='<?= $row['adas_propietario']?>';document.getElementById('update_equipamiento').value ='<?= $row['equipamiento']?>';" title="Editar Vehiculo" style="margin-right:5px;"><img src="images/actualizar_icono.png" width="30"/></a>
                                            <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_cod_vehiculo').value ='<?= $row['cod_vehiculo'] ?>';document.getElementById('delete_placa').value ='<?= $row['placa'] ?>';" title="Eliminar Vehiculo" class="text-danger"><img src="images/eliminar_icono.png" width="30"/></a>
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
                <h4 class="modal-title" id="defaultModalLabel">AGREGAR NUEVO VEHICULO</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=vehiculos" id="ingresar" method="POST" enctype="multipart/form-data">
                    <h4 style="font-family:candara; color:#1338BE">DATOS VEHICULARES</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_placa">PLACA</label>
                            </th>
                            <th>
                                <input type="text" name="add_placa" id="add_placa" placeholder="Placa" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="add_tipo_vehiculo">TIPO DE VEHICULO</label>
                            </th>
                            <th>
                                <select name="add_tipo_vehiculo" id='add_tipo_vehiculo' required="required">  
                                    <option value="MINIVAN">MINIVAN</option>  
                                    <option value="BUS">BUS</option>  
                                    <option value="MINIBUS">MINIBUS</option>
                                    <option value="FURGON">FURGON</option>
                                    <option value="CAMIONETA">CAMIONETA</option>
                                    <option value="CAMIONETA CERRADA">CAMIONETA CERRADA</option>
                                    <option value="SPRINTER">SPRINTER</option> 
                                    <option value="COUSTER">COUSTER</option> 
                                    <option value="TRAILER">TRAILER</option> 
                                    <option value="SEMI TRAILER">SEMI TRAILER</option> 
                                    <option value="CAMA BAJA">CAMA BAJA</option> 
                                    <option value="CISTERNA">CISTERNA</option> 
                                    <option value="GRUA">GRUA</option> 
                                    <option value="LINEA AMARILLA">LINEA AMARILLA</option>   
                                    <option value="PLATAFORMA">PLATAFORMA</option> 
                                    <option value="CAMION BARANDA">CAMION BARANDA</option> 
                                    <option value="VOLQUETE">VOLQUETE</option> 
                                    <option value="MIXER">MIXER</option> 
                                </select>   
                            </th>
                            <th>
                                <label for="add_cant_ejes">CANTIDAD DE EJES</label>                 
                            </th>
                            <th>
                                <input type="number" name="add_cant_ejes" id="add_cant_ejes" placeholder="Cantidad Ejes" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>  
                            <th>
                                <label for="add_chasis">CHASIS</label>  
                            </th>
                            <th>
                                <input type="text" name="add_chasis" id="add_chasis" placeholder="Chasis" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="add_vin">VIN</label>  
                            </th>
                            <th>
                                <input type="text" name="add_vin" id="add_vin" placeholder="VIN" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="add_color">COLOR</label>  
                            </th>
                            <th>
                                <input type="text" name="add_color" id="add_color" placeholder="Color" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_marca">MARCA</label>
                            </th>
                            <th>
                                <input type="text" name="add_marca" id="add_marca" placeholder="Marca" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="add_cant_pasajeros">CANTIDAD PASAJEROS</label>
                            </th>
                            <th>
                                <input type="number" name="add_cant_pasajeros" id="add_cant_pasajeros" placeholder="Cant Pasajeros" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="add_tipo_neumatico">TIPO NEUMATICO</label>
                            </th>
                            <th>
                                <select name="add_tipo_neumatico" id='add_tipo_neumatico' required="required">  
                                    <option value="AT">AT</option>  
                                    <option value="MT">MT</option>  
                                </select>   
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_num_aro">NUMERO ARO</label>
                            </th>
                            <th>
                                <input type="number" name="add_num_aro" id="add_num_aro" placeholder="Numero Aro" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="add_combustible">COMBUSTIBLE</label>
                            </th>
                            <th>
                                <select name="add_combustible" id='add_combustible' required="required">  
                                    <option value="GASOLINA">GASOLINA</option>  
                                    <option value="DISEL">DISEL</option>  
                                </select>   
                            </th>
                            <th>
                                <label for="add_aire_acondicionado">AIRE ACONDICIONADO</label>
                            </th>
                            <th>
                                <select name="add_aire_acondicionado" id='add_aire_acondicionado' required="required">  
                                    <option value="SI">SI</option>  
                                    <option value="NO">NO</option>  
                                </select>   
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_tipo_aceite">TIPO ACEITE</label>
                            </th>
                            <th>
                                <input type="text" name="add_tipo_aceite" id="add_tipo_aceite" placeholder="Tipo Aceite" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="add_km_actual">KM ACTUAL</label>
                            </th>
                            <th>
                                <input type="number" name="add_km_actual" id="add_km_actual" placeholder="KM Actual" class="form-control" required="required">   
                            </th>
                            <th>
                                <label for="add_modelo">MODELO</label>
                            </th>
                            <th>
                                <input type="text" name="add_modelo" id="add_modelo" placeholder="Modelo" class="form-control" required="required">    
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_tipo_servicio">TIPO_SERVICIO</label>
                            </th>
                            <th>
                                <select name="add_tipo_servicio" id='add_tipo_servicio' required="required">  
                                    <option value="SERVICIO1">SERVICIO1</option>  
                                    <option value="SERVICIO2">SERVICIO2</option>  
                                </select>   
                            </th>
                            <th>
                                <label for="add_ano_fabricacion">AÑO FABRICACION</label>
                            </th>
                            <th>
                                <input type="number" name="add_ano_fabricacion" id="add_ano_fabricacion" placeholder="Año Fabricacion" class="form-control" required="required">   
                            </th>
                            <th>
                                <label for="add_tiempo_trabajo">TIEMPO DE TRABAJO</label>
                            </th>
                            <th>
                                <input type="number" name="add_tiempo_trabajo" id="add_tiempo_trabajo" placeholder="Tiempo de Trabajo" class="form-control" required="required">    
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_recepcionado_por">RECEPCIONADO POR</label>
                            </th>
                            <th>
                            <select style="width:150px;border:3px solid #04467E" name="add_recepcionado_por" id='add_recepcionado_por' required="required">  
                            <?php
                                while ($row = mysqli_fetch_assoc($res1)) :
                                ?>
                                    <option value=<?php echo $row['dni'];?>><?php echo $row['nombres'];?> </option>  
                                <?php endwhile; ?>
                            </select> 
                            </th>
                            <th>
                                <label for="add_propietario">PROPIETARIO</label>
                            </th>
                            <th>
                                <input type="text" name="add_propietario" id="add_propietario" placeholder="Propietario" class="form-control" required="required">   
                            </th>
                            <th>
                                <label for="add_telefono_prop">TELEFONO PROPIETARIO</label>
                            </th>
                            <th>
                                <input type="number" name="add_telefono_prop" id="add_telefono_prop" placeholder="Telefono Propietariop" class="form-control" required="required">    
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_correo_prop">CORREO PROPIETARIO</label>
                            </th>
                            <th>
                                <input type="text" name="add_correo_prop" id="add_correo_prop" placeholder="Correo Propietario" class="form-control">    
                            </th>
                            <th>
                                
                            </th>
                            <th>
                                  
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">DOCUMENTOS DEL VEHICULO</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_soat">SOAT</label>
                                <input type="file" name="add_documento_soat" id="add_documento_soat">
                            </th>
                            <th>
                                <input type="date" name="add_soat" id="add_soat" placeholder="NOMBRE ESPOSO(A)" class="form-control" >
                                
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_cod_radio_base">COD. RADIOBASE</label>    
                            </th>
                            <th>
                                <input type="text" name="add_cod_radio_base" id="add_cod_radio_base" placeholder="Cod RadioBase" class="form-control">
                            </th>
                            <th>
                                <label for="add_rb_propietario">RD PROPIETARIO</label>    
                            </th>
                            <th>
                                <select name="add_rb_propietario" id='add_rb_propietario' required="required">  
                                    <option value="PROPIO">PROPIO </option>  
                                    <option value="PROVEEDOR">PROVEEDOR</option>  
                                </select> 
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="add_poliza">POLIZA</label>
                                <input type="file" name="add_documento_poliza" id="add_documento_poliza">
                            </th>
                            <th>
                                <input type="date" name="add_poliza" id="add_poliza" placeholder="Poliza" class="form-control">
                            </th>
                            <th>
                                <label for="add_poliza_mercancia">POLIZA MERCANCIA</label>
                                <input type="file" name="add_documento_polizamercancia" id="add_documento_polizamercancia">
                            </th>
                            <th>
                                <input type="date" name="add_poliza_mercancia" id="add_poliza_mercancia" placeholder="DNI ESPOSO(A)" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_rev_tecnica">REVISION TECNICA INICIO</label>
                                <input type="file" name="add_documento_revisiontecnica" id="add_documento_revisiontecnica">
                            </th>
                            <th>
                                <input type="date" name="add_rev_tecnica" id="add_rev_tecnica" placeholder="Revision Tecnica" class="form-control">
                            </th>
                            <th>
                                <label for="add_venc_rev_tecnica">REVISION TECNICA FIN</label>  
                            </th>
                            <th>
                                <input type="date" name="add_venc_rev_tecnica" id="add_venc_rev_tecnica" placeholder="Revision Tecnica" class="form-control" >
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="add_empresa_gps">EMPRESA GPS</label>
                            </th>
                            <th>
                                <select name="add_empresa_gps" id='add_empresa_gps' >  
                                    <option value="EMPRESA1"> EMPRESA1 </option>  
                                    <option value="EMPRESA2"> EMPRESA2 </option>  
                                    <option value="EMPRESA3"> EMPRESA3 </option>
                                    <option value="EMPRESA4"> EMPRESA4 </option>
                                </select> 
                            </th>
                            <th>
                                <label for="add_link_acceso_gps">ACCESO GPS</label>    
                            </th>
                            <th>
                                <input type="text" name="add_link_acceso_gps" id="add_link_acceso_gps" placeholder="Link Acceso GPS" class="form-control" >
                            </th>  
                        </tr>
                        <tr>    
                            <th>
                                <label for="add_gps">GPS</label> 
                                <input type="file" name="add_documento_gps" id="add_documento_gps"> 
                            </th>
                            <th>
                                <input type="date" name="add_gps" id="add_gps" placeholder="Fecha Instalacion GPS" class="form-control" >
                            </th>
                            <th>
                                <label for="add_gps_mtc">GPS MTC</label>  
                                <input type="file" name="add_documento_gpsmtc" id="add_documento_gpsmtc">  
                            </th>
                            <th>
                                <select name="add_gps_mtc" id='add_gps_mtc' >  
                                    <option value="SI">SI</option>  
                                    <option value="NO">NO</option>  
                                </select> 
                            </th>

                        </tr>
                        <tr>
                            <th>
                                <label for="add_tuc">TUC INICIO</label>  
                                <input type="file" name="add_documento_tuc" id="add_documento_tuc">  
                            </th>
                            <th>
                                <input type="date" name="add_tuc" id="add_tuc" placeholder="TUC" class="form-control" >
                            </th>
                            <th>
                                <label for="add_venc_tuc">TUC FIN</label>    
                            </th>
                            <th>
                                <input type="date" name="add_venc_tuc" id="add_tuc" placeholder="Vencimiento TUC" class="form-control" >
                            </th>
                        </tr>
                            <th>
                                <label for="add_cert_matpel">CERT. MATPEL INICIO</label>  
                                <input type="file" name="add_documento_certmatpel" id="add_documento_certmatpel">  
                            </th>
                            <th>
                                <input type="date" name="add_cert_matpel" id="addadd_cert_matpel_tuc" placeholder="Cert. MATPEL Inicio" class="form-control" >
                            </th>
                            <th>
                                <label for="add_venc_cert_matpel">CERT. MATPEL FIN</label>    
                            </th>
                            <th>
                                <input type="date" name="add_venc_cert_matpel" id="add_venc_cert_matpel" class="form-control" >
                            </th>
                        </tr>
                        <tr> 
                            <th>
                                <label for="add_homo_vehicular">HOMOLOGACION VEHICULAR</label>   
                                <input type="file" name="add_documento_homovehicular" id="add_documento_homovehicular"> 
                            </th>
                            <th>
                                <input type="date" name="add_homo_vehicular" id="add_homo_vehicular"  class="form-control" >
                            </th>
                            <th>
                                <label for="add_fecha_implem_adas">IMPLEM. SISTEMA ADAS</label>   
                                <input type="file" name="add_documento_impleadas" id="add_documento_impleadas"> 
                            </th>
                            <th>
                                <input type="date" name="add_fecha_implem_adas" id="add_fecha_implem_adas" class="form-control" >
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_adas_propietario">ADAS PROPIETARIO</label>    
                            </th>
                            <th>
                                <select name="add_adas_propietario" id='add_adas_propietario'>  
                                    <option value="PROPIO">PROPIO </option>  
                                    <option value="CLIENTE"> CLIENTE </option>
                                    <option value="CLIENTE"> PROVEEDOR </option> 
                                </select> 
                            </th>
                            <th>
                                <label for="add_equipamiento">EQUIPAMIENTO</label>
                                <input type="file" name="add_foto_equipamiento" id="add_foto_equipamiento">    
                            </th>
                            <th>
                                <select name="add_equipamiento" id='add_equipamiento'>  
                                    <option value="PENDIENTE">PENDIENTE </option>  
                                    <option value="CONFORME">CONFORME </option>
                                </select> 
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_cert_operatividad">CERT. OPERATIVIDAD</label> 
                                <input type="file" name="add_documento_certoperatividad" id="add_documento_certoperatividad">   
                            </th>
                            <th>
                                <input type="date" name="add_cert_operatividad" id="add_cert_operatividad" class="form-control">
                            </th>
                            <th>
                                <label for="add_extintor">EXTINTOR</label> 
                                <input type="file" name="add_documento_extintor" id="add_documento_extintor">   
                            </th>
                            <th>
                                <input type="date" name="add_extintor" id="add_extintor"  class="form-control" >
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_cert_tacos">CERT. TACOS</label> 
                                <input type="file" name="add_documento_certtacos" id="add_documento_certtacos">   
                            </th>
                            <th>
                                <input type="date" name="add_cert_tacos" id="add_cert_tacos" class="form-control">
                            </th>
                            <th>
                                <label for="add_checklist">CHECKLIST</label>  
                                <input type="file" name="add_documento_checklist" id="add_documento_checklist"> 
                            </th>
                            <th>
                                <input type="date" name="add_checklist" id="add_checklist" class="form-control">
                            </th>
                        </tr>
                    </table>
                    <input type="submit" name="add_vehiculo" Value="Registrar" class="btn btn-primary">
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
                <h4 class="modal-title" id="defaultModalLabel">EDITAR VEHICULO</h4>
            </div>
            <div class="modal-body">
            <form action="panel.php?modulo=vehiculos" id="ingresar" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update_cod_vehiculo" id="update_cod_vehiculo" value="">
                    <h4 style="font-family:candara; color:#1338BE">DATOS DEL VEHICULO</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_placa">PLACA</label>
                            </th>
                            <th>
                                <input type="text" name="update_placa" id="update_placa" placeholder="Placa" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_tipo_vehiculo">TIPO DE VEHICULO</label>
                            </th>
                            <th>
                                <select name="update_tipo_vehiculo" id='update_tipo_vehiculo' required="required">  
                                    <option value="MINIVAN">MINIVAN</option>  
                                    <option value="BUS">BUS</option>  
                                    <option value="MINIBUS">MINIBUS</option>
                                    <option value="FURGON">FURGON</option>
                                    <option value="CAMIONETA">CAMIONETA</option>
                                    <option value="CAMIONETA CERRADA">CAMIONETA CERRADA</option>
                                    <option value="SPRINTER">SPRINTER</option> 
                                    <option value="COUSTER">COUSTER</option> 
                                    <option value="TRAILER">TRAILER</option> 
                                    <option value="SEMI TRAILER">SEMI TRAILER</option> 
                                    <option value="CAMA BAJA">CAMA BAJA</option> 
                                    <option value="CISTERNA">CISTERNA</option> 
                                    <option value="GRUA">GRUA</option> 
                                    <option value="LINEA AMARILLA">LINEA AMARILLA</option>   
                                    <option value="PLATAFORMA">PLATAFORMA</option> 
                                    <option value="CAMION BARANDA">CAMION BARANDA</option> 
                                    <option value="VOLQUETE">VOLQUETE</option> 
                                    <option value="MIXER">MIXER</option> 
                                </select>   
                            </th>
                            <th>
                                <label for="update_cant_ejes">CANTIDAD DE EJES</label>                 
                            </th>
                            <th>
                                <input type="text" name="update_cant_ejes" id="update_cant_ejes" placeholder="Cantidad Ejes" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>  
                            <th>
                                <label for="update_chasis">CHASIS</label>  
                            </th>
                            <th>
                                <input type="text" name="update_chasis" id="update_chasis" placeholder="Chasis" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_vin">VIN</label>  
                            </th>
                            <th>
                                <input type="text" name="update_vin" id="update_vin" placeholder="VIN" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_color">COLOR</label>  
                            </th>
                            <th>
                                <input type="text" name="update_color" id="update_color" placeholder="Color" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_marca">MARCA</label>
                            </th>
                            <th>
                                <input type="text" name="update_marca" id="update_marca" placeholder="Marca" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_cant_pasajeros">CANTIDAD PASAJEROS</label>
                            </th>
                            <th>
                                <input type="number" name="update_cant_pasajeros" id="update_cant_pasajeros" placeholder="Cant Pasajeros" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_tipo_neumatico">TIPO NEUMATICO</label>
                            </th>
                            <th>
                                <select name="update_tipo_neumatico" id='update_tipo_neumatico' required="required">  
                                    <option value="AT">AT</option>  
                                    <option value="MT">MT</option>  
                                </select>   
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_num_aro">NUMERO ARO</label>
                            </th>
                            <th>
                                <input type="number" name="update_num_aro" id="update_num_aro" placeholder="Numero Aro" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_combustible">COMBUSTIBLE</label>
                            </th>
                            <th>
                                <select name="update_combustible" id='update_combustible' required="required">  
                                    <option value="GASOLINA">GASOLINA</option>  
                                    <option value="DISEL">DISEL</option>  
                                </select>   
                            </th>
                            <th>
                                <label for="update_aire_acondicionado">AIRE ACONDICIONADO</label>
                            </th>
                            <th>
                                <select name="update_aire_acondicionado" id='update_aire_acondicionado' required="required">  
                                    <option value="SI">SI</option>  
                                    <option value="NO">NO</option>  
                                </select>   
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_tipo_aceite">TIPO ACEITE</label>
                            </th>
                            <th>
                                <input type="text" name="update_tipo_aceite" id="update_tipo_aceite" placeholder="Tipo Aceite" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_km_actual">KM ACTUAL</label>
                            </th>
                            <th>
                                <input type="number" name="update_km_actual" id="update_km_actual" placeholder="KM Actual" class="form-control" required="required">   
                            </th>
                            <th>
                                <label for="update_modelo">MODELO</label>
                            </th>
                            <th>
                                <input type="text" name="update_modelo" id="update_modelo" placeholder="Modelo" class="form-control" required="required">    
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_tipo_servicio">TIPO_SERVICIO</label>
                            </th>
                            <th>
                                <select name="update_tipo_servicio" id='update_tipo_servicio' required="required">  
                                    <option value="SERVICIO1">SERVICIO1</option>  
                                    <option value="SERVICIO2">SERVICIO2</option>  
                                </select>   
                            </th>
                            <th>
                                <label for="update_ano_fabricacion">AÑO FABRICACION</label>
                            </th>
                            <th>
                                <input type="number" name="update_ano_fabricacion" id="update_ano_fabricacion" placeholder="Año Fabricacion" class="form-control" required="required">   
                            </th>
                            <th>
                                <label for="update_tiempo_trabajo">TIEMPO DE TRABAJO (AÑOS)</label>
                            </th>
                            <th>
                                <input type="number" name="update_tiempo_trabajo" id="update_tiempo_trabajo" placeholder="Tiempo de Trabajo" class="form-control" required="required"> 
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_recepcionado_por">RECEPCIONADO POR</label>
                            </th>
                            <th>
                                <select style="width:150px;border:3px solid #04467E" name="update_recepcionado_por" id='update_recepcionado_por' required="required">  
                                <?php
                                    while ($row = mysqli_fetch_assoc($res2)) :
                                    ?>
                                        <option value=<?php echo $row['dni'];?>><?php echo $row['nombres'];?> </option>  
                                    <?php endwhile; ?>
                                </select>   
                            </th>
                            <th>
                                <label for="update_propietario">PROPIETARIO</label>
                            </th>
                            <th>
                                <input type="text" name="update_propietario" id="update_propietario" placeholder="Propietario" class="form-control" required="required">   
                            </th>
                            <th>
                                <label for="update_telefono_prop">TELEFONO PROPIETARIO</label>
                            </th>
                            <th>
                                <input type="text" name="update_telefono_prop" id="update_telefono_prop" placeholder="Telefono Propietariop" class="form-control" required="required">    
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_correo_prop">CORREO PROPIETARIO</label>
                            </th>
                            <th>
                                <input type="text" name="update_correo_prop" id="update_correo_prop" placeholder="Correo Propietario" class="form-control" >    
                            </th>
                            <th>
                                
                            </th>
                            <th>
                                  
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>
                    <h4 style="font-family:candara; color:#1338BE">DOCUMENTOS DEL VEHICULO</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_soat">SOAT</label><br>
                                <input type="file" name="update_documento_soat" id="update_documento_soat">
                            </th>
                            <th>
                                <input type="date" name="update_soat" id="update_soat" placeholder="SOAT" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_cod_radio_base">COD. RADIOBASE</label><br>    
                            </th>
                            <th>
                                <input type="text" name="update_cod_radio_base" id="update_cod_radio_base" placeholder="Cod RadioBase" class="form-control">
                            </th>
                            <th>
                                <label for="update_rb_propietario">RD PROPIETARIO</label><br>  
                            </th>
                            <th>
                                <select name="update_rb_propietario" id='update_rb_propietario'>  
                                    <option value="PROPIO">PROPIO </option>  
                                    <option value="PROVEEDOR">PROVEEDOR</option>  
                                </select> 
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_poliza">POLIZA</label><br>
                                <input type="file" name="update_documento_poliza" id="update_documento_poliza">
                            </th>
                            <th>
                                <input type="date" name="update_poliza" id="update_poliza" placeholder="Poliza" class="form-control">
                            </th>
                            <th>
                                <label for="update_poliza_mercancia">POLIZA MERCANCIA</label><br>
                                <input type="file" name="update_documento_polizamercancia" id="update_documento_polizamercancia">
                            </th>
                            <th>
                                <input type="date" name="update_poliza_mercancia" id="update_poliza_mercancia" placeholder="DNI ESPOSO(A)" class="form-control">
                                
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_rev_tecnica">REVISION TECNICA INICIO</label><br>
                                <input type="file" name="update_documento_revisiontecnica" id="update_documento_revisiontecnica">
                            </th>
                            <th>
                                <input type="date" name="update_rev_tecnica" id="update_rev_tecnica" placeholder="Revision Tecnica" class="form-control">
                            </th>
                            <th>
                                <label for="update_venc_rev_tecnica">REVISION TECNICA FIN</label><br>
                            </th>
                            <th>
                                <input type="date" name="update_venc_rev_tecnica" id="update_venc_rev_tecnica" placeholder="Revision Tecnica" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_empresa_gps">EMPRESA GPS</label>
                            </th>
                            <th>
                                <select name="update_empresa_gps" id='update_empresa_gps'>  
                                    <option value="EMPRESA1"> EMPRESA1 </option>  
                                    <option value="EMPRESA2"> EMPRESA2 </option>  
                                    <option value="EMPRESA3"> EMPRESA3 </option>
                                    <option value="EMPRESA4"> EMPRESA4 </option>
                                </select> 
                            </th>
                            <th>
                                <label for="update_link_acceso_gps">ACCESO GPS</label>    
                            </th>
                            <th>
                                <input type="text" name="update_link_acceso_gps" id="update_link_acceso_gps" placeholder="Link Acceso GPS" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_gps">GPS</label><br>
                                <input type="file" name="update_documento_gps" id="update_documento_gps">
                            </th>
                            <th>
                                <input type="date" name="update_gps" id="update_gps" placeholder="Fecha Instalacion GPS" class="form-control">
                            </th>
                            <th>
                                <label for="update_gps_mtc">GPS MTC</label><br> 
                                <input type="file" name="update_documento_gpsmtc" id="update_documento_gpsmtc">   
                            </th>
                            <th>
                                <select name="update_gps_mtc" id='update_gps_mtc' >  
                                    <option value="SI">SI</option>  
                                    <option value="NO">NO</option>  
                                </select> 
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_tuc">TUC INICIO</label><br>
                                <input type="file" name="update_documento_tuc" id="update_documento_tuc">    
                            </th>
                            <th>
                                <input type="date" name="update_tuc" id="update_tuc" placeholder="TUC" class="form-control">
                            </th>
                            <th>
                                <label for="update_venc_tuc">TUC FIN</label>    
                            </th>
                            <th>
                                <input type="date" name="update_venc_tuc" id="update_venc_tuc" placeholder="Vencimiento TUC" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_cert_matpel">CERT. MATPEL INICIO</label><br>  
                                <input type="file" name="update_documento_certmatpel" id="update_documento_certmatpel">  
                            </th>
                            <th>
                                <input type="date" name="update_cert_matpel" id="update_cert_matpel" placeholder="Cert. MATPEL Inicio" class="form-control">
                            </th>
                            <th>
                                <label for="update_venc_cert_matpel">CERT. MATPEL FIN</label>    
                            </th>
                            <th>
                                <input type="date" name="update_venc_cert_matpel" id="update_venc_cert_matpel" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_homo_vehicular">HOMOLOGACION VEHICULAR</label><br>
                                <input type="file" name="update_documento_homovehicular" id="update_documento_homovehicular">   
                            </th>
                            <th>
                                <input type="date" name="update_homo_vehicular" id="update_homo_vehicular"  class="form-control">
                            </th>
                            <th>
                                <label for="update_fecha_implem_adas">IMPLEM. SISTEMA ADAS</label><br>  
                                <input type="file" name="update_documento_impleadas" id="update_documento_impleadas">  
                            </th>
                            <th>
                                <input type="date" name="update_fecha_implem_adas" id="update_fecha_implem_adas" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_adas_propietario">ADAS PROPIETARIO</label>    
                            </th>
                            <th>
                                <select name="update_adas_propietario" id='update_adas_propietario'>  
                                    <option value="PROPIO">PROPIO </option>  
                                    <option value="CLIENTE"> CLIENTE </option>
                                    <option value="CLIENTE"> PROVEEDOR </option> 
                                </select> 
                            </th>
                            <th>
                                <label for="update_equipamiento">EQUIPAMENTO</label><br>
                                <input type="file" name="update_foto_equipamiento" id="update_foto_equipamiento">    
                            </th>
                            <th>
                                <select name="update_equipamiento" id='update_equipamiento'>  
                                    <option value="PENDIENTE">PENDIENTE </option>  
                                    <option value="CONFORME">CONFORME </option>
                                </select> 
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_cert_operatividad">CERT. OPERATIVIDAD</label><br>  
                                <input type="file" name="update_documento_certoperatividad" id="update_documento_certoperatividad">    
                            </th>
                            <th>
                                <input type="date" name="update_cert_operatividad" id="update_cert_operatividad" class="form-control">
                            </th>
                            <th>
                                <label for="update_extintor">EXTINTOR</label><br> 
                                <input type="file" name="update_documento_extintor" id="update_documento_extintor">     
                            </th>
                            <th>
                                <input type="date" name="update_extintor" id="update_extintor"  class="form-control">
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="update_cert_tacos">CERT. TACOS</label><br>  
                                <input type="file" name="update_documento_certtacos" id="update_documento_certtacos">    
                            </th>
                            <th>
                                <input type="date" name="update_cert_tacos" id="update_cert_tacos" class="form-control">
                            </th>
                            <th>
                                <label for="update_checklist">CHECKLIST</label><br>   
                                <input type="file" name="update_documento_checklist" id="update_documento_checklist">  
                            </th>
                            <th>
                                <input type="date" name="update_checklist" id="update_checklist" class="form-control">
                            </th>
                        </tr>
                    </table>
                    <input type="submit" name="update_vehiculo" id="update_vehiculo" Value="Actualizar" class="btn btn-primary">
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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Vehiculo</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=vehiculos" method="POST" >
                    <input type="hidden" name="delete_cod_vehiculo" id="delete_cod_vehiculo" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Vehiculo?</label>
                        <input type="text" name="delete_placa" id="delete_placa" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_vehiculo" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>