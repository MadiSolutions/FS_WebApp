<?php
require_once 'clases/clsMisResultados.php';

if (isset($_POST['update_misresultados'])) {
    //pfd
    $flag=0;
    $dir = "resultados/pdfs/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_resultadopdf']['name'];
    $arregloArchivo = explode(".", $_FILES['update_resultadopdf']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_resultadopdf']['tmp_name'], $dir.$_POST['update_detalle'].'_'.$_POST['update_dni_paciente'].'_'.$_POST['update_fecha'].'.pdf')) {
            $flag=1;
        }
    }else{
        $ruta_cargapdf='';
    }
    // zip
    $flagzip=0;
    $dirzip = "resultados/imagenes/";
    $permitidoszip = array('zip'); //Archivos permitido
    $ruta_cargazip = $dir . $_FILES['update_resultadozip']['name'];
    $arregloArchivozip = explode(".", $_FILES['update_resultadozip']['name']);
	$extensionzip = strtolower(end($arregloArchivozip));
    $totalzip=$dirzip.$_POST['update_detalle'].'_'.$_POST['update_dni_paciente'].'_'.$_POST['update_fecha'].'.zip';
    if (in_array($extensionzip, $permitidoszip)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_resultadozip']['tmp_name'], $dirzip.$_POST['update_detalle'].'_'.$_POST['update_dni_paciente'].'_'.$_POST['update_fecha'].'.zip')) {
            $flagzip=1;
        }
    }else{
        $ruta_cargazip='';
    }


    $miresultado = new MisResultados($_POST['update_cod_examen'], $_POST['update_tipo_examen'], $_POST['update_detalle'], $_POST['update_fecha'], $_POST['update_dni_paciente'], $_POST['update_dni_responsable'],$flag,$dir.$_POST['update_detalle'].'_'.$_POST['update_dni_paciente'].'_'.$_POST['update_fecha'].'.pdf',$flagzip,$totalzip);
    $miresultado->Modificar($con);
} else if (isset($_POST['add_misresultados'])) {
    //bandera de pdf
    $flag=0;
    $dir = "resultados/pdfs/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_resultadopdf']['name'];
    $arregloArchivo = explode(".", $_FILES['add_resultadopdf']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_resultadopdf']['tmp_name'], $dir.$_POST['add_detalle'].'_'.$_POST['add_dni_paciente'].'_'.$_POST['add_fecha'].'.pdf')) {
            $flag=1;
        }
    }
// bandera de zip
    $flagzip=0;
    $dirzip = "resultados/imagenes/";
    $permitidoszip = array('zip'); //Archivos permitido
    $ruta_cargazip = $dirzip . $_FILES['add_resultadozip']['name'];
    $arregloArchivozip = explode(".", $_FILES['add_resultadozip']['name']);
	$extensionzip = strtolower(end($arregloArchivozip));
    $totalzip=$dirzip.$_POST['add_detalle'].'_'.$_POST['add_dni_paciente'].'_'.$_POST['add_fecha'].'.zip';
    if (in_array($extensionzip, $permitidoszip)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_resultadozip']['tmp_name'], $dirzip.$_POST['add_detalle'].'_'.$_POST['add_dni_paciente'].'_'.$_POST['add_fecha'].'.zip')) {
            $flagzip=1;
        }
    }
    $miresultado = new MisResultados($_POST['add_cod_examen'],$_POST['add_tipo_examen'], $_POST['add_detalle'], $_POST['add_fecha'], $_POST['add_dni_paciente'], $_POST['add_dni_responsable'],$flag,$dir.$_POST['add_detalle'].'_'.$_POST['add_dni_paciente'].'_'.$_POST['add_fecha'].'.pdf',$flagzip,$totalzip);
    $miresultado->Agregar($con);
} else if(isset($_POST['delete_misresultados'])){
    $miresultado = new MisResultados($_POST['delete_cod_examen'], '', '', '', '', '','','','','');
    $miresultado->Eliminar($con);
}

$query = "SELECT cod_examen,c.codigo,c.descripcion as tipo_examen,detalle ,d.nombre as nom_paciente,d.dni as dni_paciente,fecha,a.nombre as nombre_responsable,a.dni as dni_responsable,url_resultado,url_imagen FROM (select * from usuarios where tipo_user!='3') as a join (SELECT * from resultados where estado_examen=1) as b JOIN (SELECT * FROM tipo_examen)AS c join (select * from usuarios WHERE tipo_user='3') as d on a.dni=b.dni_responsable and b.tipo_examen=c.codigo and d.dni=b.dni_paciente;";
$res = mysqli_query($con, $query);

$query2 = "SELECT * from tipo_examen where estado=1;";
$res2=mysqli_query($con, $query2);
$query2b = "SELECT * from tipo_examen where estado=1;";
$res2b=mysqli_query($con, $query2b);

$query3 = "SELECT * from usuarios where tipo_user='3' and estado=1;";
$res3=mysqli_query($con, $query3);
$query3b = "SELECT * from usuarios where tipo_user='3' and estado=1;";
$res3b=mysqli_query($con, $query3b);

$query4 = "SELECT * from usuarios where tipo_user!='3' and estado=1;";
$res4=mysqli_query($con, $query4);
$query4b = "SELECT * from usuarios where tipo_user!='3' and estado=1;";
$res4b=mysqli_query($con, $query4b);

require('views/misresultados.view.php');

