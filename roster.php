<?php
require_once 'clases/clsPacientes.php';
//$fecha_actual=$_POST["fecha"];
$fecha_actual=$_GET["fecha"];



$fecha_array = preg_split('~-~', $fecha_actual);
$anioActual = $fecha_array[0];
$mesActual = $fecha_array[1];
$cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);

$cont=1;
$comple_query1='';
$comple_query2='';
while($cont<=$cantidadDias){
    if($cont>0 && $cont<10){$cont="0".$cont;}
    $comple_query1=$comple_query1."b.y".$anioActual."m".$mesActual."d".$cont.",";
    $comple_query2=$comple_query2."(sum(case when fecha='".$anioActual."-".$mesActual."-".$cont."' THEN '1' ELSE '0' END)) AS y".$anioActual."m".$mesActual."d".$cont.",";
    $cont++;
}

$query="(SELECT a.dni,a.nombres,a.cargo,e.tipo_servicio,b.hora,".$comple_query1."d.razon_social,c.fecha_inicio from (select * from personal where estado='1') as a join (select dni,hora,".$comple_query2."tipo_marcacion FROM marcacion_android where tipo_marcacion='INICIO_DIA'group by dni) AS b join (select * from asignaciones_operacion where estado=1)as c join (select * from clientes where estado=1)as d join (select * from jornadas where estado=1)as e ON a.dni=b.dni and b.dni=c.dni and c.jornada=e.cod_servicio and c.cliente=d.cod_cliente);";
$res = mysqli_query($con, $query);

//meses con registros
$query2="SELECT SUBSTRING_INDEX(fecha,'-',2)as am FROM marcacion_android group by am order by am;";
$res2 = mysqli_query($con,$query2);

require('views/roster.view.php');
