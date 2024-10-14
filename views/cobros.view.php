<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Cobros</h1>
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
                        Agregar Nuevo Cobro
                    </button>
                        <table id="example2" class="table table-bordered table-hover" style="text-align:center;">
                        <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                <th>Fecha Servicio</th>
                                <th>Cliente</th>
                                <th>Descripcion</th>
                                <th>Contrato</th>  <!--poner CONTRATO, moneda, dias, costo dia,descuento-->
                                <th>Unidad</th> <!--poner placa y tipo de servicio -->    
                                <th>Facturacion</th> <!--  tipo,UM FACTURA, FECHA EMITIDO, FECHA ENVIADO, -->
                                <th>Detraccion</th> <!-- monto, estado -->
                                <th>Deposito</th> <!--posible cobro,poner fecha - monto sin detraccion -->
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
                                        <td><?php echo 'OC: '.$row['oc'].'<br> Contrato: '.$row['contrato'] ."<br> Moneda: ".$row['moneda']."<br> Duracion: ".$row['dias_val'].' dias. <br> Costo Dia: '.$row['costo_dia']?></td><!--agregar descuento -->
                                        <td><?php 
                                            echo $row['unidad'].' PARA '.$row['tipo_servicio'];
                                            if (file_exists("documentos/vehiculos/EQUIPAMIENTO".'_'.$row['unidad'].'.jpg')) { ?>
                                                <BR>
                                                <a <?="href=documentos/vehiculos/EQUIPAMIENTO".'_'.$row['unidad'].'.jpg' ?> target="_blank" rel="noopener noreferrer"><img src="images/logo_visor.png" width="30"/></a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo 'Tipo: '.$row['tipo_documento']."<br> Monto: ".(($row['dias_val']*$row['costo_dia'])-$row['descuento']).' '.$row['moneda']."<br> Emitida: ".$row['fecha_emitido']."<br> Enviada: ".$row['fecha_enviado']?></td>
                                        <td><?php echo $row['detraccion'].' soles<br>';
                                                if($row['estado_detraccion']=='PENDIENTE'){
                                                    echo '<span class="badge badge-warning">PENDIENTE <BR>DE PAGO</span>';
                                                } else{
                                                    echo '<span class="badge badge-success">PAGADA EL <BR>'.$row['fecha_detraccion'].'</span>';
                                                }?> 
                                        </td>
                                        <td><?php echo 'Monto: '.$row['monto_cobro'].' '.$row['moneda']."<br> Programado: ".$row['fecha_pro_cobro']."<br> Pagado: ";
                                        if($row['fecha_cobro']=='0000-00-00'){
                                            echo '<span class="badge badge-warning">PENDIENTE</span>';
                                        }else{
                                            echo '<span class="badge badge-success">'.$row['fecha_cobro'].'</span>';
                                        }?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="
                                                    document.getElementById('update_id').value ='<?= $row['id']?>';
                                                    document.getElementById('update_fecha_servicio').value ='<?= $row['fecha_servicio']?>';
                                                    document.getElementById('update_cliente').value ='<?= $row['cliente'] ?>';
                                                    document.getElementById('update_descripcion').value ='<?= $row['descripcion'] ?>';
                                                    document.getElementById('update_unidad').value ='<?= $row['unidad'] ?>';
                                                    document.getElementById('update_tipo_servicio').value ='<?= $row['tipo_servicio'] ?>';
                                                    document.getElementById('update_contrato').value ='<?= $row['contrato'] ?>';
                                                    document.getElementById('update_moneda').value ='<?= $row['moneda'] ?>';
                                                    document.getElementById('update_dias_val').value ='<?= $row['dias_val'] ?>';
                                                    document.getElementById('update_costo_dia').value ='<?= $row['costo_dia'] ?>';
                                                    document.getElementById('update_descuento').value ='<?= $row['descuento'] ?>';
                                                    document.getElementById('update_detraccion').value ='<?= $row['detraccion'] ?>';
                                                    document.getElementById('update_fecha_detraccion').value ='<?= $row['fecha_detraccion'] ?>';
                                                    document.getElementById('update_estado_detraccion').value ='<?= $row['estado_detraccion'] ?>';
                                                    document.getElementById('update_oc').value ='<?= $row['oc'] ?>';
                                                    document.getElementById('update_tipo_documento').value ='<?= $row['tipo_documento'] ?>';
                                                    document.getElementById('update_fecha_emitido').value ='<?= $row['fecha_emitido'] ?>';
                                                    document.getElementById('update_fecha_enviado').value ='<?= $row['fecha_enviado'] ?>';
                                                    document.getElementById('update_fecha_pro_cobro').value ='<?= $row['fecha_pro_cobro'] ?>';
                                                    document.getElementById('update_fecha_cobro').value ='<?= $row['fecha_cobro'] ?>';
                                                    document.getElementById('update_monto_cobro').value ='<?= $row['monto_cobro'] ?>';
                                                    document.getElementById('update_estado_cobro').value ='<?= $row['estado_cobro'] ?>';"
                                                    title="Editar Personal" style="margin-right:5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value ='<?= $row['id'] ?>';document.getElementById('delete_nombre').value ='<?= $row['cliente'] ?>';" title="Eliminar Cobro" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Cobro</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=cobros" id="ingresar" method="POST">
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="add_fecha_servicio">Fecha Servicio</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_servicio" id="add_fecha_servicio" class="form-control" >
                            </th>
                            <th>
                                <label for="add_cliente">Cliente</label>
                            </th>
                            <th colspan="3">
                                <select style="width:400px;border:3px solid #04467E" name="add_cliente" id='add_cliente' required="required"> 
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
                                <?php
                                while ($row = mysqli_fetch_assoc($res3)) :
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
                                <label for="add_contrato">Contrato</label>                 
                            </th>
                            <th>
                                <input type="text" name="add_contrato" id="add_contrato" placeholder="Contrato" class="form-control" >
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
                                <label for="add_detraccion">Detraccion</label>
                            </th>
                            <th>
                                <input type="text" name="add_detraccion" id="add_detraccion" class="form-control" readonly="readonly">
                            </th>
                            <th>
                                <label for="add_fecha_detraccion">Fecha Pago Detraccion</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_detraccion" id="add_fecha_detraccion" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="add_estado_detraccion">Estado Detraccion</label>
                            </th>
                            <th>
                                <select name="add_estado_detraccion" id='add_estado_detraccion'>  
                                    <option value="PENDIENTE">PENDIENTE</option>  
                                </select>  
                            </th>
                            <th>
                                <label for="add_oc">Orden Compra</label>
                            </th>
                            <th>
                                <input type="text" name="add_oc" id="add_oc" class="form-control" >
                            </th>
                            <th>
                                <label for="add_tipo_documento">Tipo Documento</label>
                            </th>
                            <th>
                                <select name="add_tipo_documento" id='add_tipo_documento'>  
                                    <option value="FACTURA">FACTURA</option>  
                                    <option value="BOLETA">BOLETA</option>  
                                </select> 
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="add_fecha_emitido">Fecha Emitido</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_emitido" id="add_fecha_emitido" class="form-control">
                            </th>
                            <th>
                                <label for="add_fecha_enviado">Fecha Enviado</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_enviado" id="add_fecha_enviado" class="form-control" >
                            </th>
                            <th>
                                <label for="add_fecha_pro_cobro">Fecha Programada Cobro</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_pro_cobro" id="add_fecha_pro_cobro" class="form-control" >
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="add_fecha_cobro">Fecha Cobro</label>
                            </th>
                            <th>
                                <input type="date" name="add_fecha_cobro" id="add_fecha_cobro" class="form-control">
                            </th>
                            <th>
                                <label for="add_monto_cobro">Monto Cobro</label>
                            </th>
                            <th>
                                <input type="text" name="add_monto_cobro" id="add_monto_cobro" class="form-control" readonly="readonly">
                            </th>
                            <th>
                                <label for="add_estado_cobro">Estado Cobro</label>
                            </th>
                            <th>
                                <select name="add_estado_cobro" id='add_estado_cobro'>  
                                    <option value="PENDIENTE">PENDIENTE</option>  
                                    <option value="COBRADO">COBRADO</option>  
                                </select> 
                            </th>
                        </tr>
                    </table>
                    <input type="submit" name="add_cobro" Value="Registrar" class="btn btn-primary">
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
                <h4 class="modal-title" id="defaultModalLabel">Actualizar Cobro</h4>
            </div>
            <div class="modal-body">
            <form action="panel.php?modulo=cobros" id="ingresar" method="POST">
                    <input type="hidden" name="update_id" id="update_id" value="">
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_fecha_servicio">Fecha Servicio</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_servicio" id="update_fecha_servicio" class="form-control" >
                            </th>
                            <th>
                                <label for="update_cliente">Cliente</label>
                            </th>
                            <th colspan="3">
                                <select style="width:400px;border:3px solid #04467E" name="update_cliente" id='update_cliente' required="required"> 
                                <?php
                                while ($row = mysqli_fetch_assoc($res4)) :
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
                                <label for="update_contrato">Contrato</label>                 
                            </th>
                            <th>
                                <input type="text" name="update_contrato" id="update_contrato" placeholder="Contrato" class="form-control" >
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
                                <label for="update_detraccion">Detraccion</label>
                            </th>
                            <th>
                                <input type="text" name="update_detraccion" id="update_detraccion" class="form-control" readonly="readonly">
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
                                <label for="update_estado_detraccion">Estado Detraccion</label>
                            </th>
                            <th>
                                <select name="update_estado_detraccion" id='update_estado_detraccion'>  
                                    <option value="PENDIENTE">PENDIENTE</option>  
                                    <option value="PAGADA">PAGADA</option>  
                                </select>  
                            </th>
                            <th>
                                <label for="update_oc">Orden Compra</label>
                            </th>
                            <th>
                                <input type="text" name="update_oc" id="update_oc" class="form-control" >
                            </th>
                            <th>
                                <label for="update_tipo_documento">Tipo Documento</label>
                            </th>
                            <th>
                                <select name="update_tipo_documento" id='update_tipo_documento'>  
                                    <option value="FACTURA">FACTURA</option>  
                                    <option value="BOLETA">BOLETA</option>  
                                </select> 
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="update_fecha_emitido">Fecha Emitido</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_emitido" id="update_fecha_emitido" class="form-control">
                            </th>
                            <th>
                                <label for="update_fecha_enviado">Fecha Enviado</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_enviado" id="update_fecha_enviado" class="form-control" >
                            </th>
                            <th>
                                <label for="update_fecha_pro_cobro">Fecha Programada Cobro</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_pro_cobro" id="update_fecha_pro_cobro" class="form-control" >
                            </th>
                            
                        </tr>
                        <tr>
                            <th>
                                <label for="update_fecha_cobro">Fecha Cobro</label>
                            </th>
                            <th>
                                <input type="date" name="update_fecha_cobro" id="update_fecha_cobro" class="form-control">
                            </th>
                            <th>
                                <label for="update_monto_cobro">Monto Cobro</label>
                            </th>
                            <th>
                                <input type="text" name="update_monto_cobro" id="update_monto_cobro" class="form-control" readonly="readonly">
                            </th>
                            <th>
                                <label for="update_estado_cobro">Estado Cobro</label>
                            </th>
                            <th>
                                <select name="update_estado_cobro" id='update_estado_cobro'>  
                                    <option value="PENDIENTE">PENDIENTE</option>  
                                    <option value="COBRADO">COBRADO</option>  
                                </select> 
                            </th>
                        </tr>
                    </table>                    
                    <input type="submit" name="update_cobro" id="update_personal" Value="Actualizar" class="btn btn-primary">
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
                <form action="panel.php?modulo=cobros" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Cobro?</label>
                        <input type="text" name="delete_nombre" id="delete_nombre" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_cobro" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>