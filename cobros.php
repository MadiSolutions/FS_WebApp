<?php
require_once 'clases/clsCobros.php';

if (isset($_POST['update_cobro'])) {
    $cobros = new Cobros($_POST['update_id'],$_POST['update_fecha_servicio'],$_POST['update_cliente'],
                            $_POST['update_descripcion'],$_POST['update_unidad'], 
                            $_POST['update_tipo_servicio'],
                            $_POST['update_contrato'],$_POST['update_moneda'],
                            $_POST['update_dias_val'], $_POST['update_costo_dia'],
                            $_POST['update_descuento'],$_POST['update_detraccion'],$_POST['update_fecha_detraccion'],
                            $_POST['update_estado_detraccion'],$_POST['update_oc'],
                            $_POST['update_tipo_documento'],$_POST['update_fecha_emitido'],
                            $_POST['update_fecha_enviado'],$_POST['update_fecha_pro_cobro'],
                            $_POST['update_fecha_cobro'],$_POST['update_monto_cobro'],
                            $_POST['update_estado_cobro']);
    $cobros->Modificar($con);
} else if (isset($_POST['add_cobro'])) {
    $cobros = new Cobros('',$_POST['add_fecha_servicio'],$_POST['add_cliente'],
                            $_POST['add_descripcion'],$_POST['add_unidad'], 
                            $_POST['add_tipo_servicio'],
                            $_POST['add_contrato'],$_POST['add_moneda'],
                            $_POST['add_dias_val'], $_POST['add_costo_dia'],
                            $_POST['add_descuento'],$_POST['add_detraccion'],$_POST['add_fecha_detraccion'],
                            $_POST['add_estado_detraccion'],$_POST['add_oc'],
                            $_POST['add_tipo_documento'],$_POST['add_fecha_emitido'],
                            $_POST['add_fecha_enviado'],$_POST['add_fecha_pro_cobro'],
                            $_POST['add_fecha_cobro'],$_POST['add_monto_cobro'],
                            $_POST['add_estado_cobro']);
    $cobros->Agregar($con);
} else if(isset($_POST['delete_cobro'])){
    $cobros = new Cobros($_POST['delete_id'],'','','','','','','','','','','','','','','','','','','','','');
    $cobros->Eliminar($con);
}

$query = "select a.*,b.ruc,b.razon_social from (select * from cobros where estado=1)as a join (select * from clientes where estado=1) as b on a.cliente=b.ruc;";
$res = mysqli_query($con, $query);

//lista clientes nUEVO
$query2 = "SELECT * from clientes where estado='1'";
$res2 = mysqli_query($con, $query2);


//lista unidades NUEVOI
$query3 = "SELECT * from vehiculos where estado='1'";
$res3 = mysqli_query($con, $query3);


//lista clientes mODIFICAR
$query4 = "SELECT * from clientes where estado='1'";
$res4 = mysqli_query($con, $query4);

//lista unidades MODIFICAR
$query5 = "SELECT * from vehiculos where estado='1'";
$res5 = mysqli_query($con, $query5);

require('views/cobros.view.php');
