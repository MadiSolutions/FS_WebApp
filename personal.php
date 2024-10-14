<?php
require_once 'clases/clsPersonal.php';

if (isset($_POST['update_personal'])) {
    $personal = new Personal($_POST['update_id_personal'],$_POST['update_pais'],$_POST['update_ubigeo'],$_POST['update_mina_ciudad'],$_POST['update_nombre'], $_POST['update_dni'],
                            $_POST['update_inicio_dni'],$_POST['update_venc_dni'],                        
                            $_POST['update_direccion'], $_POST['update_telefono'],
                            $_POST['update_correo_electronico'],$_POST['update_grado_instruccion'],$_POST['update_fecha_nacimiento'],$_POST['update_lugar_nacimiento'],
                            $_POST['update_grupo_sanguineo'],$_POST['update_cargo'],$_POST['update_tipo_licencia_conducir'],$_POST['update_num_licencia_conducir'],
                            $_POST['update_licencia_mtc'],$_POST['update_venc_licencia_mtc'],
                            $_POST['update_estado_civil'],$_POST['update_nombre_esposoa'],$_POST['update_dni_esposoa'],$_POST['update_num_hijos'],
                            $_POST['update_datos_hijos'],$_POST['update_salario'],$_POST['update_banco_salario'],$_POST['update_nro_cuenta_salario'],
                            $_POST['update_banco_cts'],$_POST['update_nro_cuenta_cts'],$_POST['update_sistema_pensiones'],$_POST['update_nombre_afp'],
                            $_POST['update_cuenta_sistema_pensiones'],$_POST['update_nombre_emergencia'],$_POST['update_telefono_emergencia'],$_POST['update_direccion_emergencia'],
                            $_POST['update_num_contrato'],$_POST['update_fecha_ingreso_contrato'],$_POST['update_fecha_termino_contrato'],$_POST['update_venc_contrato'],
                            $_POST['update_licencia_interna'],$_POST['update_venc_licencia_interna'],$_POST['update_examen_medico'],$_POST['update_venc_examen_medico'],
                            $_POST['update_curso_induccion'],$_POST['update_venc_curso_induccion'],$_POST['update_manejo_teorico'],$_POST['update_venc_manejo_teorico'],
                            $_POST['update_manejo_practico'],$_POST['update_venc_manejo_practico'],$_POST['update_sctr'],$_POST['update_venc_sctr'],
                            $_POST['update_vida_ley'],$_POST['update_venc_vida_ley']);
    $personal->Modificar($con);
} else if (isset($_POST['add_personal'])) {
    $personal = new Personal('',$_POST['add_pais'],$_POST['add_ubigeo'],$_POST['add_mina_ciudad'],$_POST['add_nombre'], $_POST['add_dni'],
                            $_POST['add_inicio_dni'],$_POST['add_venc_dni'],
                            $_POST['add_direccion'], $_POST['add_telefono'],
                            $_POST['add_correo_electronico'],$_POST['add_grado_instruccion'],$_POST['add_fecha_nacimiento'],$_POST['add_lugar_nacimiento'],
                            $_POST['add_grupo_sanguineo'],$_POST['add_cargo'],$_POST['add_tipo_licencia_conducir'],$_POST['add_num_licencia_conducir'],
                            $_POST['add_licencia_mtc'],$_POST['add_venc_licencia_mtc'],
                            $_POST['add_estado_civil'],$_POST['add_nombre_esposoa'],$_POST['add_dni_esposoa'],$_POST['add_num_hijos'],
                            $_POST['add_datos_hijos'],$_POST['add_salario'],$_POST['add_banco_salario'],$_POST['add_nro_cuenta_salario'],
                            $_POST['add_banco_cts'],$_POST['add_nro_cuenta_cts'],$_POST['add_sistema_pensiones'],$_POST['add_nombre_afp'],
                            $_POST['add_cuenta_sistema_pensiones'],$_POST['add_nombre_emergencia'],$_POST['add_telefono_emergencia'],$_POST['add_direccion_emergencia'],
                            $_POST['add_num_contrato'],$_POST['add_fecha_ingreso_contrato'],$_POST['add_fecha_termino_contrato'],$_POST['add_venc_contrato'],
                            $_POST['add_licencia_interna'],$_POST['add_venc_licencia_interna'],$_POST['add_examen_medico'],$_POST['add_venc_examen_medico'],
                            $_POST['add_curso_induccion'],$_POST['add_venc_curso_induccion'],$_POST['add_manejo_teorico'],$_POST['add_venc_manejo_teorico'],
                            $_POST['add_manejo_practico'],$_POST['add_venc_manejo_practico'],$_POST['add_sctr'],$_POST['add_venc_sctr'],
                            $_POST['add_vida_ley'],$_POST['add_venc_vida_ley']);
    $personal->Agregar($con);
} else if(isset($_POST['delete_personal'])){
    $personal = new Personal($_POST['delete_id_personal'],'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
    $personal->Eliminar($con);
}

$query = "SELECT * from personal where estado='1' ORDER BY nombres asc;";
$res = mysqli_query($con, $query);

require('views/personal.view.php');
