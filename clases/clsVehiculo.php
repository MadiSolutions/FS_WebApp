<?php
class Vehiculo
{
    public $cod_vehiculo ;
    public $placa ;
    public $tipo_vehiculo ;
    public $cant_ejes ;
    public $chasis ;
    public $vin ;
    public $color ;
    public $marca ;
    public $cant_pasajeros ;
    public $tipo_neumatico ;
    public $num_aro ;
    public $combustible ;
    public $aire_acondicionado ;
    public $tipo_aceite ;
    public $km_actual ;
    public $modelo ;
    public $tipo_servicio ;
    public $ano_fabricacion ;
    public $tiempo_trabajo ;
    public $recepcionado_por ;
    public $propietario ;
    public $telefono_prop ;
    public $correo_prop ;
    public $soat ;
    public $venc_soat ;
    public $poliza ;
    public $venc_poliza ;
    public $poliza_mercancia ;
    public $venc_poliza_mercancia ;
    public $rev_tecnica ;
    public $venc_rev_tecnica ;
    public $link_acceso_gps ;
    public $empresa_gps ;
    public $gps ;
    public $venc_gps ;
    public $tuc ;
    public $venc_tuc ;
    public $gps_mtc ;
    public $cert_matpel ;
    public $venc_cert_matpel ;
    public $homo_vehicular ;
    public $venc_homo_vehicular ;
    public $fecha_implem_adas ;
    public $cert_operatividad ;
    public $ven_cert_operatividad ;
    public $extintor ;
    public $venc_extintor ;
    public $cod_radio_base ;
    public $cert_tacos ;
    public $venc_cert_tacos ;
    public $checklist;
    public $venc_checklist;
    public $rb_propietario;
    public $adas_propietario;
    public $equipamiento;
    public $estado ;

    function __construct($cod_vehiculo,$placa,$tipo_vehiculo,$cant_ejes,$chasis,$vin,$color,$marca,$cant_pasajeros,$tipo_neumatico,$num_aro,$combustible,$aire_acondicionado,$tipo_aceite,$km_actual,$modelo,$tipo_servicio,$ano_fabricacion,$tiempo_trabajo,$recepcionado_por,$propietario,$telefono_prop,$correo_prop,$soat,$venc_soat,$poliza,$venc_poliza,$poliza_mercancia,$venc_poliza_mercancia,$rev_tecnica,$venc_rev_tecnica,$link_acceso_gps,$empresa_gps,$gps,$venc_gps,$tuc,$venc_tuc,$gps_mtc,$cert_matpel,$venc_cert_matpel,$homo_vehicular,$venc_homo_vehicular,$fecha_implem_adas,$cert_operatividad,$ven_cert_operatividad,$extintor,$venc_extintor,$cod_radio_base,$cert_tacos,$venc_cert_tacos,$checklist,$venc_checklist,$rb_propietario,$adas_propietario,$equipamiento,$estado)
    {
        $this->cod_vehiculo=$cod_vehiculo;
        $this->placa=$placa;
        $this->tipo_vehiculo=$tipo_vehiculo;
        $this->cant_ejes=$cant_ejes;
        $this->chasis=$chasis;
        $this->vin=$vin;
        $this->color=$color;
        $this->marca=$marca;
        $this->cant_pasajeros=$cant_pasajeros;
        $this->tipo_neumatico=$tipo_neumatico;
        $this->num_aro=$num_aro;
        $this->combustible=$combustible;
        $this->aire_acondicionado=$aire_acondicionado;
        $this->tipo_aceite=$tipo_aceite;
        $this->km_actual=$km_actual;
        $this->modelo=$modelo;
        $this->tipo_servicio=$tipo_servicio;
        $this->ano_fabricacion=$ano_fabricacion;
        $this->tiempo_trabajo=$tiempo_trabajo;
        $this->recepcionado_por=$recepcionado_por;
        $this->propietario=$propietario;
        $this->telefono_prop=$telefono_prop;
        $this->correo_prop=$correo_prop;
        $this->soat=$soat;
        $this->venc_soat=$venc_soat;
        $this->poliza=$poliza;
        $this->venc_poliza=$venc_poliza;
        $this->poliza_mercancia=$poliza_mercancia;
        $this->venc_poliza_mercancia=$venc_poliza_mercancia;
        $this->rev_tecnica=$rev_tecnica;
        $this->venc_rev_tecnica=$venc_rev_tecnica;
        $this->link_acceso_gps=$link_acceso_gps;
        $this->empresa_gps=$empresa_gps;
        $this->gps=$gps;
        $this->venc_gps=$venc_gps;
        $this->tuc=$tuc;
        $this->venc_tuc=$venc_tuc;
        $this->gps_mtc=$gps_mtc;
        $this->cert_matpel=$cert_matpel;
        $this->venc_cert_matpel=$venc_cert_matpel;
        $this->homo_vehicular=$homo_vehicular;
        $this->venc_homo_vehicular=$venc_homo_vehicular;
        $this->fecha_implem_adas=$fecha_implem_adas;
        $this->cert_operatividad=$cert_operatividad;
        $this->ven_cert_operatividad=$ven_cert_operatividad;
        $this->extintor=$extintor;
        $this->venc_extintor=$venc_extintor;
        $this->cod_radio_base=$cod_radio_base;
        $this->cert_tacos=$cert_tacos;
        $this->venc_cert_tacos=$venc_cert_tacos;
        $this->checklist=$checklist;
        $this->venc_checklist=$venc_checklist;
        $this->rb_propietario = $rb_propietario;
        $this->adas_propietario = $adas_propietario;
        $this->equipamiento = $equipamiento;
        $this->estado=$estado;
    }

