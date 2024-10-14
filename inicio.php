<?php

$titulo = 'Bienvenidos FS Servicios Integrales WebApp';



//total de vehiculos activos
$query = "SELECT count(DISTINCT cod_vehiculo)as tot_vehiculos from vehiculos where estado=1;";
$res = mysqli_query($con, $query);

//total de personal activos
$query = "SELECT count(DISTINCT id_personal)as tot_personal from personal where estado=1;";
$res2 = mysqli_query($con, $query);

//total de clientes activos
$query = "SELECT count(DISTINCT cod_cliente)as tot_clientes from clientes where estado=1;";
$res3 = mysqli_query($con, $query);

//total de proveedores activos
$query = "SELECT count(DISTINCT cod_proveedor)as tot_proveedor from proveedores where estado=1;";
$res4 = mysqli_query($con, $query);

//lista vehiculos para vencimientos
$query = "select a.*,b.nombres from(SELECT * from vehiculos where estado='1')as a join (select * from personal where estado='1')as b on a.recepcionado_por=b.dni;";
$res5 = mysqli_query($con, $query);
$doc_porvencerv=0;
$doc_vencidosv=0;
$doc_activov=0;
while ($row = mysqli_fetch_assoc($res5)) :
    //soat
    $new_date=date("Y-m-d",strtotime($row['soat'].$row['venc_soat'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }

    $new_date=date("Y-m-d",strtotime($row['poliza'].$row['venc_poliza'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $new_date=date("Y-m-d",strtotime($row['poliza_mercancia'].$row['venc_poliza_mercancia'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $old_date = new DateTime();
    $new_date = new DateTime($row['venc_rev_tecnica']);
    $msj_new_date=$row['venc_rev_tecnica'];
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $new_date=date("Y-m-d",strtotime($row['gps'].$row['venc_gps']));
    $msj_new_date=$new_date; 
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $old_date = new DateTime();
    $new_date = new DateTime($row['venc_tuc']);
    $msj_new_date=$row['venc_tuc'];
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $old_date = new DateTime();
    $new_date = new DateTime($row['venc_cert_matpel']);
    $msj_new_date=$row['venc_cert_matpel'];
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $new_date=date("Y-m-d",strtotime($row['homo_vehicular'].$row['venc_homo_vehicular'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $new_date=date("Y-m-d",strtotime($row['cert_operatividad'].$row['ven_cert_operatividad'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $new_date=date("Y-m-d",strtotime($row['extintor'].$row['venc_extintor']));
    $msj_new_date=$new_date; 
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
    
    $new_date=date("Y-m-d",strtotime($row['cert_tacos'].$row['venc_cert_tacos'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidosv++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencerv++;
    }if($diff>15){
        $doc_activov++;
    }
endwhile;




$query = "select * FROM personal where estado='1'";
$res6 = mysqli_query($con, $query);

$doc_porvencer=0;
$doc_vencidos=0;
$doc_activo=0;
while ($row = mysqli_fetch_assoc($res6)) :
if($row['venc_contrato']!='2001-01-01'){
    $old_date = new DateTime();
    $new_date = new DateTime($row['venc_contrato']);
    $msj_new_date=$row['venc_contrato'];
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}

if($row['venc_licencia_mtc']!='2001-01-01'){
    $old_date = new DateTime();
    $new_date = new DateTime($row['venc_licencia_mtc']);
    $msj_new_date=$row['venc_licencia_mtc'];
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}

if($row['licencia_interna']!='2001-01-01'){
    $new_date=date("Y-m-d",strtotime($row['licencia_interna'].$row['venc_licencia_interna'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}

if($row['examen_medico']!='2001-01-01'){
    $new_date=date("Y-m-d",strtotime($row['examen_medico'].$row['venc_examen_medico']));
    $msj_new_date=$new_date; 
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}

if($row['curso_induccion']!='2001-01-01'){
    $new_date=date("Y-m-d",strtotime($row['curso_induccion'].$row['venc_curso_induccion'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}

if($row['manejo_teorico']!='2001-01-01'){
    $new_date=date("Y-m-d",strtotime($row['manejo_teorico'].$row['venc_manejo_teorico'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}

if($row['manejo_practico']!='2001-01-01'){
    $new_date=date("Y-m-d",strtotime($row['manejo_practico'].$row['venc_manejo_practico'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}
    
if($row['sctr']!='2001-01-01'){
    $new_date=date("Y-m-d",strtotime($row['sctr'].$row['venc_sctr'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}

if($row['vida_ley']!='2001-01-01'){
    $new_date=date("Y-m-d",strtotime($row['vida_ley'].$row['venc_vida_ley'])); 
    $msj_new_date=$new_date;
    $old_date = new DateTime();
    $new_date = new DateTime($new_date);
    $diff = $old_date->diff($new_date);
    $diff =$diff->format('%R%a');
    if($diff<0){
        $doc_vencidos++;
    }if($diff>=0 && $diff<=15){
        $doc_porvencer++;
    }if($diff>15){
        $doc_activo++;
    }}
endwhile; 


//total comprobantes recibidos
$query = "SELECT count(DISTINCT id_compro_proveedores)as tot_compro_proveedor from compro_proveedores where estado=1;";
$res8 = mysqli_query($con, $query);



require 'views/inicio.view.php';
