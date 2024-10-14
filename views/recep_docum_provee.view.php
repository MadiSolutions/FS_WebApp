<?php  
	error_reporting(E_ALL);
ini_set('display_errors', '1');
    $list=$_GET["list"]; 
    $tipo_user=$_SESSION['tipo_user'];
    $user=$_SESSION['usuario'];
    if($tipo_user=='PROVEEDOR'){
        $data_proveedor = "SELECT * from proveedores where estado=1 and ruc='$user' LIMIT 1";
        $result = mysqli_query($con, $data_proveedor);
        $ruc='';$razon_social='';
        while ($row = mysqli_fetch_assoc($result)) :
        $ruc=$row['ruc'];
        $razon_social=$row['razon_social'];
        $id_proveedor=$row['cod_proveedor'];
    endwhile;
    }
    else{
        $id_proveedor='0';
        $ruc='0';
        $razon_social='-';
    }
    
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 style="font-family:candara; color:#1338BE">Comprobantes Proveedores</h1>
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
                    <?php
                        if($tipo_user=='PROVEEDOR') { ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Agregar Nuevo Documento</button>
                    <?php } ?>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover" style="text-align:center;">
                            <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th>ID</th>
                                    <th>Estado</th>
                                    <th>Motivo</th>
                                    <th>RUC</th>
                                    <th>Razon Social</th>
                                    <th>Tipo Documento</th>
                                    <th>Num Documento</th>
                                    <th>Fecha Emitido</th>
                                    <th>Fecha Subida</th>
                                    <th>Importe Documento</th>
                                    <th>Importe Retencion</th>
                                    <th>Importe Pagar</th>
                                    <th>Fecha Pago</th>
                                    <th>Estado Pago</th>
                                    <th>Num Operacion</th>
                                    <th>Constancia Detraccion</th>
                                    <th>Num Retencion</th>
                                    <th>PDF</th>
                                    <th>XML</th>
                                    <th>Valorizacion</th>
                                    <th>Contrato</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['id_compro_proveedores'] ?></td>
                                        <?php 
                                        if ($row['estado_aprobacion']=='APROBADO') { ?>
                                            <th ><span class="badge badge-success"><?php echo $row['estado_aprobacion'] ?></span></th>
                                        <?php } else if ($row['estado_aprobacion']=='ENVIADO A REVISION'){ ?>
                                            <th><span class="badge badge-warning"><?php echo $row['estado_aprobacion'] ?></span></th>
                                        <?php } else if ($row['estado_aprobacion']=='RECHAZADO'){?>
                                            <th><span class="badge badge-danger"><?php echo $row['estado_aprobacion'] ?></span></th>
                                        <?php } ?>
                                        <td><?php echo $row['motivo'] ?></td>
                                        <td><?php echo $row['ruc'] ?></td>
                                        <td><?php echo $row['razon_social'] ?></td>
                                        <td><?php echo $row['tipo_documento'] ?></td>
                                        <td><?php echo $row['serie'].'-'.$row['num_documento'] ?></td>
                                        <td><?php echo $row['fecha_emitida'] ?></td>
                                        <td><?php echo $row['fecha'] ?></td>
                                        <td><?php echo $row['importe_documento'] ?></td>
                                        <td><?php echo $row['importe_retencion'] ?></td>
                                        <td><?php echo $row['importe_pagar'] ?></td>
                                        <td><?php echo $row['fecha_pago'] ?></td>
                                        <?php 
                                        if ($row['estado_pago']=='PAGADO') { ?>
                                            <th><span class="badge badge-success"><?php echo $row['estado_pago'] ?></span></th>
                                        <?php } else if ($row['estado_pago']=='PENDIENTE'){ ?>
                                            <th><span class="badge badge-warning"><?php echo $row['estado_pago'] ?></span></th>
                                        <?php } ?>
                                        <td><?php echo $row['num_operacion'] ?></td>
                                        <td><?php echo $row['constancia_detraccion'] ?></td>
                                        <td><?php echo $row['num_retencion'] ?></td>
                                        <?php
                                            if (file_exists("documentos/proveedores/FACTURA_".$row['id_proveedor'].'_'.$row['fecha_emitida'].'_'.$row['serie'].'-'.$row['num_documento'].'.pdf')) { ?>
                                                <td> <a <?="href=documentos/proveedores/FACTURA_".$row['id_proveedor'].'_'.$row['fecha_emitida'].'_'.$row['serie'].'-'.$row['num_documento'].'.pdf' ?> download target="_blank"><img src="images/icono_pdf.png" width="50"/></a></td>
                                        <?php
                                            }else{ ?>
                                                <th><span class="badge badge-danger">Sin Archivo</span></th>
                                        <?php } ?> 
                                        <?php
                                            if (file_exists("documentos/proveedores/XML_".$row['id_proveedor'].'_'.$row['fecha_emitida'].'_'.$row['serie'].'-'.$row['num_documento'].'.xml')) { ?>
                                                <td> <a <?="href=documentos/proveedores/XML_".$row['id_proveedor'].'_'.$row['fecha_emitida'].'_'.$row['serie'].'-'.$row['num_documento'].'.xml' ?> download target="_blank"><img src="images/icono_xml.png" width="50"/></a></td>   
                                        <?php
                                            }else{ ?>
                                                <th><span class="badge badge-danger">Sin Archivo</span></th>
                                        <?php } ?> 
                                        <?php
                                            if (file_exists("documentos/proveedores/VALORIZACION_".$row['id_proveedor'].'_'.$row['fecha_emitida'].'_'.$row['serie'].'-'.$row['num_documento'].'.pdf')) { ?>
                                                <td> <a <?="href=documentos/proveedores/VALORIZACION_".$row['id_proveedor'].'_'.$row['fecha_emitida'].'_'.$row['serie'].'-'.$row['num_documento'].'.pdf' ?> download target="_blank"><img src="images/icono_pdf.png" width="50"/></a></td>
                                        <?php
                                            }else{ ?>
                                                <th><span class="badge badge-danger">Sin Archivo</span></th>
                                        <?php } ?> 
                                        <?php
                                            if (file_exists("documentos/proveedores/CONTRATO_".$row['id_proveedor'].'_'.$row['fecha_emitida'].'_'.$row['serie'].'-'.$row['num_documento'].'.pdf')) { ?>
                                                <td> <a <?="href=documentos/proveedores/CONTRATO_".$row['id_proveedor'].$row['fecha_emitida'].'_'.'_'.$row['serie'].'-'.$row['num_documento'].'.pdf' ?> download target="_blank"><img src="images/icono_pdf.png" width="50"/></a></td>
                                        <?php
                                            }else{ ?>
                                                <th><span class="badge badge-danger">Sin Archivo</span></th>
                                        <?php } ?> 
                                        <td>
                                                    <?php if($row['estado_aprobacion']=="ENVIADO A REVISION" || $tipo_user!='PROVEEDOR'){ ?>
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id_compro_proveedores').value = '<?= $row['id_compro_proveedores'] ?>';document.getElementById('update_id_proveedor').value = '<?= $row['id_proveedor'] ?>';document.getElementById('update_fecha_emitida').value = '<?= $row['fecha_emitida'] ?>';document.getElementById('update_tipo_documento').value = '<?= $row['tipo_documento'] ?>';document.getElementById('update_serie').value = '<?= $row['serie'] ?>';document.getElementById('update_num_documento').value = '<?= $row['num_documento'] ?>';document.getElementById('update_descripcion').value = '<?= $row['descripcion'] ?>';document.getElementById('update_importe_documento').value = '<?= $row['importe_documento'] ?>';document.getElementById('update_importe_retencion').value = '<?= $row['importe_retencion'] ?>';document.getElementById('update_importe_pagar').value = '<?= $row['importe_pagar'] ?>';document.getElementById('update_constancia_detraccion').value = '<?= $row['constancia_detraccion'] ?>';document.getElementById('update_num_retencion').value = '<?= $row['num_retencion'] ?>';document.getElementById('update_estado_aprobacion').value = '<?= $row['estado_aprobacion'] ?>';document.getElementById('update_motivo').value = '<?= $row['motivo'] ?>';document.getElementById('update_estado_pago').value = '<?= $row['estado_pago'] ?>';document.getElementById('update_num_operacion').value = '<?= $row['num_operacion'] ?>';" title="Editar Usuario" ><img src="images/actualizar_icono.png" width="30" /></a>
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id_compro_proveedores').value =' <?= $row['id_compro_proveedores'] ?>';document.getElementById('delete_comprobante').value = '<?= $row['tipo_documento'].' '.$row['serie'].'-'.$row['num_documento'] ?>';" title="Eliminar Usuario" class="text-danger"><img src="images/eliminar_icono.png" width="30" /></a>
                                                    <?php } 
                                                    else{ ?>
                                                        -
                                                    <?php } ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <table id="example2" class="table table-bordered table-hover" style="text-align:right;">
                        <tr>
                            <th>
                                Para dudas y consultas <a href="https://www.wa.link/p57s65"><img src="images/logo_whatsapp.png" width="3%" /></a>
                            </th>
                        <tr>
                    </table>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Comprobante</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=recep_docum_provee&list=<?php echo $list;?> " id="ingresar" method="POST" enctype="multipart/form-data">
                <table id="example2" class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="add_id_proveedor"> Id:</label>
                                    <br>
                                    <input type="text" name="add_id_proveedor" id="add_id_proveedor" class="form-control" value="<?php echo $id_proveedor; ?>" required="required"readonly="readonly"> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="add_raz_social"> RUC:</label>
                                    <br>
                                    <input type="text" class="form-control" value="<?php echo $ruc; ?>" required="required" readonly="readonly">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="add_raz_social"> Razon Social:</label>
                                    <br>
                                    <input type="text" class="form-control" value="<?php echo $razon_social; ?>" required="required" readonly="readonly">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="form-group">
                                    <label for="add_fecha_emitida">Fecha Emitido</label>
                                    <input type="date" name="add_fecha_emitida" id="add_fecha_emitida" class="form-control" required="required">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="add_tipo_documento">Tipo Documento</label>
                                    <br>
                                    <select style="width:200px;border:3px solid #04467E" name="add_tipo_documento" id='add_tipo_documento' required="required">
                                        <option value="FACTURA">FACTURA</option>
                                        <option value="BOLETA">BOLETA</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <label for="add_serie">Serie</label>
                                    <input type="text" name="add_serie" id="add_serie" class="form-control" required="required">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="add_num_documento">Num Documento</label>
                                    <input type="text" name="add_num_documento" id="add_num_documento" class="form-control" required="required">
                                </div>
                            </td>
                        </tr>
                        <tr> 
                            <td colspan="3">  
                                <div class="form-group">
                                    <label for="add_descripcion">Descripcion</label>
                                    <input type="text" name="add_descripcion" id="add_descripcion" class="form-control" required="required">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="add_importe_documento">Importe Documento</label>
                                    <input type="text" name="add_importe_documento" id="add_importe_documento" class="form-control" required="required">
                                </div>
                            </td>
                            <td> 
                                <div class="form-group">
                                    <label for="add_importe_retencion">Importe Retencion</label>
                                    <input type="text" name="add_importe_retencion" id="add_importe_retencion" class="form-control" required="required">
                                </div>
                            </td> 
                            <td>
                                <div class="form-group">
                                    <label for="add_importe_pagar">Importe a Pagar</label>
                                    <input type="text" name="add_importe_pagar" id="add_importe_pagar" class="form-control" required="required">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="add_documentopdf">Documento PDF</label><br>
                                    <input type="file" name="add_documentopdf" id="add_documentopdf">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="add_xml">Archivo XML</label><br>
                                    <input type="file" name="add_xml" id="add_xml">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="add_valorizacionpdf">Valorizacion PDF</label><br>
                                    <input type="file" name="add_valorizacionpdf" id="add_valorizacionpdf">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="add_contrato">Contrato</label><br>
                                    <input type="file" name="add_contrato" id="add_contrato">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" name="add_compro_proveedor" Value="Registrar" class="btn btn-primary">
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
                <h4 class="modal-title" id="defaultModalLabel">Editar Comprobante</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=recep_docum_provee&list=<?php echo $list;?> " method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update_id_compro_proveedores" id="update_id_compro_proveedores" value="">
                    <input type="hidden" name="update_id_proveedor" id="update_id_proveedor" value="">

                    <table id="example2" class="table table-bordered table-hover">
                    <?php 
                    if($tipo_user=='PROVEEDOR') { ?>
                    <tr>
                        <td colspan="3">
                            <div class="form-group">
                                <label for="update_fecha_emitida">Fecha Emitido</label>
                                <input type="date" name="update_fecha_emitida" id="update_fecha_emitida" class="form-control" required="required" >
                                <input type="hidden" name="update_tipo" id="update_tipo" value="PROV">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_tipo_documento">Tipo Documento</label>
                                <br>
                                <select style="width:200px;border:3px solid #04467E" name="update_tipo_documento" id='update_tipo_documento' required="required">
                                    <option value="FACTURA">FACTURA</option>
                                    <option value="BOLETA">BOLETA</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_serie">Serie</label>
                                <input type="text" name="update_serie" id="update_serie" class="form-control" required="required">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_num_documento">Num Documento</label>
                                <input type="text" name="update_num_documento" id="update_num_documento" class="form-control" required="required">
                            </div>
                        </td>
                    </tr>
                    <?php } else {?>
                    <tr>
                        <td colspan="3">
                            <div class="form-group">
                                <label for="update_fecha_emitida">Fecha Emitido</label>
                                <input type="date" name="update_fecha_emitida" id="update_fecha_emitida" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_tipo_documento">Tipo Documento</label>
                                <br>
                                <input type="text" name="update_tipo_documento" id="update_tipo_documento" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_serie">Serie</label>
                                <input type="text" name="update_serie" id="update_serie" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_num_documento">Num Documento</label>
                                <input type="text" name="update_num_documento" id="update_num_documento" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                    </tr>
                    <?php } if($tipo_user=='PROVEEDOR') { ?>
                    <tr>
                        <td colspan="3">
                            <div class="form-group">
                                <label for="update_descripcion">Descripcion</label>
                                <input type="text" name="update_descripcion" id="update_descripcion" class="form-control" required="required">
                            </div>
                        </td>
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td colspan="3">
                            <div class="form-group">
                                <label for="update_descripcion">Descripcion</label>
                                <input type="text" name="update_descripcion" id="update_descripcion" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                    </tr>
                    <?php } if($tipo_user=='PROVEEDOR') { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_importe_documento">Importe Documento</label>
                                <input type="text" name="update_importe_documento" id="update_importe_documento" class="form-control" required="required">
                            </div>
                        </td>
                        <td> 
                            <div class="form-group">
                                <label for="update_importe_retencion">Importe Retencion</label>
                                <input type="text" name="update_importe_retencion" id="update_importe_retencion" class="form-control" required="required">
                            </div>
                        </td> 
                        <td>
                            <div class="form-group">
                                <label for="update_importe_pagar">Importe a Pagar</label>
                                <input type="text" name="update_importe_pagar" id="update_importe_pagar" class="form-control" required="required">
                            </div>
                        </td>
                    </tr>
                    <?php } else{ ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_importe_documento">Importe Documento</label>
                                <input type="text" name="update_importe_documento" id="update_importe_documento" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                        <td> 
                            <div class="form-group">
                                <label for="update_importe_retencion">Importe Retencion</label>
                                <input type="text" name="update_importe_retencion" id="update_importe_retencion" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td> 
                        <td>
                            <div class="form-group">
                                <label for="update_importe_pagar">Importe a Pagar</label>
                                <input type="text" name="update_importe_pagar" id="update_importe_pagar" class="form-control" required="required" readonly="readonly">
                            </div>
                        </td>
                    </tr>
                    <?php } if($tipo_user=='PROVEEDOR') { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_constancia_detraccion">Constancia Detraccion</label>
                                <input type="text" name="update_constancia_detraccion" id="update_constancia_detraccion" class="form-control" readonly="readonly">
                            </div>
                        </td>
                        <td> 
                            <div class="form-group">
                                <label for="update_num_retencion">Num Retencion</label>
                                <input type="text" name="update_num_retencion" id="update_num_retencion" class="form-control" readonly="readonly">
                            </div>
                        </td> 
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_constancia_detraccion">Constancia Detraccion</label>
                                <input type="text" name="update_constancia_detraccion" id="update_constancia_detraccion" class="form-control" >
                            </div>
                        </td>
                        <td> 
                            <div class="form-group">
                                <label for="update_num_retencion">Num Retencion</label>
                                <input type="text" name="update_num_retencion" id="update_num_retencion" class="form-control">
                            </div>
                        </td> 
                    </tr>
                    <?php } if($tipo_user=='PROVEEDOR') { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_estado_aprobacion">Estado</label>
                                <br>
                                <input type="text" name="update_estado_aprobacion" id="update_estado_aprobacion" class="form-control" readonly="readonly">
                            </div>
                        </td>
                        <td colspan="2"> 
                            <div class="form-group">
                                <label for="update_motivo">Motivo</label>
                                <input type="text" name="update_motivo" id="update_motivo" class="form-control" readonly="readonly">
                            </div>
                        </td> 
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_estado_aprobacion">Estado</label>
                                <br>
                                <select style="width:200px;border:3px solid #04467E" name="update_estado_aprobacion" id='update_estado_aprobacion' >
                                    <option value="ENVIADO A REVISION">ENVIADO A REVISION</option>
                                    <option value="APROBADO">APROBADO</option>
                                    <option value="RECHAZADO">RECHAZADO</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="2"> 
                            <div class="form-group">
                                <label for="update_motivo">Motivo</label>
                                <input type="text" name="update_motivo" id="update_motivo" class="form-control" >
                            </div>
                        </td> 
                    </tr>
                    <?php } if($tipo_user=='PROVEEDOR') { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_estado_pago">Estado Pago</label>
                                <br>
                                <input type="text" name="update_estado_pago" id="update_estado_pago" class="form-control" readonly="readonly">
                            </div>
                        </td>
                        <td colspan="2"> 
                            <div class="form-group">
                                <label for="update_num_operacion">Num Operacion</label>
                                <input type="text" name="update_num_operacion" id="update_num_operacion" class="form-control" readonly="readonly">
                            </div>
                        </td> 
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_estado_pago">Estado Pago</label>
                                <br>
                                <select style="width:200px;border:3px solid #04467E" name="update_estado_pago" id='update_estado_pago' >
                                    <option value="PENDIENTE">PENDIENTE</option>
                                    <option value="PAGADO">PAGADO</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="2"> 
                            <div class="form-group">
                                <label for="update_num_operacion">Num Operacion</label>
                                <input type="text" name="update_num_operacion" id="update_num_operacion" class="form-control">
                            </div>
                        </td> 
                    </tr>
                    <?php } if($tipo_user=='PROVEEDOR') { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_documentopdf">Documento PDF</label><br>
                                <input type="file" name="update_documentopdf" id="update_documentopdf">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_xml">Archivo XML</label><br>
                                <input type="file" name="update_xml" id="update_xml">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_valorizacionpdf">Valorizacion PDF</label><br>
                                <input type="file" name="update_valorizacionpdf" id="update_valorizacionpdf">
                            </div>
                        </td>
                    </tr>
                    <?php } else { ?>
                        <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_documentopdf">Documento PDF</label><br>
                                <input type="file" name="update_documentopdf" id="update_documentopdf">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_xml">Archivo XML</label><br>
                                <input type="file" name="update_xml" id="update_xml">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="update_valorizacionpdf">Valorizacion PDF</label><br>
                                <input type="file" name="update_valorizacionpdf" id="update_valorizacionpdf">
                            </div>
                        </td>
                    </tr>
                    <?php } if($tipo_user=='PROVEEDOR') { ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_contrato">Contrato</label><br>
                                <input type="file" name="update_contrato" id="update_contrato">
                            </div>
                        </td>
                    </tr>
                    <?php } else{ ?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_contrato">Contrato</label><br>
                                <input type="file" name="update_contrato" id="update_contrato">
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    </table>
                    <input type="submit" name="update_compro_proveedor" id="update_compro_proveedor" Value="Actualizar" class="btn btn-primary">
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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Comprobante</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=recep_docum_provee&list=<?php echo $list;?>" method="POST">
                    <input type="hidden" name="delete_id_compro_proveedores" id="delete_id_compro_proveedores" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Comprobante?</label>
                        <input type="text" name="delete_comprobante" id="delete_comprobante" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_compro_proveedor" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>