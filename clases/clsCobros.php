<?php
class Cobros
{
    public $id;
    public $fecha_servicio,$cliente,$descripcion,$unidad,$tipo_servicio,$contrato,$moneda,$dias_val,$costo_dia,$descuento,$detraccion,$fecha_detraccion,$estado_detraccion,$oc,$tipo_documento, $fecha_emitido,$fecha_enviado,$fecha_pro_cobro,$fecha_cobro,$monto_cobro,$estado_cobro;

    function __construct($id,$fecha_servicio,$cliente,$descripcion,$unidad,$tipo_servicio,$contrato,$moneda,$dias_val,$costo_dia,
    $descuento,$detraccion,$fecha_detraccion,$estado_detraccion,$oc,$tipo_documento, $fecha_emitido,$fecha_enviado,$fecha_pro_cobro,$fecha_cobro,
    $monto_cobro,$estado_cobro)
    {
        $this->id=$id;
        $this->fecha_servicio=$fecha_servicio;
        $this->cliente=$cliente;
        $this->descripcion=$descripcion;
        $this->unidad = $unidad;
        $this->tipo_servicio = $tipo_servicio;
        $this->contrato = $contrato;
        $this->moneda = $moneda;
        $this->dias_val=$dias_val;
        $this->costo_dia=$costo_dia;
        $this->descuento=$descuento;
        $this->detraccion = $detraccion; 
        $this->fecha_detraccion = $fecha_detraccion; 
        $this->estado_detraccion = $estado_detraccion;
        $this->oc = $oc;
        $this->tipo_documento = $tipo_documento;
        $this->fecha_emitido = $fecha_emitido;
        $this->fecha_enviado = $fecha_enviado;
        $this->fecha_pro_cobro = $fecha_pro_cobro;
        $this->fecha_cobro=$fecha_cobro;
        $this->monto_cobro=$monto_cobro;
        $this->estado_cobro = $estado_cobro;
    }

    public function Agregar($con)
    {
        $compra=0;
        $venta=0;
        $query = "SELECT * from tipo_cambio where fecha='$this->fecha_emitido' limit 1";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($res)) :
            $compra=$row['compra'];
            $venta=$row['venta'];
        endwhile;
        $this->detraccion=((($this->dias_val*$this->costo_dia)-$this->descuento)*0.1)*$venta;
        $this->monto_cobro=(($this->dias_val*$this->costo_dia)-$this->descuento)-((($this->dias_val*$this->costo_dia)-$this->descuento)*0.1);
        $hoy = date("Y-m-d");
        $insertar = "INSERT INTO cobros(fecha_servicio, cliente, descripcion,unidad, tipo_servicio, contrato,moneda,dias_val, 
        costo_dia, descuento, detraccion, fecha_detraccion,estado_detraccion,oc,tipo_documento,fecha_emitido,fecha_enviado,fecha_pro_cobro,fecha_cobro, 
        monto_cobro, estado_cobro, estado) VALUES
        ('$this->fecha_servicio','$this->cliente','$this->descripcion','$this->unidad','$this->tipo_servicio','$this->contrato','$this->moneda',
        '$this->dias_val','$this->costo_dia','$this->descuento','$this->detraccion','$this->fecha_detraccion','$this->estado_detraccion','$this->oc','$this->tipo_documento',
        '$this->fecha_emitido','$this->fecha_enviado','$this->fecha_pro_cobro','$this->fecha_cobro',
        '$this->monto_cobro','$this->estado_cobro','1')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Cobro Registrado al Sistema");
        } else {
            MensajeError("Cobro No Pudo Ser Registrado al Sistema");
            //MensajeError($insertar);
        }
    }

    public function Modificar($con)
    {
        $compra=0;
        $venta=0;
        $query = "SELECT * from tipo_cambio where fecha='$this->fecha_emitido' limit 1";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($res)) :
            $compra=$row['compra'];
            $venta=$row['venta'];
        endwhile;
        $this->detraccion=((($this->dias_val*$this->costo_dia)-$this->descuento)*0.1)*$venta;
        $this->monto_cobro=(($this->dias_val*$this->costo_dia)-$this->descuento)-((($this->dias_val*$this->costo_dia)-$this->descuento)*0.1);
        $modificar = "Delete from cobros where id='$this->id'";
        $exe = mysqli_query($con, $modificar);
        $hoy = date("Y-m-d");
        $insertar = "INSERT INTO cobros(id,fecha_servicio, cliente, descripcion,unidad, tipo_servicio, contrato,moneda,dias_val, 
        costo_dia, descuento, detraccion, fecha_detraccion,estado_detraccion,oc,tipo_documento,fecha_emitido,fecha_enviado,fecha_pro_cobro,fecha_cobro, 
        monto_cobro, estado_cobro, estado) VALUES
        ('$this->id','$this->fecha_servicio','$this->cliente','$this->descripcion','$this->unidad','$this->tipo_servicio','$this->contrato','$this->moneda',
        '$this->dias_val','$this->costo_dia','$this->descuento','$this->detraccion','$this->fecha_detraccion','$this->estado_detraccion','$this->oc','$this->tipo_documento',
        '$this->fecha_emitido','$this->fecha_enviado','$this->fecha_pro_cobro','$this->fecha_cobro',
        '$this->monto_cobro','$this->estado_cobro','1')";
        $exe1 = mysqli_query($con, $insertar);
        if ($exe1 !== false) {
            MensajeExitoso("Cobro Modificado");
            //MensajeError($modificar);
        } else {
            MensajeError("Cobro No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE cobros SET estado='0' WHERE id = '$this->id'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Cobro Eliminado del Sistema");
        } else {
            MensajeError("Cobro No Pudo Ser Eliminado");
        }
    }
}