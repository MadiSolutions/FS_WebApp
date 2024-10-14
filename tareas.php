<?php
require_once 'clases/clsTareas.php';
$hoy=date("Y-m-d");
if (isset($_POST['update_tarea'])) {
    $flag=0;
    $dir = "documentos/tareas/";
    $permitidos = array('pdf','xls','xlsx'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_archivo_tarea']['name'];
    $arregloArchivo = explode(".", $_FILES['update_archivo_tarea']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_archivo_tarea']['tmp_name'], $dir.'ENTREGABLE_'.$_POST['update_id_tarea'].'_'.$_POST['update_asignada_a'].'_'.$_POST['update_fecha_vencimiento'].$arregloArchivo[1])) {
            $flag=1;
        }
    }


    $tarea = new Tarea($_POST['update_id_tarea'],$_POST['update_fecha_registro'], $_POST['update_fecha_vencimiento'], $_POST['update_descripcion'],$_POST['update_asignada_por'],$_POST['update_asignada_a'],$_POST['update_estado_tarea'],$_POST['update_observacion'],$_POST['update_fecha_endesarrollo'],$_POST['update_fecha_enviadoarevision'],$_POST['update_fecha_calificado']);
    $tarea->Modificar($con);
} else if (isset($_POST['add_tarea'])) {
    $tarea = new Tarea('',$_POST['add_fecha_registro'], $_POST['add_fecha_vencimiento'], $_POST['add_descripcion'],$_POST['add_asignada_por'],$_POST['add_asignada_a'],'ASIGNADA','','','','');
    $tarea->Agregar($con);
} else if(isset($_POST['delete_tarea'])){
    $tarea = new Tarea($_POST['delete_id_tarea'], '', '', '','','','','','','','');
    $tarea->Eliminar($con);
}

$tipo_user=$_SESSION['tipo_user'];
if($_SESSION['tipo_user']=='ADMIN' || $_SESSION['tipo_user']=='GERENCIA' || $_SESSION['tipo_user']=='ADMINISTRADOR'){
    $query = "SELECT a.*,b.nombres,b.dni FROM (SELECT * from tareas where estado=1 order by fecha_vencimiento asc)AS a join (select * from personal where estado=1)as b on a.asignada_por=b.dni;";
}
else{
    $query = "SELECT a.*,b.nombres,b.dni FROM (SELECT * from tareas where estado=1 and asignada_a='$tipo_user'order by fecha_vencimiento asc)AS a join (select * from personal where estado=1)as b on a.asignada_por=b.dni;";
}
$res = mysqli_query($con, $query);

require('views/tareas.view.php');