<?php
require_once 'clases/clsPacientes.php';

if (isset($_POST['update_paciente'])) {
    $cliente = new Paciente($_POST['update_dni'], $_POST['update_nombre'], $_POST['update_telefono'], $_POST['update_correo'], $_POST['update_direccion']);
    $cliente->Modificar($con);
} else if (isset($_POST['add_paciente'])) {
    $cliente = new Paciente($_POST['add_dni'], $_POST['add_nombre'], $_POST['add_telefono'], $_POST['add_correo'], $_POST['add_direccion']);
    $cliente->Agregar($con);
} else if(isset($_POST['delete_paciente'])){
    $cliente = new Paciente($_POST['delete_dni'], '', '', '', '', '');
    $cliente->Eliminar($con);
}

$query = "SELECT a.*,b.nombres from (select * from marcacion_android where estado=1)as a join (select * from personal where estado=1)as b on a.dni=b.dni ORDER BY a.fecha,a.hora asc;";
$res = mysqli_query($con, $query);

require('views/marcacion.view.php');
