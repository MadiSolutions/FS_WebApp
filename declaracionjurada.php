
<?php

$user = $_SESSION['usuario'];
$empresa = $_SESSION['empresa'];
$tipo_user= $_SESSION['tipo_user'];
require_once 'clases/clsDeclaracionJurada.php';

if (isset($_POST['update_medico'])) {
    $medico = new Medico($_POST['update_dni'], $_POST['update_nombre'], $_POST['update_telefono'], $_POST['update_correo'], $_POST['update_direccion'], $_POST['update_cargo']);
    $medico->Modificar($con);
} else if (isset($_POST['add_declaracionjurada'])) {
    $declaracionjurada = new DeclaracionJurada($user, $empresa,$_POST['cyc_p1'],$_POST['cyc_p2'],$_POST['cyc_p3'],$_POST['cyc_p4'],$_POST['cyc_p5'],$_POST['cyc_p6'],$_POST['cyc_p7'],$_POST['cyc_p8'],$_POST['cyc_p9'],$_POST['cyc_p10'],$_POST['cyc_p11'],
    $_POST['sr_p1'],$_POST['sr_p2'],$_POST['sr_p3'],$_POST['sr_p4'],$_POST['sr_p5'],$_POST['sr_p6'],$_POST['sr_p7'],$_POST['sr_p8'],$_POST['sr_p9'],$_POST['sr_p10'],$_POST['sr_p11'],
    $_POST['sce_p1'],$_POST['sce_p2'],$_POST['sce_p3'],$_POST['sce_p4'],$_POST['sce_p5'],$_POST['sce_p6'],$_POST['sce_p7'],$_POST['sce_p8'],$_POST['sce_p9'],$_POST['sce_p10'],$_POST['sce_p11'],
    $_POST['sd_p1'],$_POST['sd_p2'],$_POST['sd_p3'],$_POST['sd_p4'],$_POST['sd_p5'],$_POST['sd_p6'],$_POST['sd_p7'],$_POST['sd_p8'],$_POST['sd_p9'],$_POST['sd_p10'],$_POST['sd_p11'],
    $_POST['sg_p1'],$_POST['sg_p2'],$_POST['sg_p3'],$_POST['sg_p4'],$_POST['sg_p5'],$_POST['sg_p6'],$_POST['sg_p7'],
    $_POST['i_p1'],$_POST['i_p2'],$_POST['i_p3'],$_POST['i_p4'],$_POST['i_p5'],$_POST['i_p6'],$_POST['i_p7'],
    $_POST['f_p1'],$_POST['f_p2'],$_POST['f_p3'],$_POST['f_p4'],$_POST['f_p5'],$_POST['f_p6'],$_POST['f_p7'],$_POST['f_p8'],$_POST['f_p9'],$_POST['f_p10'],$_POST['f_p11'],
    $_POST['o_p1'],$_POST['o_p2'],$_POST['o_p3'],$_POST['o_p4'],$_POST['o_p5'],$_POST['o_p6'],$_POST['o_p7'],$_POST['o_p8'],$_POST['o_p9'],$_POST['o_p10'],$_POST['o_p11'],$_POST['o_p12'],$_POST['o_p13'],$_POST['o_p14'],$_POST['o_p15'],$_POST['o_p16'],
    $_POST['sme_p1'],$_POST['sme_p2'],$_POST['sme_p3'],$_POST['sme_p4'],$_POST['sme_p5'],$_POST['sme_p6'],$_POST['sme_p7'],$_POST['sme_p8'],$_POST['sme_p9'],$_POST['sme_p10'],
    $_POST['vc_p1'],$_POST['vc_p2'],$_POST['vc_p3'],$_POST['vc_p4'],
    $_POST['so_p1'],$_POST['so_p2'],
    $_POST['spm_p1'],$_POST['spm_p2'],$_POST['spm_p3'],$_POST['spm_p4'],$_POST['spm_p5'],$_POST['spm_p6'],
    $_POST['hdv_p1'],$_POST['hdv_p2'],$_POST['hdv_p3'],$_POST['hdv_p4'],$_POST['hdv_p5'],$_POST['hdv_p6'],
    $_POST['do_p1'],$_POST['do_p2'],
    $_POST['ho_p1'],$_POST['ho_p2'],$_POST['ho_p3'],$_POST['ho_p4'],$_POST['ho_p5'],$_POST['ho_p6'],$_POST['ho_p7'],$_POST['ho_p8'],$_POST['ho_p9'],$_POST['ho_p10'],$_POST['ho_p11'],$_POST['ho_p12'],$_POST['ho_p13'],$_POST['ho_p14'],$_POST['ho_p15i'],$_POST['ho_p15f']);
    $declaracionjurada->Agregar($con);
} else if(isset($_POST['delete_declaracionjurada'])){
    $declaracionjurada = new DeclaracionJurada($_POST['delete_cod_declaracionjurada'], '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
    '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
    '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
    '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
    '', '', '', '', '', '', '', '', '', '', '', '', '', '');
    $declaracionjurada->Eliminar($con);
}

$query = "SELECT * from usuarios where dni='$user'";
$res = mysqli_query($con, $query);

if($tipo_user==1){
    $query1 = "select a.nombre,b.* from (select * from usuarios) as a JOIN (select * from historico_declaracionesjuradas where estado=1) as b on a.dni=b.dni; ";
    $res1 = mysqli_query($con, $query1);
}
else{
    $query1 = "select a.nombre,b.* from (select * from usuarios where dni='$user') as a JOIN (select * from historico_declaracionesjuradas where dni='$user' and estado=1) as b on a.dni=b.dni; ";
    $res1 = mysqli_query($con, $query1);
}

require('views/declaracionjurada.view.php');


// parte arriba ajemplo*/