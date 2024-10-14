
<?php 
    $fecha_actual=$_GET["fecha"]; 
    $fecha_array = preg_split('~-~', $fecha_actual);
    $mes_letra='';
    switch ($fecha_array[1]) {
        case 1:
            $mes_letra="Enero";
            break;
        case 2:
            $mes_letra="Febrero";
            break;
        case 3:
            $mes_letra="Marzo";
            break;
        case 4:
            $mes_letra="Abril";
            break;
        case 5:
            $mes_letra="Mayo";
            break;
        case 6:
            $mes_letra="Junio";
            break;
        case 7:
            $mes_letra="Julio";
            break;
        case 8:
            $mes_letra="Agosto";
            break;
        case 9:
            $mes_letra="Septiembre";
            break;
        case 10:
            $mes_letra="Octubre";
            break;
        case 11:
            $mes_letra="Noviembre";;
            break;
        case 12:
            $mes_letra="Diciembre";
            break;
    }
    $anioActual = $fecha_array[0];
    $mesActual = $fecha_array[1];
    $cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
    $contdiastrabajados=0;
    $contdiasnotrabajados=0;
    $hoy = date("Y-m");
    $fecha_base_proyectado = preg_split('~-~', $hoy);
    $mes_ini=$fecha_base_proyectado[1];
    $anio_ini=$fecha_base_proyectado[0];
    $opciones='';
    switch($mes_ini){
        case 01:
            $anio_ini=$fecha_base_proyectado[0]-1;
            $opciones="<option value='".$anio_ini."-11'>".$anio_ini."-11"."</option> "."<option value='".$anio_ini."-12'>".$anio_ini."-12"."</option> "."<option value='".$hoy."' selected>".$hoy."</option> "."<option value='".$fecha_base_proyectado[0]."-02'>".$fecha_base_proyectado[0]."-02</option> "."<option value='".$fecha_base_proyectado[0]."-03'>".$fecha_base_proyectado[0]."-03</option> ";
            break;
        case 02:
            $anio_ini=$fecha_base_proyectado[0]-1;
            $opciones="<option value='".$anio_ini."-12'>".$anio_ini."-12</option> "."<option value='".$fecha_base_proyectado[0]."-01'>".$fecha_base_proyectado[0]."-01</option> "."<option value='".$hoy."' selected>".$hoy."</option> "."<option value='".$fecha_base_proyectado[0]."-03'>".$fecha_base_proyectado[0]."-03</option> "."<option value='".$fecha_base_proyectado[0]."-04'>".$fecha_base_proyectado[0]."-04</option> ";
            break;
        case 11:
            $anio_ini=$fecha_base_proyectado[0]+1;
            $opciones="<option value='".$fecha_base_proyectado[0]."-09'>".$fecha_base_proyectado[0]."-09</option> "."<option value='".$fecha_base_proyectado[0]."-10'>".$fecha_base_proyectado[0]."-10</option> "."<option value='".$hoy."' selected>".$hoy."</option> "."<option value='".$fecha_base_proyectado[0]."-12'>".$fecha_base_proyectado[0]."-12</option> "."<option value='".$anio_ini."-01'>".$fecha_base_proyectado[0]."-01</option> ";
            break;
        case 12:
            $anio_ini=$fecha_base_proyectado[0]+1;
            $opciones="<option value='".$fecha_base_proyectado[0]."-10'>".$fecha_base_proyectado[0]."-10</option> "."<option value='".$fecha_base_proyectado[0]."-11'>".$fecha_base_proyectado[0]."-11</option> "."<option value='".$hoy."' selected>".$hoy."</option> "."<option value='".$anio_ini."-01'>".$anio_ini."-01</option> "."<option value='".$anio_ini."-02'>".$anio_ini."-02</option> ";
            break;
        default:
            $mes_a=$fecha_base_proyectado[1]-2;
            $mes_b=$fecha_base_proyectado[1]-1;
            $mes_c=$fecha_base_proyectado[1]+2;
            $mes_d=$fecha_base_proyectado[1]+1;
            $opciones="<option value='".$fecha_base_proyectado[0]."-".$mes_a."'>".$fecha_base_proyectado[0]."-".$mes_a."</option> "."<option value='".$fecha_base_proyectado[0]."-".$mes_b."'>".$fecha_base_proyectado[0]."-".$mes_b."</option> "."<option value='".$hoy."' selected>".$hoy."</option> "."<option value='".$fecha_base_proyectado[0]."-".$mes_d."'>".$fecha_base_proyectado[0]."-".$mes_d."</option> "."<option value='".$fecha_base_proyectado[0]."-".$mes_c."'>".$fecha_base_proyectado[0]."-".$mes_c."</option> ";
            break;
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Roster <?php echo $mes_letra; ?></h1>
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
                        <form action="panel.php?modulo=roster" id="ingresar" method="GET">
                            <input type="hidden" name="modulo" id="update_user" value="roster">
                            <table>
                                <tr>
                                    <td>
                                        <p><center>Seleccione Fecha: &emsp;</center></p>
                                    </td>
                                    <td>
                                        <select name="fecha" id='fecha' required="required" style="width:100px">
                                        <?php
                                                echo $opciones;
                                        ?>   
                                        </select>
                                    </td>
                                    <td>
                                        &emsp;
                                        <input type="submit" class="btn btn-primary">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="background-color:#2D81F3;color:#ffffff"><center>DNI</center></th>
                                    <th style="background-color:#2D81F3;color:#ffffff"><center>Nombre</center></th>
                                    <th style="background-color:#2D81F3;color:#ffffff"><center>Cargo</center></th>
                                    <th style="background-color:#2D81F3;color:#ffffff"><center>Regimen</center></th>
                                    <th style="background-color:#2D81F3;color:#ffffff"><center>Cliente</center></th>
                                    <?php
                                        $contador_dias=01;
                                        while ($contador_dias<=$cantidadDias){
                                            if($contador_dias>0 && $contador_dias<10){$contador_dias="0".$contador_dias;}
                                            echo ("<th style='background-color:#2D81F3;color:#ffffff'><center>".$anioActual."-".$mesActual."-".$contador_dias."</th>");
                                            $contador_dias++;
                                        }?>
                                    <th style="background-color:#2D81F3;color:#ffffff"><center>Dias Trabajados</center></th>
                                    <th style="background-color:#2D81F3;color:#ffffff"><center>Dias Descanso</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) : $contdiasnotrabajados=0;$contdiastrabajados=0;
                                ?>
                                    <tr>
                                        <th style="font-size:90%;background-color:#E4E5E7"><?php echo $row['dni'] ?></th>
                                        <th style="font-size:90%;background-color:#E4E5E7"><?php echo $row['nombres'] ?></th>
                                        <th style="font-size:90%;background-color:#E4E5E7"><?php echo $row['cargo'] ?></th>
                                        <th style="font-size:90%;background-color:#E4E5E7"><?php echo $row['tipo_servicio'] ?></th>
                                        <th style="font-size:90%;background-color:#E4E5E7"><?php echo $row['razon_social'] ?></th>
                                        <?php
                                            $contador_dia=01; 
                                            while($contador_dia<=$cantidadDias){
                                                if($contador_dia>0 && $contador_dia<10){$contador_dia="0".$contador_dia;}
                                                if($row['y'.$fecha_array[0].'m'.$fecha_array[1].'d'.$contador_dia]=='1'){ $contdiastrabajados++;?>
                                                    <th style="background-color:#2ecc71;color:#ffffff"><?php echo "TRABAJADO";?></th> 
                                                <?php }
                                                else{ $contdiasnotrabajados++;?>
                                                    <th style="background-color:#FA5B5B;color:#ffffff"><?php echo "DESCANSO" ?></th> 
                                                <?php }
                                                $contador_dia++;
                                            }
                                            ?>
                                        <th style="background-color:#81EFF6;color:#000000"><?php echo $contdiastrabajados; ?></th>
                                        <th style="background-color:#81EFF6;color:#000000"><?php echo $contdiasnotrabajados; ?></th>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>               
            </div>
        </div>
    </section>
</div>
<script>
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es-ES',
          initialView: 'dayGridMonth'
        });
        calendar.addEvent({title: 'All Day Event',start: new Date('2023-12-2'),backgroundColor: '#f56954',borderColor:'#f56954',allDay:true});
        //document.addEventListener('DOMContentLoaded', function() {
        calendar.render();
      //});
      

</script>

