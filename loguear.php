<?php
require 'db_conexion.php';
$con = mysqli_connect($host, $user, $pass, $db);

session_start();

$usuario=$_POST['usuario'];
$contra=$_POST['contra'];

$query="SELECT * FROM usuarios where user='$usuario' and contrasena='$contra' LIMIT 1";
$consulta=mysqli_query($con,$query);

$row_cnt = $consulta->num_rows;

$array = mysqli_fetch_array($consulta);

if($row_cnt>0){
        $_SESSION['usuario']=$usuario;
        $_SESSION['tipo_user']=$array['tipo_user'];
        IF($_SESSION['tipo_user']=='PROVEEDOR'){
            $_SESSION['list']=$usuario;
            header("location: panel.php?modulo=recep_docum_provee&list=$usuario");
        }
        else{
            $_SESSION['list']='all';
            $_SESSION['carrito_mantenimiento'] = array();
            header("location: index.php");
        }
        
}
else
{
    echo '<script language="javascript">alert("Error de Autentificacion");window.location.href="login.php"</script>';
}
?>