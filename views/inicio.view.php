<?php 
  date_default_timezone_set('America/Lima');
  $user=$_SESSION['usuario'];
  $tipo_user=$_SESSION['tipo_user'];
  $hoy=date("Y-m-d");

  $precioCompra='';
  $precioVenta='';

  $querydolar = "SELECT * from tipo_cambio where fecha='$hoy' LIMIT 1;";
  $consulta=mysqli_query($con,$querydolar);
  $row_cnt = $consulta->num_rows;
  $array = mysqli_fetch_array($consulta);
  if($row_cnt>0){
    $precioCompra=$array['compra'];
    $precioVenta=$array['venta'];
    
  }
  else{
    //$token = 'apis-token-7073.kn88xDMWw7oGOfVDG4FHvew6lBAltJid';
  	$token='apis-token-8078.ziz4AU7QrC4ZQXVAggMv8rUPFbaqbWKA';  
  $fecha = $hoy;
    $curl = curl_init();

    curl_setopt_array($curl, array(
  // para usar la api versión 2
      CURLOPT_URL => 'https://api.apis.net.pe/v2/sunat/tipo-cambio?date='.$fecha,
  // para usar la api versión 1
  // CURLOPT_URL => 'https://api.apis.net.pe/v1/tipo-cambio-sunat?fecha='.$fecha,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 2,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Referer: https://apis.net.pe/tipo-de-cambio-sunat-api',
        'Authorization: Bearer ' . $token
      ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
// Datos listos para usar
    $tipoCambioSunat = json_decode($response);
    $precioCompra=$tipoCambioSunat->precioCompra;
    $precioVenta=$tipoCambioSunat->precioVenta;

    $queryinsert="INSERT INTO tipo_cambio(fecha, compra, venta) VALUES ('$fecha','$precioCompra','$precioVenta')";
    $exe = mysqli_query($con, $queryinsert);
    if ($exe !== false) {
        MensajeExitoso("Tipo Cambio Actualizado");
    } else {
        //MensajeError($modificar);
        MensajeError("Tipo Cambio no Actualizado");
    }
  }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $titulo; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <div class="content">
      <div class="row">
                    <?php
	if($tipo_user=='ADMIN' || $tipo_user=='FINANZAS' ){
                        ?>
        <div class="col-md-3">
          <a href="panel.php?modulo=vencdoc_vehiculos">
          <div class="card card-primary ">
            <div class="card-header">
              <button type="button" class="btn btn-block btn-primary btn-lg"><i class="ion ion-model-s"></i>&nbsp;&nbsp;&nbsp;Vehiculos Activos: <?php while ($row = mysqli_fetch_assoc($res)) : echo $row['tot_vehiculos'];endwhile; ?></button>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
                <!-- /.card-tools -->
            </div>
              <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-block btn-danger"><?php echo $doc_vencidosv; ?> Documentos Vencidos</button>
              <button type="button" class="btn btn-block btn-warning"><?php echo $doc_porvencerv; ?> Documentos Por Vencer</button>
              <button class="btn btn-block btn-success"><?php echo $doc_activov; ?> Documentos Vigentes</button>
            </div>
              <!-- /.card-body -->
          </div>
          </a>
            <!-- /.card -->
        </div>

        <div class="col-md-3">
        <a href="panel.php?modulo=vencdoc_personal">
          <div class="card card-success">
            <div class="card-header">
              <button type="button" class="btn btn-block btn-success btn-lg"><i class="ion ion-person"></i></i>&nbsp;&nbsp;&nbsp;Personal Activo: <?php while ($row = mysqli_fetch_assoc($res2)) : echo $row['tot_personal']; endwhile; ?></button>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
                <!-- /.card-tools -->
            </div>
              <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-block btn-danger"><?php echo $doc_vencidos; ?> Documentos Vencidos</button>
              <button type="button" class="btn btn-block btn-warning"><?php echo $doc_porvencer; ?> Documentos Por Vencer</button>
              <button class="btn btn-block btn-success"><?php echo $doc_activo; ?> Documentos Vigentes</button>
            </div>
              <!-- /.card-body -->
          </div>
        </a>
      </div>
<?php } ?>
          <div class="col-md-6">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-exclamation-triangle"></i>
                  Tareas Pendientes
                </h3>
              </div>
              <!-- /.card-header -->
              <a href="panel.php?modulo=tareas">
              <div class="card-body">
                <?php
                  $querytareas = "SELECT a.*,b.nombres,b.dni FROM (SELECT * from tareas where asignada_a='$tipo_user' AND estado=1 order by fecha_vencimiento asc)AS a join (select * from personal where estado=1)as b on a.asignada_por=b.dni; ";
                  $restareas = mysqli_query($con, $querytareas);
                  $row_cnt = $restareas->num_rows;
                  if($row_cnt>0){
                    while ($row = mysqli_fetch_assoc($restareas)) :
                      $old_date = new DateTime();
                      $new_date = new DateTime($row['fecha_vencimiento']);
                      $diff = $old_date->diff($new_date);
                      $diff =$diff->format('%R%a');
                      if($diff<0 && $row['estado_tarea']=='ACEPTADO' ){
                        ?>
                        <div class="alert alert-success alert-dismissible"> 
                          <h5><i class="icon fas fa-check"></i> Tarea Aceptada</h5>
                          Descripcion: <?php echo $row['descripcion']; ?><br>
                          Fecha Vencimiento: <?php echo $row['fecha_vencimiento']; ?><br>
                          Asignada por: <?php echo $row['nombres']; ?>
                        </div>
                      <?php 
                      }else if($diff<0 && $row['estado_tarea']!='ACEPTADO' ){
                        ?>
                        <div class="alert alert-danger alert-dismissible"> 
                          <h5><i class="icon fas fa-check"></i> Tarea Vencida</h5>
                          Descripcion: <?php echo $row['descripcion']; ?><br>
                          Fecha Vencimiento: <?php echo $row['fecha_vencimiento']; ?><br>
                          Asignada por: <?php echo $row['nombres']; ?>
                        </div>
                      <?php 
                      }
                      if($diff>=0 && $diff<=3 && $row['estado_tarea']!='ACEPTADO'){
                        ?>
                        <div class="alert alert-warning alert-dismissible">
                          <h5><i class="icon fas fa-exclamation-triangle"></i> Pronto Vencimiento</h5>
                          Descripcion: <?php echo $row['descripcion']; ?><br>
                          Fecha Vencimiento: <?php echo $row['fecha_vencimiento']; ?><br>
                          Asignada por: <?php echo $row['nombres']; ?>   
                        </div>
                      <?php
                      }
                  	if($diff>=0 && $diff<=3 && $row['estado_tarea']=='ACEPTADO'){
                        ?>
                        <div class="alert alert-success alert-dismissible">
                          <h5><i class="icon fas fa-exclamation-triangle"></i> Tarea Aceptada</h5>
                          Descripcion: <?php echo $row['descripcion']; ?><br>
                          Fecha Vencimiento: <?php echo $row['fecha_vencimiento']; ?><br>
                          Asignada por: <?php echo $row['nombres']; ?>   
                        </div>
                      <?php
                      }
                      if($diff>3 && $row['estado_tarea']!='ACEPTADO'){
                        ?>
                        <div class="alert alert-success alert-dismissible">
                          <h5><i class="icon fas fa-check"></i> Con Tiempo Disponible</h5>
                          Descripcion: <?php echo $row['descripcion']; ?><br>
                          Fecha Vencimiento: <?php echo $row['fecha_vencimiento']; ?><br>
                          Asignada por: <?php echo $row['nombres']; ?>
                        </div>
                      <?php
                      }
                      if($diff>3 && $row['estado_tarea']=='ACEPTADO'){
                        ?>
                        <div class="alert alert-success alert-dismissible">
                          <h5><i class="icon fas fa-check"></i> Tarea Aceptada</h5>
                          Descripcion: <?php echo $row['descripcion']; ?><br>
                          Fecha Vencimiento: <?php echo $row['fecha_vencimiento']; ?><br>
                          Asignada por: <?php echo $row['nombres']; ?>
                        </div>
                      <?php
                      }
                    endwhile; 
                  } 
                  else{
                    ?>
                    <div class="alert alert-success alert-dismissible">
                      <h5><i class="icon fas fa-check"></i> Felicitaciones!</h5>
                            Lista de Tareas Vacia
                      </div>
                  <?php
                  }?>   
              </div>
              </a>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>   



            <!-- /.card -->
        </div>
        
      </div>
      <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SUNAT - Tipo de Cambio <?php echo $hoy; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <a href="panel.php?modulo=tipo_cambio">
        <div class="row">
        
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><img src="images/logo_dolar.png" width="40" /></span>
              <div class="info-box-content">
                <span class="info-box-text">Compra</span>
                <span class="info-box-number">
                  <?php echo ($precioCompra); ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><img src="images/logo_dolar.png" width="40" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Venta</span>
                <span class="info-box-number"><?php echo ($precioVenta); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          </div>
        </a>
        
      </div>
    </section>




    </div>


    
</div>