<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'clases/clsRecep_docum_provee.php';
$list=$_GET['list'];

//sentencia paa lista de pROVEEDORES
$query1 = "SELECT * from proveedores where estado=1";
$res1 = mysqli_query($con, $query1);

if($list=='all'){
    $query = "Select a.id_compro_proveedores,b.ruc,b.razon_social,a.* from (SELECT * FROM compro_proveedores where estado='1')as a join (Select * from proveedores where estado='1')as b on a.id_proveedor=b.cod_proveedor;";
}
else{
    $query = "Select b.ruc,b.razon_social,a.* from (SELECT * FROM compro_proveedores where estado='1')as a join (Select * from proveedores where estado='1' and ruc='".$list."')as b on a.id_proveedor=b.cod_proveedor;";
}
$dir = "documentos/proveedores/";
if (isset($_POST['update_compro_proveedor'])) {    
        $flag=0;
        $permitidos = array('pdf'); //Archivos permitido
        $ruta_cargapdf = $dir . $_FILES['update_documentopdf']['name'];
        $arregloArchivo = explode(".", $_FILES['update_documentopdf']['name']);
	    $extension = strtolower(end($arregloArchivo));
        if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
            if (move_uploaded_file($_FILES['update_documentopdf']['tmp_name'], $dir.'FACTURA_'.$_POST['update_id_proveedor'].'_'.$_POST['update_fecha_emitida'].'_'.$_POST['update_serie'].'-'.$_POST['update_num_documento'].'.pdf')) {
                $flag=1;
            }
        }

    
        $flag1=0;
        $permitidos = array('xml'); //Archivos permitido
        $ruta_cargapdf = $dir . $_FILES['update_xml']['name'];
        $arregloArchivo = explode(".", $_FILES['update_xml']['name']);
	    $extension = strtolower(end($arregloArchivo));
        if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
            if (move_uploaded_file($_FILES['update_xml']['tmp_name'], $dir.'XML_'.$_POST['update_id_proveedor'].'_'.$_POST['update_fecha_emitida'].'_'.$_POST['update_serie'].'-'.$_POST['update_num_documento'].'.xml')) {
                $flag1=1;
            }
        }

    $flag2=0;
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_valorizacionpdf']['name'];
    $arregloArchivo = explode(".", $_FILES['update_valorizacionpdf']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_valorizacionpdf']['tmp_name'], $dir.'VALORIZACION_'.$_POST['update_id_proveedor'].'_'.$_POST['update_fecha_emitida'].'_'.$_POST['update_serie'].'-'.$_POST['update_num_documento'].'.pdf')) {
            $flag2=1;
        }
    }
    //contrato
    $flag3=0;
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['update_contrato']['name'];
    $arregloArchivo = explode(".", $_FILES['update_contrato']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['update_contrato']['tmp_name'], $dir.'CONTRATO_'.$_POST['update_id_proveedor'].'_'.$_POST['update_fecha_emitida'].'_'.$_POST['update_serie'].'-'.$_POST['update_num_documento'].'.pdf')) {
            $flag3=1;
        }
    }

    $recep_docum_provee = new Recep_docum_provee($_POST['update_id_compro_proveedores'],$_POST['update_id_proveedor'], $_POST['update_fecha_emitida'], $_POST['update_tipo_documento'], $_POST['update_serie'], $_POST['update_num_documento'], $_POST['update_descripcion'],$_POST['update_importe_documento'],$_POST['update_importe_retencion'],$_POST['update_importe_pagar'],$_POST['update_constancia_detraccion'],$_POST['update_num_retencion'],$_POST['update_estado_aprobacion'],$_POST['update_motivo'],$_POST['update_estado_pago'],$_POST['update_num_operacion'],$dir.'FACTURA_'.$_POST['update_id_proveedor'].'_'.$_POST['update_fecha_emitida'].'_'.$_POST['update_serie'].'-'.$_POST['update_num_documento'].'.pdf',$flag,$dir.'XML_'.$_POST['update_id_proveedor'].'_'.$_POST['update_fecha_emitida'].'_'.$_POST['update_serie'].'-'.$_POST['update_num_documento'].'.pdf',$flag1,$dir.'VALORIZACION_'.$_POST['update_id_proveedor'].'_'.$_POST['update_fecha_emitida'].'_'.$_POST['update_serie'].'-'.$_POST['update_num_documento'].'.pdf',$flag2,$dir.'CONTRATO_'.$_POST['update_id_proveedor'].'_'.$_POST['update_fecha_emitida'].'_'.$_POST['update_serie'].'-'.$_POST['update_num_documento'].'.pdf',$flag3);
    $recep_docum_provee->Modificar($con);
} else if (isset($_POST['add_compro_proveedor'])) {
    $flag=0;
    $dir = "documentos/proveedores/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_documentopdf']['name'];
    $arregloArchivo = explode(".", $_FILES['add_documentopdf']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_documentopdf']['tmp_name'], $dir.'FACTURA_'.$_POST['add_id_proveedor'].'_'.$_POST['add_fecha_emitida'].'_'.$_POST['add_serie'].'-'.$_POST['add_num_documento'].'.pdf')) {
            $flag=1;
        }
    }

    $flag1=0;
    $dir = "documentos/proveedores/";
    $permitidos = array('xml'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_xml']['name'];
    $arregloArchivo = explode(".", $_FILES['add_xml']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_xml']['tmp_name'], $dir.'XML_'.$_POST['add_id_proveedor'].'_'.$_POST['add_fecha_emitida'].'_'.$_POST['add_serie'].'-'.$_POST['add_num_documento'].'.xml')) {
            $flag1=1;
        }
    }

    $flag2=0;
    $dir = "documentos/proveedores/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_valorizacionpdf']['name'];
    $arregloArchivo = explode(".", $_FILES['add_valorizacionpdf']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_valorizacionpdf']['tmp_name'], $dir.'VALORIZACION_'.$_POST['add_id_proveedor'].'_'.$_POST['add_fecha_emitida'].'_'.$_POST['add_serie'].'-'.$_POST['add_num_documento'].'.pdf')) {
            $flag2=1;
        }
    }

    //contrato
    $flag3=0;
    $dir = "documentos/proveedores/";
    $permitidos = array('pdf'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['add_contrato']['name'];
    $arregloArchivo = explode(".", $_FILES['add_contrato']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['add_contrato']['tmp_name'], $dir.'CONTRATO_'.$_POST['add_id_proveedor'].'_'.$_POST['add_fecha_emitida'].'_'.$_POST['add_serie'].'-'.$_POST['add_num_documento'].'.pdf')) {
            $flag3=1;
        }
    }

    $recep_docum_provee = new Recep_docum_provee('',$_POST['add_id_proveedor'], $_POST['add_fecha_emitida'], $_POST['add_tipo_documento'], $_POST['add_serie'], $_POST['add_num_documento'], $_POST['add_descripcion'],$_POST['add_importe_documento'],$_POST['add_importe_retencion'],$_POST['add_importe_pagar'],'','','','','','',$dir.'FACTURA_'.$_POST['add_id_proveedor'].'_'.$_POST['add_fecha_emitida'].'_'.$_POST['add_serie'].'-'.$_POST['add_num_documento'].'.pdf',$flag,$dir.'XML_'.$_POST['add_id_proveedor'].'_'.$_POST['add_fecha_emitida'].'_'.$_POST['add_serie'].'-'.$_POST['add_num_documento'].'.pdf',$flag1,$dir.'VALORIZACION_'.$_POST['add_id_proveedor'].'_'.$_POST['add_fecha_emitida'].'_'.$_POST['add_serie'].'-'.$_POST['add_num_documento'].'.pdf',$flag2,$dir.'CONTRATO_'.$_POST['add_id_proveedor'].'_'.$_POST['add_fecha_emitida'].'_'.$_POST['add_serie'].'-'.$_POST['add_num_documento'].'.pdf',$flag3);
    $recep_docum_provee->Agregar($con);
} else if(isset($_POST['delete_compro_proveedor'])){
    $recep_docum_provee = new Recep_docum_provee($_POST['delete_id_compro_proveedores'], '', '', '', '', '', '', '','','','','','','','','','','','','','','','','');
    $recep_docum_provee->Eliminar($con);
}
$res = mysqli_query($con, $query);


require('views/recep_docum_provee.view.php');
