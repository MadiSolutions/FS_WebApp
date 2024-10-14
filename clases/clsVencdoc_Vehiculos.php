<?php
date_default_timezone_set('America/Lima');
class Vencdoc_Vehiculo
{
    public $cod_vehiculo ;
    public $soat ;
    public $poliza ;
    public $poliza_mercancia ;
    public $rev_tecnica ;
    public $venc_rev_tecnica ;
    public $gps ;
    public $tuc ;
    public $venc_tuc ;
    public $cert_matpel ;
    public $venc_cert_matpel ;
    public $homo_vehicular ;
    public $cert_operatividad ;
    public $extintor ;
    public $cert_tacos ;
    public $checklist;
    public $user;

    function __construct($cod_vehiculo,$soat,$poliza,$poliza_mercancia,$rev_tecnica,$venc_rev_tecnica,$gps,$tuc,$venc_tuc,$cert_matpel,$venc_cert_matpel,$homo_vehicular,$cert_operatividad,$extintor,$cert_tacos,$checklist,$user)
    {
        $this->cod_vehiculo=$cod_vehiculo;
        $this->soat=$soat;
        $this->poliza=$poliza;
        $this->poliza_mercancia=$poliza_mercancia;
        $this->rev_tecnica=$rev_tecnica;
        $this->venc_rev_tecnica=$venc_rev_tecnica;
        $this->gps=$gps;
        $this->tuc=$tuc;
        $this->venc_tuc=$venc_tuc;
        $this->cert_matpel=$cert_matpel;
        $this->venc_cert_matpel=$venc_cert_matpel;
        $this->homo_vehicular=$homo_vehicular;
        $this->cert_operatividad=$cert_operatividad;
        $this->extintor=$extintor;
        $this->cert_tacos=$cert_tacos;
        $this->checklist=$checklist;
        $this->user=$user;
    }

    public function Modificar($con)
    {
        $hoy = date("Y-m-d H:m:s" );
        $insertar_vencdoc_vehiculo="INSERT INTO cambios_log(fechayhora, user, tipo_movimiento, tabla,cod_item) VALUES ('$hoy','$this->user','ACTUALIZACION DOCUMENTARIA','Vehiculo','$this->cod_vehiculo');";
        $exe = mysqli_query($con, $insertar_vencdoc_vehiculo);
        $modificar = "UPDATE vehiculos SET soat='$this->soat',poliza='$this->poliza',poliza_mercancia='$this->poliza_mercancia',rev_tecnica='$this->rev_tecnica',
        venc_rev_tecnica='$this->venc_rev_tecnica',gps='$this->gps',tuc='$this->tuc',venc_tuc='$this->venc_tuc',cert_matpel='$this->cert_matpel',venc_cert_matpel='$this->venc_cert_matpel',
        homo_vehicular='$this->homo_vehicular',cert_operatividad='$this->cert_operatividad',extintor='$this->extintor',cert_tacos='$this->cert_tacos',checklist='$this->checklist' where cod_vehiculo='$this->cod_vehiculo'";

        $exe1 = mysqli_query($con, $modificar);
        if ($exe1 !== false && $exe!== false) {
            MensajeExitoso("Documento Modificado");
            //MensajeError($insertar_vencdoc_vehiculo);
        } else {
            MensajeError("Documento No Pudo Ser Modificado");
            //MensajeError($insertar_vencdoc_vehiculo);
        }
    }
}
//https://www.youtube.com/watch?v=k_XaQAVua4A