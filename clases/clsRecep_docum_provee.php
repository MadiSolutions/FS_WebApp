<?php
date_default_timezone_set('America/Lima');

class Recep_docum_provee
{
    public $id_compro_proveedor;
    public $id_proveedor;
    public $fecha_emitida;
    public $tipo_documento;
    public $serie;
    public $num_documento;
    public $descripcion;
    public $importe_documento;
    public $importe_retencion;
    public $importe_pagar;
    public $constancia_detraccion;
    public $num_retencion;
    public $estado_aprobacion;
    public $motivo;
    public $estado_pago;
    public $num_operacion;
    public $ruta_pdf;
    public $pdf;
    public $ruta_xml;
    public $xml;
    public $ruta_valorizacion;
    public $valorizacion;
    public $ruta_contrato;
    public $contrato;

    function __construct($id_compro_proveedor,$id_proveedor,$fecha_emitida,$tipo_documento,$serie,$num_documento,$descripcion,$importe_documento,$importe_retencion,$importe_pagar,$constancia_detraccion,$num_retencion,$estado_aprobacion,$motivo,$estado_pago,$num_operacion,$ruta_pdf,$pdf,$ruta_xml,$xml,$ruta_valorizacion,$valorizacion,$ruta_contrato,$contrato)
    {
        $this->id_compro_proveedor = $id_compro_proveedor;
        $this->id_proveedor = $id_proveedor;
        $this->fecha_emitida = $fecha_emitida;
        $this->tipo_documento = $tipo_documento;
        $this->serie = $serie;
        $this->num_documento = $num_documento;
        $this->descripcion = $descripcion;
        $this->importe_documento = $importe_documento;
        $this->importe_retencion = $importe_retencion;
        $this->importe_pagar = $importe_pagar;
        $this->constancia_detraccion = $constancia_detraccion;
        $this->num_retencion = $num_retencion;
        $this->estado_aprobacion = $estado_aprobacion;
        $this->motivo = $motivo;
        $this->estado_pago = $estado_pago;
        $this->num_operacion = $num_operacion;
        $this->pdf = $pdf;
        $this->ruta_pdf = $ruta_pdf;
        $this->xml = $xml;
        $this->ruta_xml = $ruta_xml;
        $this->valorizacion = $valorizacion;
        $this->ruta_valorizacion = $ruta_valorizacion;
        $this->contrato = $contrato;
        $this->ruta_contrato = $ruta_contrato;

    }

    public function Agregar($con)
    {   
        $hoy = date("Y-m-d");
        $user = $_SESSION['usuario'];
        $hora = date("H:m:s");
        //inserto cambio en log
        $insertar_cambio="INSERT INTO cambios_log(fechayhora, user, tipo_movimiento, tabla,cod_item) VALUES ('$hoy-$hora','$user','CREACION DOCUMENTO PROVEEDORES','compro_proveedores','$this->serie-$this->num_documento');";
        $exef = mysqli_query($con, $insertar_cambio);

        $fecha_pago=date("Y-m-d",strtotime($hoy.'+1 month')); 

        $insertar = "INSERT INTO compro_proveedores(id_proveedor, fecha,hora, fecha_emitida, tipo_documento, serie, num_documento, descripcion, importe_documento,importe_retencion,importe_pagar,fecha_pago,ruta_pdf,ruta_xml,ruta_valorizacion,ruta_contrato,estado_aprobacion,motivo,estado_pago,estado) VALUES 
        ('$this->id_proveedor','$hoy','$hora','$this->fecha_emitida','$this->tipo_documento','$this->serie','$this->num_documento','$this->descripcion','$this->importe_documento','$this->importe_retencion','$this->importe_pagar','$fecha_pago','$this->ruta_pdf','$this->ruta_xml','$this->ruta_valorizacion','$this->ruta_contrato','ENVIADO A REVISION','-','PENDIENTE',1)";
        $exe = mysqli_query($con, $insertar);
        $msjfinal="";
        if($this->pdf==1){
            $msjfinal=$msjfinal.', PDF OK';
        }else{
            $msjfinal=$msjfinal.', PDF NO';
        }
        if($this->xml==1){
            $msjfinal=$msjfinal.', XML OK';
        }else{
            $msjfinal=$msjfinal.', XML NO';
        }
        if($this->valorizacion==1){
            $msjfinal=$msjfinal.', VALORIZACION OK';
        }
        else{
            $msjfinal=$msjfinal.', VALORIZACION NO';
        }
        if($this->contrato==1){
            $msjfinal=$msjfinal.', CONTRATO OK';
        }
        else{
            $msjfinal=$msjfinal.', CONTRATO NO';
        }
        if ($exe !== false) {
            //MensajeExitoso("Comprobante Registrado al Sistema".$msjfinal);
          MensajeExitoso("Comprobante Registrado al Sistema".$msjfinal);
        	//MensajeExitoso($insertar);
        } else {
            MensajeError("Comprobante No Pudo Ser Registrado al Sistema");
            //MensajeExitoso($insertar);
        }
    }

    public function Modificar($con)
    {
        $user = $_SESSION['usuario'];
        $hoy = date("Y-m-d");
        $hora = date("H:m:s");
        $fecha_pago=date("Y-m-d",strtotime($hoy.'+1 month'));
        //inserto cambio en log
        $insertar_cambio="INSERT INTO cambios_log(fechayhora, user, tipo_movimiento, tabla,cod_item) VALUES ('$hoy-$hora','$user','ACTUALIZACION DOCUMENTO PROVEEDORES','compro_proveedores','$this->id_compro_proveedor');";
        $exef = mysqli_query($con, $insertar_cambio);

        $modificar = "Delete from compro_proveedores where id_compro_proveedores='$this->id_compro_proveedor'";
        $exe = mysqli_query($con, $modificar);

        $insertar = "INSERT INTO compro_proveedores(id_compro_proveedores,id_proveedor, fecha,hora, fecha_emitida, tipo_documento, serie, num_documento, descripcion, importe_documento,importe_retencion,importe_pagar,fecha_pago,constancia_detraccion,num_retencion,estado_aprobacion,motivo,estado_pago,num_operacion,ruta_pdf,ruta_xml,ruta_valorizacion,ruta_contrato,estado) VALUES 
        ('$this->id_compro_proveedor','$this->id_proveedor','$hoy','$hora','$this->fecha_emitida','$this->tipo_documento','$this->serie','$this->num_documento','$this->descripcion','$this->importe_documento','$this->importe_retencion','$this->importe_pagar','$fecha_pago','$this->constancia_detraccion','$this->num_retencion','$this->estado_aprobacion','$this->motivo','$this->estado_pago','$this->num_operacion','$this->ruta_pdf','$this->ruta_xml','$this->ruta_valorizacion','$this->ruta_contrato',1)";
        $exe1 = mysqli_query($con, $insertar);

        if ($exe1 !== false) {
           MensajeExitoso("Comprobante Modificado ");
            //MensajeExitoso($insertar);
        } else {
            //MensajeExitoso($insertar);
            MensajeError("El Comprobante No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE compro_proveedores SET estado='0' WHERE id_compro_proveedores = '$this->id_compro_proveedor'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Comprobante Eliminado del Sistema ");
        } else {
            MensajeError("Comprobante No Pudo Ser Eliminado");
        }
    }
}
