<?php
require_once 'clases/clsMantenimientos.php';
$hoy=date("Y-m-d");

$carrito_mantenimiento=$_SESSION['carrito_mantenimiento'];


if (isset($_POST['add_mantenimiento'])) {
    $tarea = new Mantenimiento($_POST['add_cod_vehiculo'], $_POST['add_km_actual'], $hoy,$_POST['add_tipo_mantenimiento'],strtoupper($_POST['add_motivo_mantenimiento']),$_POST['add_fecha_inicio_mantenimiento'],$_POST['add_fecha_fin_mantenimiento'],$carrito_mantenimiento);
    $tarea->Agregar($con);

} else if(isset($_POST['delete_mantenimiento'])){
    $tarea = new Mantenimiento($_POST['delete_id_mantenimiento'], '', '', '','','');
    $tarea->Eliminar($con);
}

$tipo_user=$_SESSION['tipo_user'];

$query = "select a.placa,a.tipo_vehiculo,a.color,a.marca,b.* from (select * from vehiculos where estado=1)as a join (SELECT * FROM `mantenimientos` where estado=1 group by id_mantenimiento)as b on a.cod_vehiculo=b.cod_vehiculo order by b.fecha desc; ";
$res = mysqli_query($con, $query);

//lista de unidades activas
$queryunidades = "select * from vehiculos where estado=1; ";
$resunidades = mysqli_query($con, $queryunidades);
////////

require('views/mantenimientos.view.php');