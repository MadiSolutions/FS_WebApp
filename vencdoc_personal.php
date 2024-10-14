<?php
date_default_timezone_set('America/Lima');
require_once 'clases/clsVencdoc_Personal.php';
$user = $_SESSION['usuario'];

if (isset($_POST['update_vencdoc_personal'])) {
    $vencdoc_personal = new Vencdoc_Personal($_POST['update_id_personal'],$_POST['update_dni'],
    $_POST['update_inicio_dni'],$_POST['update_venc_dni'],                        
    $_POST['update_licencia_mtc'],$_POST['update_venc_licencia_mtc'],
    $_POST['update_num_contrato'],$_POST['update_fecha_ingreso_contrato'],$_POST['update_fecha_termino_contrato'],$_POST['update_venc_contrato'],
    $_POST['update_licencia_interna'],$_POST['update_examen_medico'],
    $_POST['update_curso_induccion'],$_POST['update_manejo_teorico'],
    $_POST['update_manejo_practico'],$_POST['update_sctr'],
    $_POST['update_vida_ley'],$user);
    $vencdoc_personal->Modificar($con);
} 
$query = "select * FROM personal where estado='1'";
$res = mysqli_query($con, $query);


require('views/vencdoc_personal.view.php');
