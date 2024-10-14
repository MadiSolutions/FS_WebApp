<?php
require_once 'clases/clsProveedores.php';

if (isset($_POST['update_proveedor'])) {
    $proveedor = new Proveedor($_POST['update_cod_proveedor'], $_POST['update_ruc'],$_POST['update_razon_social'], $_POST['update_nombre_contacto'],$_POST['update_direccion'], $_POST['update_ciudad'],$_POST['update_telefono'], $_POST['update_correo_electronico'],$_POST['update_calificacion'],'1');
    $proveedor->Modificar($con);
} else if (isset($_POST['add_proveedor'])) {
    $proveedor = new Proveedor('',$_POST['add_ruc'], $_POST['add_razon_social'], $_POST['add_nombre_contacto'],$_POST['add_direccion'], $_POST['add_ciudad'],$_POST['add_telefono'], $_POST['add_correo_electronico'],$_POST['add_calificacion'], 1);
    $proveedor->Agregar($con);
} else if(isset($_POST['delete_proveedor'])){
    $proveedor = new Proveedor($_POST['delete_cod_proveedor'], '', '', '', '', '', '','','','');
    $proveedor->Eliminar($con);
}
//sentencia para lista clientes
$query = "SELECT * from proveedores where estado=1";
$res = mysqli_query($con, $query);


require('views/proveedores.view.php');
