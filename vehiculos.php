<?php
require_once 'clases/clsVehiculo.php';

if (isset($_POST['update_vehiculo'])) {
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
        //gpsMTC
    $flag6=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_gpsmtc']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_gpsmtc']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_gpsmtc']['tmp_name'], $dir.'GPSMTC'.'_'.$_POST['update_placa'].'_'.$_POST['update_gps_mtc'].'.pdf')) {
            $flag6=1;
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
    // IMPLEMENTACION ADAS
    $flag10=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_documento_impleadas']['name'];
    $arregloArchivo = explode(".", $_FILES['update_documento_impleadas']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_documento_impleadas']['tmp_name'], $dir.'ADAS'.'_'.$_POST['update_placa'].'_'.$_POST['update_fecha_implem_adas'].'.pdf')) {
            $flag10=1;
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
    //EQUIPAMENTO
    $flag15=0;
    $hoy = date("Y-m-d");
    $dir = "documentos/vehiculos/";
    $permitidos = array('jpg'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_foto_equipamiento']['name'];
    $arregloArchivo = explode(".", $_FILES['update_foto_equipamiento']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_foto_equipamiento']['tmp_name'], $dir.'EQUIPAMIENTO'.'_'.$_POST['update_placa'].'.jpg')) {
            $flag15=1;
        }
    }

    $vehiculo = new Vehiculo($_POST['update_cod_vehiculo'],$_POST['update_placa'],$_POST['update_tipo_vehiculo'],$_POST['update_cant_ejes'],
    $_POST['update_chasis'],$_POST['update_vin'],$_POST['update_color'],$_POST['update_marca'],
    $_POST['update_cant_pasajeros'],$_POST['update_tipo_neumatico'],$_POST['update_num_aro'],$_POST['update_combustible'],
    $_POST['update_aire_acondicionado'],$_POST['update_tipo_aceite'],$_POST['update_km_actual'],$_POST['update_modelo'],
    $_POST['update_tipo_servicio'],$_POST['update_ano_fabricacion'],$_POST['update_tiempo_trabajo'],$_POST['update_recepcionado_por'],
    $_POST['update_propietario'],$_POST['update_telefono_prop'],$_POST['update_correo_prop'],$_POST['update_soat'],
    '',$_POST['update_poliza'],'',$_POST['update_poliza_mercancia'],
    '',$_POST['update_rev_tecnica'],$_POST['update_venc_rev_tecnica'],    $_POST['update_link_acceso_gps'],
    $_POST['update_empresa_gps'],$_POST['update_gps'],'',$_POST['update_tuc'],
    $_POST['update_venc_tuc'],$_POST['update_gps_mtc'],$_POST['update_cert_matpel'],$_POST['update_venc_cert_matpel'],
    $_POST['update_homo_vehicular'],'',$_POST['update_fecha_implem_adas'],$_POST['update_cert_operatividad'],
    '',$_POST['update_extintor'],'',$_POST['update_cod_radio_base'],
    $_POST['update_cert_tacos'],'',$_POST['update_checklist'],' ',$_POST['update_rb_propietario'],$_POST['update_adas_propietario'],$_POST['update_equipamiento'],'1');
    $vehiculo->Modificar($con);
} else if (isset($_POST['add_vehiculo'])) {

    $flag1=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_soat']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_soat']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_soat']['tmp_name'], $dir.'SOAT'.'_'.$_POST['add_placa'].'_'.$_POST['add_soat'].'.pdf')) {
            $flag1=1;
        }
    }
    //poliza
    $flag2=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_poliza']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_poliza']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_poliza']['tmp_name'], $dir.'POLIZA'.'_'.$_POST['add_placa'].'_'.$_POST['add_poliza'].'.pdf')) {
            $flag2=1;
        }
    }
    //polizaMERCANCIA
    $flag3=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_polizamercancia']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_polizamercancia']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_polizamercancia']['tmp_name'], $dir.'POLIZAMERCANCIA'.'_'.$_POST['add_placa'].'_'.$_POST['add_poliza_mercancia'].'.pdf')) {
            $flag3=1;
        }
    }
    //REVISIONTECNICA
    $flag4=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_revisiontecnica']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_revisiontecnica']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_revisiontecnica']['tmp_name'], $dir.'REVISIONTECNICA'.'_'.$_POST['add_placa'].'_'.$_POST['add_rev_tecnica'].'.pdf')) {
            $flag4=1;
        }
    }
    //gps
    $flag5=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_gps']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_gps']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_gps']['tmp_name'], $dir.'GPS'.'_'.$_POST['add_placa'].'_'.$_POST['add_gps'].'.pdf')) {
            $flag5=1;
        }
    }
        //gpsMTC
    $flag6=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_gpsmtc']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_gpsmtc']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_gpsmtc']['tmp_name'], $dir.'GPSMTC'.'_'.$_POST['add_placa'].'_'.$_POST['add_gps_mtc'].'.pdf')) {
            $flag6=1;
        }
    }
    //TUC
    $flag7=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_tuc']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_tuc']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_tuc']['tmp_name'], $dir.'TUC'.'_'.$_POST['add_placa'].'_'.$_POST['add_tuc'].'.pdf')) {
            $flag7=1;
        }
    }
    //CERT MATPEL
    $flag8=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_certmatpel']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_certmatpel']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_certmatpel']['tmp_name'], $dir.'CERTMATPEL'.'_'.$_POST['add_placa'].'_'.$_POST['add_cert_matpel'].'.pdf')) {
            $flag8=1;
        }
    }
    //  homologacion vehicular
    $flag9=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_homovehicular']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_homovehicular']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_homovehicular']['tmp_name'], $dir.'HOMOVEHICULAR'.'_'.$_POST['add_placa'].'_'.$_POST['add_homo_vehicular'].'.pdf')) {
            $flag9=1;
        }
    }
    // IMPLEMENTACION ADAS
    $flag10=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_impleadas']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_impleadas']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_impleadas']['tmp_name'], $dir.'ADAS'.'_'.$_POST['add_placa'].'_'.$_POST['add_fecha_implem_adas'].'.pdf')) {
            $flag10=1;
        }
    }
    // CERT OPERATIVIDAD
    $flag11=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_certoperatividad']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_certoperatividad']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_certoperatividad']['tmp_name'], $dir.'CERTOPERATIVIDAD'.'_'.$_POST['add_placa'].'_'.$_POST['add_cert_operatividad'].'.pdf')) {
            $flag11=1;
        }
    }
    //EXTINTOR
    $flag12=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_extintor']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_extintor']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_extintor']['tmp_name'], $dir.'EXTINTOR'.'_'.$_POST['add_placa'].'_'.$_POST['add_extintor'].'.pdf')) {
            $flag12=1;
        }
    }
    //cert tacos
    $flag13=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_certtacos']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_certtacos']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_certtacos']['tmp_name'], $dir.'CERTTACOS'.'_'.$_POST['add_placa'].'_'.$_POST['add_cert_tacos'].'.pdf')) {
            $flag13=1;
        }
    }
    //CHECKLIST
    $flag14=0;
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documento_checklist']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documento_checklist']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documento_checklist']['tmp_name'], $dir.'CHECKLIST'.'_'.$_POST['add_placa'].'_'.$_POST['add_checklist'].'.pdf')) {
            $flag14=1;
        }
    }
    //EQUIPAMENTO
    $flag15=0;
    $hoy = date("Y-m-d");
    $dir = "documentos/vehiculos/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_foto_equipamiento']['name'];
    $arregloArchivo = explode(".", $_FILES['add_foto_equipamiento']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_foto_equipamiento']['tmp_name'], $dir.'EQUIPAMIENTO'.'_'.$_POST['add_placa'].'.jpg')) {
            $flag15=1;
        }
    }
    if($_POST['add_soat']==''){
        $_POST['add_soat']='2001-01-01';
    }
    if($_POST['add_poliza']==''){
        $_POST['add_poliza']='2001-01-01';
    }
    if($_POST['add_poliza_mercancia']==''){
        $_POST['add_poliza_mercancia']='2001-01-01';
    }
    if($_POST['add_rev_tecnica']==''){
        $_POST['add_rev_tecnica']='2001-01-01';
    }
    if($_POST['add_venc_rev_tecnica']==''){
        $_POST['add_venc_rev_tecnica']='2001-01-01';
    }
    if($_POST['add_gps']==''){
        $_POST['add_gps']='2001-01-01';
    }
    if($_POST['add_gps_mtc']==''){
        $_POST['add_gps_mtc']='2001-01-01';
    }
    if($_POST['add_tuc']==''){
        $_POST['add_tuc']='2001-01-01';
    }
    if($_POST['add_venc_tuc']==''){
        $_POST['add_venc_tuc']='2001-01-01';
    }
    if($_POST['add_cert_matpel']==''){
        $_POST['add_cert_matpel']='2001-01-01';
    }
    if($_POST['add_venc_cert_matpel']==''){
        $_POST['add_venc_cert_matpel']='2001-01-01';
    }
    if($_POST['add_homo_vehicular']==''){
        $_POST['add_homo_vehicular']='2001-01-01';
    }
    if($_POST['add_fecha_implem_adas']==''){
        $_POST['add_fecha_implem_adas']='2001-01-01';
    }
    if($_POST['add_equipamiento']==''){
        $_POST['add_equipamiento']='2001-01-01';
    }
    if($_POST['add_cert_operatividad']==''){
        $_POST['add_cert_operatividad']='2001-01-01';
    }
    if($_POST['add_extintor']==''){
        $_POST['add_extintor']='2001-01-01';
    }
    if($_POST['add_cert_tacos']==''){
        $_POST['add_cert_tacos']='2001-01-01';
    }
    if($_POST['add_checklist']==''){
        $_POST['add_checklist']='2001-01-01';
    }
    $vehiculo = new Vehiculo('',$_POST['add_placa'],$_POST['add_tipo_vehiculo'],$_POST['add_cant_ejes'],
    $_POST['add_chasis'],$_POST['add_vin'],$_POST['add_color'],$_POST['add_marca'],
    $_POST['add_cant_pasajeros'],$_POST['add_tipo_neumatico'],$_POST['add_num_aro'],$_POST['add_combustible'],
    $_POST['add_aire_acondicionado'],$_POST['add_tipo_aceite'],$_POST['add_km_actual'],$_POST['add_modelo'],
    $_POST['add_tipo_servicio'],$_POST['add_ano_fabricacion'],$_POST['add_tiempo_trabajo'],$_POST['add_recepcionado_por'],
    $_POST['add_propietario'],$_POST['add_telefono_prop'],$_POST['add_correo_prop'],$_POST['add_soat'],
    '',$_POST['add_poliza'],'',$_POST['add_poliza_mercancia'],
    '',$_POST['add_rev_tecnica'],$_POST['add_venc_rev_tecnica'],$_POST['add_link_acceso_gps'],
    $_POST['add_empresa_gps'],$_POST['add_gps'],'',$_POST['add_tuc'],
    $_POST['add_venc_tuc'],$_POST['add_gps_mtc'],$_POST['add_cert_matpel'],$_POST['add_venc_cert_matpel'],
    $_POST['add_homo_vehicular'],'',$_POST['add_fecha_implem_adas'],$_POST['add_cert_operatividad'],
    '',$_POST['add_extintor'],'',$_POST['add_cod_radio_base'],
    $_POST['add_cert_tacos'],'',$_POST['add_checklist'],' ',$_POST['add_rb_propietario'],$_POST['add_adas_propietario'],$_POST['add_equipamiento'],'1');
    $vehiculo->Agregar($con);
} else if(isset($_POST['delete_vehiculo'])){
    $vehiculo = new Vehiculo($_POST['delete_cod_vehiculo'], '', '', '','','','','','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
    $vehiculo->Eliminar($con);
}

$query = "select a.*,b.nombres from(SELECT * from vehiculos where estado='1')as a join (select * from personal where estado='1')as b on a.recepcionado_por=b.dni;";
$res = mysqli_query($con, $query);

$query1 = "SELECT * from personal where estado='1';";
$res1 = mysqli_query($con, $query1);
$res2 = mysqli_query($con, $query1);

require('views/vehiculos.view.php');
