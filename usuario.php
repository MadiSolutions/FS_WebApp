<?php
require_once 'clases/clsUsuario.php';
$nombre='';

if (isset($_POST['update_usuario'])) {
    $usuario = new Usuario($_POST['update_user'], $_POST['update_contrasena'], $_POST['update_tipo_user'],'','');
    $usuario->Modificar($con);
} else if (isset($_POST['add_usuario'])) {
        
        if(strlen($_POST['add_dni'])<=9){
            $dni=$_POST['add_dni'];
            $query3 = "SELECT * from personal where estado=1 and dni=$dni;";
            $res3 = mysqli_query($con, $query3);
            while ($row = mysqli_fetch_assoc($res3)) :
                $nombre=$row['nombres'];
            endwhile;
        }else{
            $ruc=$dni=$_POST['add_dni'];
            $query4 = "SELECT * from proveedores where estado=1 and ruc=$ruc;";
            $res4 = mysqli_query($con, $query4);
            while ($row2 = mysqli_fetch_assoc($res4)) :
                $nombre=$row2['razon_social'];
            endwhile;
        }
        $usuario = new Usuario($_POST['add_dni'], $_POST['add_dni'], $_POST['add_tipo_user'],$nombre, 1);
        $usuario->Agregar($con);
} else if(isset($_POST['delete_usuario'])){
    $usuario = new Usuario($_POST['delete_user'], '', '', '');
    $usuario->Eliminar($con);
}
//sentencia para lista principal de usuarios

$query = "SELECT * from usuarios where estado=1;";
$res = mysqli_query($con, $query);

//sentencia paa lista de personal y asignar usuario
$query1 = "SELECT * from personal where estado=1";
$res1 = mysqli_query($con, $query1);


//sentencia para lista de proveedores y asignar usuario
$query2 = "SELECT * from proveedores where estado=1";
$res2 = mysqli_query($con, $query2);

require('views/usuario.view.php');
