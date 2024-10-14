<?php
require_once 'clases/clsJornadas.php';

if (isset($_POST['update_jornada'])) {
    $jornada = new Jornada($_POST['update_cod_servicio'], $_POST['update_tipo_servicio'], $_POST['update_descripcion_servicio'],1);
    $jornada->Modificar($con);
} else if (isset($_POST['add_jornada'])) {
    $jornada = new Jornada(' ', $_POST['add_tipo_servicio'], $_POST['add_descripcion_servicio'],1);
    $jornada->Agregar($con);
} else if(isset($_POST['delete_jornada'])){
    $jornada = new Jornada($_POST['delete_cod_servicio'], '', '', '');
    $jornada->Eliminar($con);
}

$query = "SELECT * from jornadas where estado=1;";
$res = mysqli_query($con, $query);

require('views/jornadas.view.php');
