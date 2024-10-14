<?php
require_once 'clases/clsExamenes.php';

if (isset($_POST['update_examen'])) {
    $examen = new Examen($_POST['update_codigo'], $_POST['update_descripcion']);
    $examen->Modificar($con);
} else if (isset($_POST['add_examen'])) {
    $examen = new Examen($_POST['add_codigo'], $_POST['add_descripcion']);
    $examen->Agregar($con);
} else if(isset($_POST['delete_examen'])){
    $examen = new Examen($_POST['delete_codigo'], '', '', '', '', '');
    $examen->Eliminar($con);
}

$query = "SELECT * from tipo_examen where estado=1
ORDER BY descripcion asc;";
$res = mysqli_query($con, $query);

require('views/examenes.view.php');