    public function Agregar($con)
    {
        $hoy = date("Y-m-d");
        $hora = date("H:m:s");
        $user = $_SESSION['usuario'];
        //inserto cambio en log
        $insertar_cambio="INSERT INTO cambios_log(fechayhora, user, tipo_movimiento, tabla,cod_item) VALUES ('$hoy-$hora','$user','CREACION VEHICULO','VEHICULOS','$this->placa');";
        $exef = mysqli_query($con, $insertar_cambio);
        //
        $insertar = "INSERT INTO vehiculos( placa, tipo_vehiculo, cant_ejes, chasis, vin, color, marca, cant_pasajeros, tipo_neumatico, num_aro, combustible, aire_acondicionado, tipo_aceite, km_actual, modelo, tipo_servicio, ano_fabricacion, tiempo_trabajo, recepcionado_por, propietario, telefono_prop, correo_prop, soat, venc_soat, poliza, venc_poliza, poliza_mercancia, venc_poliza_mercancia, rev_tecnica, venc_rev_tecnica, link_acceso_gps, empresa_gps, gps, venc_gps, tuc, venc_tuc, gps_mtc, cert_matpel, venc_cert_matpel, homo_vehicular, venc_homo_vehicular, fecha_implem_adas, cert_operatividad, ven_cert_operatividad, extintor, venc_extintor, cod_radio_base, cert_tacos, venc_cert_tacos, checklist,venc_checklist,rb_propietario,adas_propietario,equipamiento,estado) VALUES
        ('$this->placa','$this->tipo_vehiculo','$this->cant_ejes','$this->chasis','$this->vin','$this->color','$this->marca','$this->cant_pasajeros','$this->tipo_neumatico',
        '$this->num_aro','$this->combustible','$this->aire_acondicionado','$this->tipo_aceite','$this->km_actual','$this->modelo','$this->tipo_servicio','$this->ano_fabricacion',
        '$this->tiempo_trabajo','$this->recepcionado_por','$this->propietario','$this->telefono_prop','$this->correo_prop','$this->soat','+1 year','$this->poliza',
        '+1 year','$this->poliza_mercancia','+1 year','$this->rev_tecnica','$this->venc_rev_tecnica','$this->link_acceso_gps','$this->empresa_gps','$this->gps',
        '+1 year','$this->tuc','$this->venc_tuc','$this->gps_mtc','$this->cert_matpel','$this->venc_cert_matpel','$this->homo_vehicular','+1 year',
        '$this->fecha_implem_adas','$this->cert_operatividad','+1 month','$this->extintor','+1 year','$this->cod_radio_base','$this->cert_tacos','+1 year',
        '$this->checklist','+1 year','$this->rb_propietario','$this->adas_propietario','$this->equipamiento','$this->estado')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Vehiculo Registrado al Sistema");
        } else {
            //MensajeError("Vehiculo No Pudo Ser Registrado al Sistema");
            MensajeError($insertar);
        }
    }

    public function Modificar($con)
    {
        $modificar = "Delete from vehiculos where cod_vehiculo='$this->cod_vehiculo'";
        $exe = mysqli_query($con, $modificar);
        $hoy = date("Y-m-d");
        $hora = date("H:m:s");
        $user = $_SESSION['usuario'];
        //inserto cambio en log
        $insertar_cambio="INSERT INTO cambios_log(fechayhora, user, tipo_movimiento, tabla,cod_item) VALUES ('$hoy-$hora','$user','MODIFICACION VEHICULO','VEHICULOS','$this->cod_vehiculo');";
        $exef = mysqli_query($con, $insertar_cambio);
        //
        $insertar = "INSERT INTO vehiculos(cod_vehiculo,placa, tipo_vehiculo, cant_ejes, chasis, vin, color, marca, cant_pasajeros, tipo_neumatico, num_aro, combustible, aire_acondicionado, tipo_aceite, km_actual, modelo, tipo_servicio, ano_fabricacion, tiempo_trabajo, recepcionado_por, propietario, telefono_prop, correo_prop, soat, venc_soat, poliza, venc_poliza, poliza_mercancia, venc_poliza_mercancia, rev_tecnica, venc_rev_tecnica, link_acceso_gps, empresa_gps, gps, venc_gps, tuc, venc_tuc, gps_mtc, cert_matpel, venc_cert_matpel, homo_vehicular, venc_homo_vehicular, fecha_implem_adas, cert_operatividad, ven_cert_operatividad, extintor, venc_extintor, cod_radio_base, cert_tacos, venc_cert_tacos, checklist,venc_checklist,rb_propietario,adas_propietario,equipamiento,estado) VALUES
        ('$this->cod_vehiculo','$this->placa','$this->tipo_vehiculo','$this->cant_ejes','$this->chasis','$this->vin','$this->color','$this->marca','$this->cant_pasajeros','$this->tipo_neumatico',
        '$this->num_aro','$this->combustible','$this->aire_acondicionado','$this->tipo_aceite','$this->km_actual','$this->modelo','$this->tipo_servicio','$this->ano_fabricacion',
        '$this->tiempo_trabajo','$this->recepcionado_por','$this->propietario','$this->telefono_prop','$this->correo_prop','$this->soat','1 year','$this->poliza',
        '1 year','$this->poliza_mercancia','1 year','$this->rev_tecnica','$this->venc_rev_tecnica','$this->link_acceso_gps','$this->empresa_gps','$this->gps',
        '1 year','$this->tuc','$this->venc_tuc','$this->gps_mtc','$this->cert_matpel','$this->venc_cert_matpel','$this->homo_vehicular','1 year',
        '$this->fecha_implem_adas','$this->cert_operatividad','1 month','$this->extintor','1 year','$this->cod_radio_base','$this->cert_tacos','1 year','$this->checklist','1 year',
        '$this->rb_propietario','$this->adas_propietario','$this->equipamiento','$this->estado')";
        $exe1 = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Vehiculo Modificado");
            //MensajeError($insertar);
        } else {
            MensajeError("El Vehiculo No Pudo Ser Modificado");
            //MensajeError($insertar);
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE vehiculos SET estado='0' WHERE cod_vehiculo = '$this->cod_vehiculo'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Vehiculo Eliminado del Sistema");
        } else {
            MensajeError("El Vehiculo No Pudo Ser Eliminado");
        }
    }
}
//https://www.youtube.com/watch?v=k_XaQAVua4A