<?php
require_once 'clases/clsClientes.php';

if (isset($_POST['update_cliente'])) {
    $cliente = new Cliente($_POST['update_cod_cliente'], $_POST['update_ruc'], $_POST['update_razon_social'], $_POST['update_direccion'], $_POST['update_telefono'], $_POST['update_correo_electronico'],'1');
    $cliente->Modificar($con);
} else if (isset($_POST['add_cliente'])) {
    $cliente = new Cliente('',$_POST['add_ruc'], $_POST['add_razon_social'], $_POST['add_direccion'], $_POST['add_telefono'], $_POST['add_correo_electronico'], 1);
    $cliente->Agregar($con);
} else if(isset($_POST['delete_cliente'])){
    $cliente = new Cliente($_POST['delete_cod_cliente'], '', '', '', '', '', '');
    $cliente->Eliminar($con);
}
//sentencia para lista clientes
$query = "SELECT * from clientes where estado=1";
$res = mysqli_query($con, $query);


require('views/clientes.view.php');
