<?php
require_once 'clases/clsAsignacion_personal.php';

if (isset($_POST['update_asig_operacion'])) {
    $asig_operacion = new Asig_operacion($_POST['update_cod_asig_operacion'], '', $_POST['update_cod_servicio'], $_POST['update_cod_cliente'],'1');
    $asig_operacion->Modificar($con);
} else if (isset($_POST['add_asig_operacion'])) {
    $asig_operacion = new Asig_operacion('',$_POST['add_dni'], $_POST['add_jornada'], $_POST['add_cliente'],1);
    $asig_operacion->Agregar($con);
} else if(isset($_POST['delete_asig_operacion'])){
    $asig_operacion = new Asig_operacion($_POST['delete_cod_asig_operacion'], '', '', '', '', '', '');
    $asig_operacion->Eliminar($con);
}
//sentencia para lista clientes
$query = "select ao.cod_asig_operacion,p.dni,p.nombres,j.cod_servicio,j.tipo_servicio,j.descripcion_servicio,c.cod_cliente,c.ruc,c.razon_social,ao.fecha_inicio from (select * from jornadas where estado=1) as j join (select * from personal where estado=1)as p join (select * from clientes where estado=1) as c join (select * from asignaciones_operacion where estado=1)as ao on ao.dni=p.dni and ao.cliente=c.cod_cliente and ao.jornada=j.cod_servicio;";
$res = mysqli_query($con, $query);

//sentencia para lista de servicios/jornadas
$query2 = "select * from jornadas where estado=1;";
$res2 = mysqli_query($con,$query2);

//sentencia para lista de clientes
$query3 = "select * from clientes where estado=1;";
$res3 = mysqli_query($con,$query3);

//sentencia para lista de personal
$query4 = "select * from personal where estado=1;";
$res4 = mysqli_query($con,$query4);

//sentencia para lista de servicios/jornadas
$query5 = "select * from jornadas where estado=1;";
$res5 = mysqli_query($con,$query5);

//sentencia para lista de clientes
$query6 = "select * from clientes where estado=1;";
$res6 = mysqli_query($con,$query6);





require('views/asignacion_personal.view.php');
