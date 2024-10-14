<?php
    date_default_timezone_set('America/Lima');
    $hoy=date("Y-m-d"); 
    $user=$_SESSION['usuario'];
    ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Operaciones => Mantenimientos</h1>
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
                        Agregar Nuevo Mantenimiento
                    </button>
                    
                    <div class="table-responsive">         
                    <table id="example2" class="table table-bordered table-hover" style="text-align:center;">
                        <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th></th>
                                    <th>Fecha</th>
                                    <th>Unidad</th>
                                    <th>Km Ingreso</th>
                                    <th>Km Actual</th>
                                    <th>Tipo Mantenimiento</th>
                                    <th>Motivo</th>
                                    <th>Detalle</th>
                                    <th>Acciones</th>
                                </tr>
                        </thead>
                            <tbody>
                                <?php
                                $num_registro=1;
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $num_registro ?></td>
                                        <td><?php echo $row['fecha'] ?></td>
                                        <td><?php echo $row['placa'] ?></td>
                                        <td><?php echo $row['km_inicial'] ?></td>
                                        <td><?php echo $row['km_actual'] ?></td>
                                        <td><?php echo $row['tipo_mantenimiento'] ?></td>
                                        <td><?php echo $row['motivo_mantenimiento'] ?></td>
                                        <td><button type="button" class="btn btn-primary" onclick="ObtenerListaDetalleMantenimiento('<?= $row['id_mantenimiento']?>')"><li class="fa fa-search"></li></button></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id_mantenimiento').value ='<?= $row['id_mantenimiento'] ?>';document.getElementById('delete_descripcion').value = '<?= $row['placa'] ?>';" title="Eliminar Mantenimiento"><img src="images/eliminar_icono.png" width="30" /></a>
                                        </td>
                                    </tr>
                                    
                                <?php $num_registro++;endwhile; ?>
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nueva Mantenimiento</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=mantenimientos" id="ingresar" method="POST">
                <input type="hidden" name="add_user" id="add_user" value="<?php echo $user;?>">
                <table id="example2" class="table table-bordered table-hover">
                    <tr>
                        <td colspan="2">
                                <label for="add_fecha">Fecha Mantenimiento</label>
                        </td>
                        <td colspan="2">
                            <input type="date" name="add_fecha" id="add_fecha" class="form-control" required="required" value=<?php echo $hoy; ?> readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td>
                                <label for="add_cod_vehiculo">Vehiculo:</label>
                        </td>
                        <td>
                                <select style="width:100%;border:3px solid #04467E" name="add_cod_vehiculo" id='add_cod_vehiculo' required="required">  
                                <?php
                                    while ($row = mysqli_fetch_assoc($resunidades)) :
                                ?>
                                    <option value=<?php echo $row['cod_vehiculo'];?>><?php echo $row['placa'];?> </option>  
                                <?php endwhile; ?>
                                </select>
                        </td>
                        <td>
                                <label for="add_km_actual">KM Actual:</label><br>
                        </td>
                        <td>
                                <input type="text" name="add_km_actual" id="add_km_actual" class="form-control" required="required" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                                <label for="add_tipo_mantenimiento">Tipo Mantenimiento</label>
                        </td>
                        <td>
                                <select style="width:100%;border:1px solid #04467E" name="add_tipo_mantenimiento" id='add_tipo_mantenimiento' required="required">  
                                    <option value="PREVENTIVO">PREVENTIVO</option>  
                                    <option value="CORRECTIVO">CORRECTIVO</option>
                                </select>
                        </td>
                        <td>
                                <label for="add_motivo_mantenimiento">Motivo Mantenimiento</label>
                        </td>
                        <td>
                            <input type="text" name="add_motivo_mantenimiento" id="add_motivo_mantenimiento" class="form-control" required="required" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="add_fecha_inicio_mantenimiento">Fecha Inicio</label>
                        </td>
                        <td>
                            <input type="date" name="add_fecha_inicio_mantenimiento" id="add_fecha_inicio_mantenimiento" class="form-control" required="required" >
                        </td>
                        <td>
                                <label for="add_fecha_fin_mantenimiento">Fecha Fin</label>
                        </td>
                        <td>
                            <input type="date" name="add_fecha_fin_mantenimiento" id="add_fecha_fin_mantenimiento" class="form-control" required="required" >
                        </td>
                    </tr>
                    </table>
                    <label>Detalle</label>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td >
                                <input type="text" name="descripcion_servicio" id="descripcion_servicio" class="form-control"/>
                            </td>             
                            <td>
                                <input type="number" name="costo_servicio" id="costo_servicio" class="form-control"  >
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" onclick="AgregarMantenimiento()">+</li></button>
                            </td>
                        </tr>
                    </table>
                    <div class="col-12" id="div_mantenimientosenlista"></div>
                    <input type="submit" name="add_mantenimiento" Value="Registrar" class="btn btn-primary">
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
            <h4 class="modal-title" id="defaultModalLabel">Detalle Mantenimiento</h4>
            </div>
            <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="update_id_mantenimiento">Id Mantenimiento</label>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="update_id_mantenimiento" id="update_id_mantenimiento" class="form-control" required="required" readonly="readonly">
                        </td>
                    </tr>
                    </table>
                    <label for="lista_mantenimiento">Detalle</label>
                    <div class="col-12" id="div_mantenimiento_lista"></div>
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
                <form action="panel.php?modulo=mantenimientos" method="POST">
                    <input type="hidden" name="delete_id_mantenimiento" id="delete_id_mantenimiento" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar el mantenimiento de...?</label>
                        <input type="text" name="delete_descripcion" id="delete_descripcion" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_mantenimiento" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>

function ObtenerListaDetalleMantenimiento(id_mantenimiento) {
    $('#EditModal').modal();
    document.getElementById('update_id_mantenimiento').value =id_mantenimiento;
    $.ajax({
          method: "POST",
          url: 'controllers/ctrMantenimiento.php',
          data: {
              "accion": "LIST_DETALLE_MANTENIMIENTOF",
              "referencia": id_mantenimiento
            }
      })
      .done(function( retorno ) {
            $("#div_mantenimiento_lista").html(retorno);
      });   

}

    function AgregarMantenimiento(){
      $.ajax({
          method: "POST",
          url: 'controllers/ctrMantenimiento.php',
          data: {
          	  "accion": "ADD_MANTENIMIENTO",
              "descripcion": $("#descripcion_servicio").val(),
              "costo": $('#costo_servicio').val()
            }
      })
      .done(function( retorno ) {
            ListarCarritoMantenimientos();
            document.getElementById('descripcion_servicio').value ='';
            document.getElementById('costo_servicio').value ='';
      });  		
}

  function ListarCarritoMantenimientos(){
      $.ajax({
          method: "POST",
          url: 'controllers/ctrMantenimiento.php',
          data: {
              "accion": "LIST_MANTENIMIENTOS"
            }
      })
      .done(function( retorno ) {
            $("#div_mantenimientosenlista").html(retorno);
      });     
  }
  function EliminarItemMantenimiento(item){
      $.ajax({
          method: "POST",
          url: 'controllers/ctrMantenimiento.php',
          data: {
              "accion": "ELIM_MANTENIMIENTO",
              "item": item,
            }
      })
      .done(function( retorno ) {
        ListarCarritoMantenimientos();
      });
}
</script>