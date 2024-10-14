<?php

require_once 'clases/clsVencdoc_Vehiculos.php';
$user = $_SESSION['usuario'];

if (isset($_POST['update_vencdoc_vehiculos'])) {
    //soat
    $flag1=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_soat']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_soat']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_soat']['tmp_name'], $dir.'SOAT'.'_'.$_POST['update_placa'].'_'.$_POST['update_soat'].'.pdf')) {
            $flag1=1;
        }
    }
    //poliza
    $flag2=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_poliza']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_poliza']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_poliza']['tmp_name'], $dir.'POLIZA'.'_'.$_POST['update_placa'].'_'.$_POST['update_poliza'].'.pdf')) {
            $flag2=1;
        }
    }
    //polizaMERCANCIA
    $flag3=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_polizamercancia']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_polizamercancia']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_polizamercancia']['tmp_name'], $dir.'POLIZAMERCANCIA'.'_'.$_POST['update_placa'].'_'.$_POST['update_poliza_mercancia'].'.pdf')) {
            $flag3=1;
        }
    }
    //REVISIONTECNICA
    $flag4=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_revisiontecnica']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_revisiontecnica']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_revisiontecnica']['tmp_name'], $dir.'REVISIONTECNICA'.'_'.$_POST['update_placa'].'_'.$_POST['update_rev_tecnica'].'.pdf')) {
            $flag4=1;
        }
    }
    //gps
    $flag5=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_gps']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_gps']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_gps']['tmp_name'], $dir.'GPS'.'_'.$_POST['update_placa'].'_'.$_POST['update_gps'].'.pdf')) {
            $flag5=1;
        }
    }
    //TUC
    $flag7=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_tuc']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_tuc']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_tuc']['tmp_name'], $dir.'TUC'.'_'.$_POST['update_placa'].'_'.$_POST['update_tuc'].'.pdf')) {
            $flag7=1;
        }
    }
    //CERT MATPEL
    $flag8=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_certmatpel']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_certmatpel']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_certmatpel']['tmp_name'], $dir.'CERTMATPEL'.'_'.$_POST['update_placa'].'_'.$_POST['update_cert_matpel'].'.pdf')) {
            $flag8=1;
        }
    }
    //  homologacion vehicular
    $flag9=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_homovehicular']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_homovehicular']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_homovehicular']['tmp_name'], $dir.'HOMOVEHICULAR'.'_'.$_POST['update_placa'].'_'.$_POST['update_homo_vehicular'].'.pdf')) {
            $flag9=1;
        }
    }
    // CERT OPERATIVIDAD
    $flag11=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_certoperatividad']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_certoperatividad']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_certoperatividad']['tmp_name'], $dir.'CERTOPERATIVIDAD'.'_'.$_POST['update_placa'].'_'.$_POST['update_cert_operatividad'].'.pdf')) {
            $flag11=1;
        }
    }
    //EXTINTOR
    $flag12=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_extintor']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_extintor']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_extintor']['tmp_name'], $dir.'EXTINTOR'.'_'.$_POST['update_placa'].'_'.$_POST['update_extintor'].'.pdf')) {
            $flag12=1;
        }
    }
    //cert tacos
    $flag13=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_certtacos']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_certtacos']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_certtacos']['tmp_name'], $dir.'CERTTACOS'.'_'.$_POST['update_placa'].'_'.$_POST['update_cert_tacos'].'.pdf')) {
            $flag13=1;
        }
    }
    //CHECKLIST
    $flag14=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_checklist']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_checklist']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_checklist']['tmp_name'], $dir.'CHECKLIST'.'_'.$_POST['update_placa'].'_'.$_POST['update_checklist'].'.pdf')) {
            $flag14=1;
        }
    }
    $vencdoc_vehiculo = new Vencdoc_Vehiculo($_POST['update_cod_vehiculo'],$_POST['update_soat'],$_POST['update_poliza'],$_POST['update_poliza_mercancia'],
    $_POST['update_rev_tecnica'],$_POST['update_venc_rev_tecnica'],$_POST['update_gps'],$_POST['update_tuc'],$_POST['update_venc_tuc'],$_POST['update_cert_matpel'],
    $_POST['update_venc_cert_matpel'],$_POST['update_homo_vehicular'],$_POST['update_cert_operatividad'],$_POST['update_extintor'],$_POST['update_cert_tacos'],$_POST['update_checklist'],$user);
    $vencdoc_vehiculo->Modificar($con);
} 
$query = "select a.*,b.nombres from(SELECT * from vehiculos where estado='1')as a join (select * from personal where estado='1')as b on a.recepcionado_por=b.dni;";
$res = mysqli_query($con, $query);

require('views/vencdoc_vehiculos.view.php');
