<?php
require_once 'clases/clsPagos.php';

if (isset($_POST['update_pago'])) {
    $pagos = new Pagos($_POST['update_id'],$_POST['update_fecha_servicio'],$_POST['update_proveedor'],
                            $_POST['update_descripcion'],$_POST['update_unidad'], 
                            $_POST['update_tipo_servicio'],
                            $_POST['update_valo'],$_POST['update_moneda'],
                            $_POST['update_dias_val'], $_POST['update_costo_dia'],
                            $_POST['update_descuento'],$_POST['update_medio_envio_valo'],
                            $_POST['update_fecha_envio_valo'],$_POST['update_detraccion'],
                            $_POST['update_estado_detraccion'],$_POST['update_fecha_detraccion'],
                            $_POST['update_tipo_documento'],$_POST['update_num_documento'],
                            $_POST['update_fecha_emitido'],
                            $_POST['update_fecha_recepcionado'],$_POST['update_compromiso_pago'],
                            $_POST['update_fecha_pago'],$_POST['update_monto_pago'],
                            $_POST['update_estado_pago']);
    $pagos->Modificar($con);
} else if (isset($_POST['add_pago'])) {
    $pagos = new Pagos('',$_POST['add_fecha_servicio'],$_POST['add_proveedor'],
                            $_POST['add_descripcion'],$_POST['add_unidad'], 
                            $_POST['add_tipo_servicio'],
                            $_POST['add_valo'],$_POST['add_moneda'],
                            $_POST['add_dias_val'], $_POST['add_costo_dia'],
                            $_POST['add_descuento'],$_POST['add_medio_envio_valo'],
                            $_POST['add_fecha_envio_valo'],$_POST['add_detraccion'],
                            $_POST['add_estado_detraccion'],$_POST['add_fecha_detraccion'],
                            $_POST['add_tipo_documento'],$_POST['add_num_documento'],
                            $_POST['add_fecha_emitido'],
                            $_POST['add_fecha_recepcionado'],$_POST['add_compromiso_pago'],
                            $_POST['add_fecha_pago'],$_POST['add_monto_pago'],
                            $_POST['add_estado_pago']);
    $pagos->Agregar($con);
} else if(isset($_POST['delete_pago'])){
    $pagos = new Pagos($_POST['delete_id'],'','','','','','','','','','','','','','','','','','','','','','','');
    $pagos->Eliminar($con);
}

$query = "select a.*,b.ruc,b.razon_social from (select * from pagos where estado=1)as a join (select * from proveedores where estado=1) as b on a.proveedor=b.ruc;";
$res = mysqli_query($con, $query);

//lista proveedores nuevo
$query2 = "SELECT * from proveedores where estado='1'";
$res2 = mysqli_query($con, $query2);
//lista proveedores modificar
$query3 = "SELECT * from proveedores where estado='1'";
$res3 = mysqli_query($con, $query3);
//lista unidades nuevo
$query4 = "SELECT * from vehiculos where estado='1'";
$res4 = mysqli_query($con, $query4);
//lista unidades modificar
$query5 = "SELECT * from vehiculos where estado='1'";
$res5 = mysqli_query($con, $query5);

require('views/pagos.view.php');
