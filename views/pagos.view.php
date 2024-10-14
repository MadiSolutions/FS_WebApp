<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Pagos</h1>
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
                        Agregar Nuevo Pago
                    </button>
                        <table id="example2" class="table table-bordered table-hover" style="text-align:center;">
                        <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                <th>Fecha Servicio</th>
                                <th>Proveedor</th>
                                <th>Descripcion</th>
                                <th>Contrato</th>  <!--nro val, medio envio val, fecha envio val,moneda, dias, costo dia,descuento-->  
                                <th>Unidad</th> <!--poner placa y tipo de servicio --> 
                                <th>Facturacion</th> <!--  tipo,UM FACTURA, FECHA EMITIDO, FECHA recepcionada, -->
                                <th>Detraccion</th> <!-- monto, estado,fechapago -->  
                                <th>Deposito</th> <!--compromiso deposito,fecha pago, monto,estado-->
                                <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['fecha_servicio'] ?></td>
                                        <td><?php echo $row['ruc'].'<br>'.$row['razon_social'] ?></td>
                                        <td><?php echo $row['descripcion'] ?></td>
                                        <td><?php echo 'Num: '.$row['valo'] ."<br> Recepcionada via: ".$row['medio_envio_valo']."<br> Moneda: ".$row['moneda']."<br> Duracion: ".$row['dias_val'].' dias. <br> Costo Dia: '.$row['costo_dia'].'<br> Descuento: '.$row['descuento']?></td>
                                        <td><?php echo $row['unidad'].' - '.$row['tipo_servicio'];
                                            if (file_exists("documentos/vehiculos/EQUIPAMIENTO".'_'.$row['unidad'].'.jpg')) { ?>
                                            <br>
                                                <a <?="href=documentos/vehiculos/EQUIPAMIENTO".'_'.$row['unidad'].'.jpg' ?> target="_blank" rel="noopener noreferrer"><img src="images/logo_visor.png" width="30"/></a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo 'Tipo: '.$row['tipo_documento']."<br> Monto: ".($row['dias_val']*$row['costo_dia'])-$row['descuento'].' '.$row['moneda']."<br> Emitida: ".$row['fecha_emitido']."<br> Recepcionada: ".$row['fecha_recepcionado']?></td>
                                        <td><?php echo $row['detraccion'].' soles<br>';
                                                if($row['estado_detraccion']=='PENDIENTE'){
                                                    echo '<span class="badge badge-warning">PENDIENTE <BR>DE PAGO</span>'."<br>";
                                                } else{
                                                    echo '<span class="badge badge-success">PAGADA EL '."<br>".$row['fecha_detraccion'].'</span>';
                                                }
                                                ?> 
                                        </td>
                                        <td><?php echo 'Monto: '.$row['monto_pago'].' '.$row['moneda']."<br> Programado: ".$row['compromiso_pago']."<br> Pagado: ";
                                        if($row['fecha_pago']==''){
                                            echo '<span class="badge badge-warning">PENDIENTE</span>';
                                        }else{
                                            echo '<span class="badge badge-success">'.$row['fecha_pago'].'</span>';
                                        }?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="
                                                    document.getElementById('update_id').value ='<?= $row['id']?>';
                                                    document.getElementById('update_fecha_servicio').value ='<?= $row['fecha_servicio']?>';
                                                    document.getElementById('update_proveedor').value ='<?= $row['proveedor'] ?>';
                                                    document.getElementById('update_descripcion').value ='<?= $row['descripcion'] ?>';
                                                    document.getElementById('update_unidad').value ='<?= $row['unidad'] ?>';
                                                    document.getElementById('update_tipo_servicio').value ='<?= $row['tipo_servicio'] ?>';
                                                    document.getElementById('update_valo').value ='<?= $row['valo'] ?>';
                                                    document.getElementById('update_medio_envio_valo').value ='<?= $row['medio_envio_valo'] ?>';
                                                    document.getElementById('update_fecha_envio_valo').value ='<?= $row['fecha_envio_valo'] ?>';
                                                    document.getElementById('update_moneda').value ='<?= $row['moneda'] ?>';
                                                    document.getElementById('update_dias_val').value ='<?= $row['dias_val'] ?>';
                                                    document.getElementById('update_costo_dia').value ='<?= $row['costo_dia'] ?>';
                                                    document.getElementById('update_descuento').value ='<?= $row['descuento'] ?>';
                                                    document.getElementById('update_detraccion').value ='<?= $row['detraccion'] ?>';
                                                    document.getElementById('update_estado_detraccion').value ='<?= $row['estado_detraccion'] ?>';
                                                    document.getElementById('update_fecha_detraccion').value ='<?= $row['fecha_detraccion'] ?>';
                                                    document.getElementById('update_tipo_documento').value ='<?= $row['tipo_documento'] ?>';
                                                    document.getElementById('update_num_documento').value ='<?= $row['num_doc'] ?>';
                                                    document.getElementById('update_fecha_emitido').value ='<?= $row['fecha_emitido'] ?>';
                                                    document.getElementById('update_fecha_recepcionado').value ='<?= $row['fecha_recepcionado'] ?>';
                                                    document.getElementById('update_compromiso_pago').value ='<?= $row['compromiso_pago'] ?>';
                                                    document.getElementById('update_fecha_pago').value ='<?= $row['fecha_pago'] ?>';
                                                    document.getElementById('update_monto_pago').value ='<?= $row['monto_pago'] ?>';
                                                    document.getElementById('update_estado_pago').value ='<?= $row['estado_pago'] ?>';"
                                                    title="Editar Personal" style="margin-right:5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value ='<?= $row['id'] ?>';document.getElementById('delete_nombre').value ='<?= $row['proveedor'] ?>';" title="Eliminar Cobro" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Pago</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=pagos" id="ingresar" method="POST">
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_fecha_servicio">Fecha Servicio</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_servicio" id="add_fecha_servicio" class="form-control" >
                            </th>
                            <th>
                                <label for="add_proveedor">Proveedor</label>
                            </th>
                            <th colspan="3">
                                <select style="width:400px;border:3px solid #04467E" name="add_proveedor" id='add_proveedor' required="required"> 
                                <?php
                                while ($row = mysqli_fetch_assoc($res2)) :
                                ?>
                                    <option value=<?php echo $row['ruc'];?>><?php echo $row['ruc'].' - '.$row['razon_social'];?> </option>  
                                <?php endwhile; ?>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_descripcion">Descripcion</label>
                            </th>
                            <th colspan="5">
                                <input type="text" name="add_descripcion" id="add_descripcion" class="form-control" >
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_unidad">Unidad</label>
                            </th>
                            <th>
                                <select style="border:3px solid #04467E" name="add_unidad" id='add_unidad' required="required"> 
                                <option value=GASTO_ASMINISTRATIVO>GASTO_ASMINISTRATIVO</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($res4)) :
                                ?>
                                    <option value=<?php echo $row['placa'];?>><?php echo $row['placa'].' - '.$row['tipo_vehiculo'];?> </option>  
                                <?php endwhile; ?>
                                </select>
                            </th>
                            <th>
                                <label for="add_tipo_servicio">Tipo Servicio</label>
                            </th>
                            <th>
                                <input type="text" name="add_tipo_servicio" id="add_tipo_servicio" class="form-control" >      
                            </th>
                            <th>
                                <label for="add_valo">Contrato</label>                 
                            </th>
                            <th>
                                <input type="text" name="add_valo" id="add_valo" placeholder="Contrato" class="form-control" >
                            </th>
                        </tr>
                        <tr>  
                            <th>
                                <label for="add_moneda">Moneda</label>  
                            </th>
                            <th>
                                <select name="add_moneda" id='add_moneda'>  
                                    <option value="DOLARES">DOLARES</option>  
                                    <option value="SOLES">SOLES</option>  
                                </select>   
                            </th>
                            <th>
                                <label for="add_dias_val">Dias Val</label>  
                            </th>
                            <th>
                                <input type="number" name="add_dias_val" id="add_dias_val"  class="form-control">
                            </th>
                            <th>
                                <label for="add_costo_dia">Costo Dia</label> 
                            </th>
                            <th>
                                <input type="text" name="add_costo_dia" id="add_costo_dia"  class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_descuento">Descuento</label>
                            </th>
                            <th>
                                <input type="text" name="add_descuento" id="add_descuento" class="form-control">
                            </th>
                            <th>
                                <label for="add_medio_envio_valo">Medio Recepcion</label>
                            </th>
                            <th>
                                <input type="text" name="add_medio_envio_valo" id="add_medio_envio_valo" class="form-control">
                            </th>
                            <th>
                                <label for="add_fecha_envio_valo">Fecha Recepcion</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_envio_valo" id="add_fecha_envio_valo" class="form-control">
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="add_detraccion">Detraccion</label>
                            </th>
                            <th>
                                <input type="text" name="add_detraccion" id="add_detraccion" class="form-control" readonly="readonly">
                            </th>
                            <th>
                                <label for="add_estado_detraccion">Estado Detraccion</label>
                            </th>
                            <th>
                                <select name="add_estado_detraccion" id='add_estado_detraccion'>  
                                    <option value="PENDIENTE">PENDIENTE</option>  
                                </select>  
                            </th>
                            <th>
                                <label for="add_fecha_detraccion">Fecha Detraccion</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_detraccion" id="add_fecha_detraccion" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_tipo_documento">Tipo Documento</label>
                            </th>
                            <th>
                                <select name="add_tipo_documento" id='add_tipo_documento'>  
                                    <option value="FACTURA">FACTURA</option>  
                                    <option value="BOLETA">BOLETA</option>  
                                </select> 
                            </th>
                            <th>
                                <label for="add_num_documento">Num Documento</label>
                            </th>
                            <th>
                                <input type="text" name="add_num_documento" id="add_num_documento" class="form-control">
                            </th>
                            <th>
                                <label for="add_fecha_emitido">Fecha Emitido</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_emitido" id="add_fecha_emitido" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_fecha_recepcionado">Fecha Recepcionado</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_recepcionado" id="add_fecha_recepcionado" class="form-control" >
                            </th>
                            <th>
                                <label for="add_compromiso_pago">Compromiso Pago</label>
                            </th>
                            <th>
                                <input type="date" name="add_compromiso_pago" id="add_compromiso_pago" class="form-control" >
                            </th>
                            <th>
                                <label for="add_fecha_pago">Fecha Pago</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_pago" id="add_fecha_pago" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_monto_pago">Monto Pago</label>
                            </th>
                            <th>
                                <input type="text" name="add_monto_pago" id="add_monto_pago" class="form-control" readonly="readonly">
                            </th>
                            <th>
                                <label for="add_estado_pago">Estado Pago</label>
                            </th>
                            <th>
                                <select name="add_estado_pago" id='add_estado_pago'>  
                                    <option value="PENDIENTE">PENDIENTE</option>  
                                    <option value="PAGADO">PAGADO</option>  
                                </select> 
                            </th>
                        </tr>
                    </table>
                    <input type="submit" name="add_pago" Value="Registrar" class="btn btn-primary">
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
            <form action="panel.php?modulo=pagos" id="ingresar" method="POST">
                    <input type="hidden" name="update_id" id="update_id" value="">
                    <h4 style="font-family:candara; color:#1338BE">DATOS PERSONALES</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_fecha_servicio">Fecha Servicio</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_servicio" id="update_fecha_servicio" class="form-control" >
                            </th>
                            <th>
                                <label for="update_proveedor">Proveedor</label>
                            </th>
                            <th colspan="3">
                                <select style="width:400px;border:3px solid #04467E" name="update_proveedor" id='update_proveedor' required="required"> 
                                <?php
                                while ($row = mysqli_fetch_assoc($res3)) :
                                ?>
                                    <option value=<?php echo $row['ruc'];?>><?php echo $row['ruc'].' - '.$row['razon_social'];?> </option>  
                                <?php endwhile; ?>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_descripcion">Descripcion</label>
                            </th>
                            <th colspan="5">
                                <input type="text" name="update_descripcion" id="update_descripcion" class="form-control" >
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_unidad">Unidad</label>
                            </th>
                            <th>
                                <select style="border:3px solid #04467E" name="update_unidad" id='update_unidad' required="required"> 
                                <?php
                                while ($row = mysqli_fetch_assoc($res5)) :
                                ?>
                                    <option value=<?php echo $row['placa'];?>><?php echo $row['placa'].' - '.$row['tipo_vehiculo'];?> </option>  
                                <?php endwhile; ?>
                                </select>
                            </th>
                            <th>
                                <label for="update_tipo_servicio">Tipo Servicio</label>
                            </th>
                            <th>
                                <input type="text" name="update_tipo_servicio" id="update_tipo_servicio" class="form-control" >      
                            </th>
                            <th>
                                <label for="update_valo">Contrato</label>                 
                            </th>
                            <th>
                                <input type="text" name="update_valo" id="update_valo" placeholder="Contrato" class="form-control" >
                            </th>
                        </tr>
                        <tr>  
                            <th>
                                <label for="update_moneda">Moneda</label>  
                            </th>
                            <th>
                                <select name="update_moneda" id='update_moneda'>  
                                    <option value="DOLARES">DOLARES</option>  
                                    <option value="SOLES">SOLES</option>  
                                </select>   
                            </th>
                            <th>
                                <label for="update_dias_val">Dias Val</label>  
                            </th>
                            <th>
                                <input type="number" name="update_dias_val" id="update_dias_val"  class="form-control">
                            </th>
                            <th>
                                <label for="update_costo_dia">Costo Dia</label> 
                            </th>
                            <th>
                                <input type="text" name="update_costo_dia" id="update_costo_dia"  class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_descuento">Descuento</label>
                            </th>
                            <th>
                                <input type="text" name="update_descuento" id="update_descuento" class="form-control">
                            </th>
                            <th>
                                <label for="update_medio_envio_valo">Medio Recepcion</label>
                            </th>
                            <th>
                                <input type="text" name="update_medio_envio_valo" id="update_medio_envio_valo" class="form-control">
                            </th>
                            <th>
                                <label for="update_fecha_envio_valo">Fecha Recepcion</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_envio_valo" id="update_fecha_envio_valo" class="form-control">
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="update_detraccion">Detraccion</label>
                            </th>
                            <th>
                                <input type="text" name="update_detraccion" id="update_detraccion" class="form-control" readonly="readonly">
                            </th>
                            <th>
                                <label for="update_estado_detraccion">Estado Detraccion</label>
                            </th>
                            <th>
                                <select name="update_estado_detraccion" id='update_estado_detraccion'>  
                                    <option value="PENDIENTE">PENDIENTE</option>  
                                    <option value="PAGADA">PAGADA</option> 
                                </select>  
                            </th>
                            <th>
                                <label for="update_fecha_detraccion">Fecha Pago Detraccion</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_detraccion" id="update_fecha_detraccion" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_tipo_documento">Tipo Documento</label>
                            </th>
                            <th>
                                <select name="update_tipo_documento" id='update_tipo_documento'>  
                                    <option value="FACTURA">FACTURA</option>  
                                    <option value="BOLETA">BOLETA</option>  
                                </select> 
                            </th>
                            <th>
                                <label for="update_num_documento">Num Documento</label>
                            </th>
                            <th>
                                <input type="text" name="update_num_documento" id="update_num_documento" class="form-control">
                            </th>
                            <th>
                                <label for="update_fecha_emitido">Fecha Emitido</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_emitido" id="update_fecha_emitido" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_fecha_recepcionado">Fecha Recepcionado</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_recepcionado" id="update_fecha_recepcionado" class="form-control" >
                            </th>
                            <th>
                                <label for="update_compromiso_pago">Compromiso Pago</label>
                            </th>
                            <th>
                                <input type="date" name="update_compromiso_pago" id="update_compromiso_pago" class="form-control" >
                            </th>
                            <th>
                                <label for="update_fecha_pago">Fecha Pago</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_pago" id="update_fecha_pago" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_monto_pago">Monto Pago</label>
                            </th>
                            <th>
                                <input type="text" name="update_monto_pago" id="update_monto_pago" class="form-control" readonly="readonly">
                            </th>
                            <th>
                                <label for="update_estado_pago">Estado Pago</label>
                            </th>
                            <th>
                                <select name="update_estado_pago" id='update_estado_pago'>  
                                    <option value="PENDIENTE">PENDIENTE</option>  
                                    <option value="PAGADO">PAGADO</option>  
                                </select> 
                            </th>
                        </tr>
                    </table>                 
                    <input type="submit" name="update_pago" id="update_personal" Value="Actualizar" class="btn btn-primary">
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
                <form action="panel.php?modulo=pagos" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Cobro?</label>
                        <input type="text" name="delete_nombre" id="delete_nombre" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_pago" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>