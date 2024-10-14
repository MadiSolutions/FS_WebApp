<?php
class Pagos
{
    public $id;
    public $fecha_servicio,$proveedor,$descripcion,$unidad,$tipo_servicio,$valo,$moneda,$dias_val,$costo_dia,$descuento,$medio_envio_valo,$fecha_envio_valo,$detraccion;
    public $estado_detraccion,$fecha_detraccion,$tipo_documento, $num_documento,$fecha_emitido,$fecha_recepcionado,$compromiso_pago,$fecha_pago,$monto_pago,$estado_pago;

    function __construct($id,$fecha_servicio,$proveedor,$descripcion,$unidad,
    $tipo_servicio,$valo,$moneda,$dias_val,$costo_dia,
    $descuento,$medio_envio_valo,$fecha_envio_valo,$detraccion,
    $estado_detraccion,$fecha_detraccion,$tipo_documento, $num_documento,
    $fecha_emitido,$fecha_recepcionado,
    $compromiso_pago,$fecha_pago,$monto_pago,$estado_pago)
    {
        $this->id=$id;
        $this->fecha_servicio=$fecha_servicio;
        $this->proveedor=$proveedor;
        $this->descripcion=$descripcion;
        $this->unidad = $unidad;
        $this->tipo_servicio = $tipo_servicio;
        $this->valo = $valo;
        $this->moneda = $moneda;
        $this->dias_val=$dias_val;
        $this->costo_dia=$costo_dia;
        $this->descuento=$descuento;
        $this->medio_envio_valo=$medio_envio_valo;
        $this->fecha_envio_valo=$fecha_envio_valo;
        $this->detraccion = $detraccion; 
        $this->estado_detraccion = $estado_detraccion;
        $this->fecha_detraccion = $fecha_detraccion;
        $this->tipo_documento = $tipo_documento;
        $this->num_documento = $num_documento;
        $this->fecha_emitido = $fecha_emitido;
        $this->fecha_recepcionado = $fecha_recepcionado;
        $this->compromiso_pago = $compromiso_pago;
        $this->fecha_pago=$fecha_pago;
        $this->monto_pago=$monto_pago;
        $this->estado_pago = $estado_pago;
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
        $this->monto_pago=(($this->dias_val*$this->costo_dia)-$this->descuento)-((($this->dias_val*$this->costo_dia)-$this->descuento)*0.1);
        $hoy = date("Y-m-d");
        $insertar = "INSERT INTO pagos( fecha_servicio, proveedor, descripcion, unidad, tipo_servicio, detraccion, fecha_detraccion, 
        estado_detraccion, valo, medio_envio_valo, fecha_envio_valo, moneda, dias_val, costo_dia, descuento, tipo_documento, num_doc,
        fecha_emitido, fecha_recepcionado, compromiso_pago, fecha_pago, monto_pago, estado_pago,estado) VALUES
        ('$this->fecha_servicio','$this->proveedor','$this->descripcion','$this->unidad','$this->tipo_servicio','$this->detraccion','$this->fecha_detraccion',
        '$this->estado_detraccion','$this->valo','$this->medio_envio_valo','$this->fecha_envio_valo','$this->moneda','$this->dias_val','$this->costo_dia','$this->descuento',
        '$this->tipo_documento','$this->num_documento','$this->fecha_emitido','$this->fecha_recepcionado','$this->compromiso_pago','$this->fecha_pago','$this->monto_pago','$this->estado_pago','1')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Pago Registrado al Sistema");
        } else {
            MensajeError("Pago No Pudo Ser Registrado al Sistema");
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
        $this->monto_pago=(($this->dias_val*$this->costo_dia)-$this->descuento)-((($this->dias_val*$this->costo_dia)-$this->descuento)*0.1);
        $modificar = "Delete from pagos where id='$this->id'";
        $exe = mysqli_query($con, $modificar);
        $hoy = date("Y-m-d");
        $insertar = "INSERT INTO pagos( id,fecha_servicio, proveedor, descripcion, unidad, tipo_servicio, detraccion, fecha_detraccion, 
        estado_detraccion, valo, medio_envio_valo, fecha_envio_valo, moneda, dias_val, costo_dia, descuento, tipo_documento, num_doc,
        fecha_emitido, fecha_recepcionado, compromiso_pago, fecha_pago, monto_pago, estado_pago,estado) VALUES
        ('$this->id','$this->fecha_servicio','$this->proveedor','$this->descripcion','$this->unidad','$this->tipo_servicio','$this->detraccion','$this->fecha_detraccion',
        '$this->estado_detraccion','$this->valo','$this->medio_envio_valo','$this->fecha_envio_valo','$this->moneda','$this->dias_val','$this->costo_dia','$this->descuento',
        '$this->tipo_documento','$this->num_documento','$this->fecha_emitido','$this->fecha_recepcionado','$this->compromiso_pago','$this->fecha_pago','$this->monto_pago','$this->estado_pago','1')";
        $exe1 = mysqli_query($con, $insertar);
        if ($exe1 !== false) {
            MensajeExitoso("Pago Modificado");
            //MensajeError($modificar);
        } else {
            MensajeError("Pago No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE pagos SET estado='0' WHERE id = '$this->id'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Pago Eliminado del Sistema");
        } else {
            MensajeError("Pago No Pudo Ser Eliminado");
        }
    }
}