<?php
class Mantenimiento
{
    public $cod_vehiculo;
    public $km_actual;
    public $fecha;
    public $tipo_mantenimiento;
    public $motivo_mantenimiento;
    public $fecha_inicio_mantenimiento;
    public $fecha_fin_mantenimiento;
    public $detalle_mantenimiento;

    function __construct($cod_vehiculo, $km_actual,$fecha,$tipo_mantenimiento,$motivo_mantenimiento,$fecha_inicio_mantenimiento,$fecha_fin_mantenimiento,$detalle_mantenimiento)
    {
        $this->cod_vehiculo = $cod_vehiculo;
        $this->km_actual = $km_actual;
        $this->fecha = $fecha;
        $this->tipo_mantenimiento = $tipo_mantenimiento;
        $this->motivo_mantenimiento = $motivo_mantenimiento;
        $this->fecha_inicio_mantenimiento = $fecha_inicio_mantenimiento;
        $this->fecha_fin_mantenimiento=$fecha_fin_mantenimiento;
        $this->detalle_mantenimiento = $detalle_mantenimiento;
    }

    public function Agregar($con)
    {
        $infovehi="select placa,cod_vehiculo,km_actual from vehiculos where cod_vehiculo='$this->cod_vehiculo' limit 1; ";
        $consulta=mysqli_query($con,$infovehi);
        $array = mysqli_fetch_array($consulta);
        $km_inicial=$array['km_actual'];
        $placa=$array['placa'];


        $obtultimo="select id_mantenimiento from mantenimientos order by id_mantenimiento desc limit 1; ";
        $consulta=mysqli_query($con,$obtultimo);
        $row_cnt = $consulta->num_rows;
        $num_documento=0;
        $array = mysqli_fetch_array($consulta);
        if($row_cnt>0){
            $referencia=$array['id_mantenimiento'];
            $referencia = explode(".", $referencia);
            $num_documento=$referencia[0].'.'.$referencia[1]+1;
        }
        else{
            $num_documento=0;
        }

        $cadenaA="INSERT INTO mantenimientos(id_mantenimiento, cod_vehiculo,km_inicial,km_actual,fecha,tipo_mantenimiento,motivo_mantenimiento,fecha_inicio_mantenimiento,fecha_fin_mantenimiento,descripcion,costo, estado) VALUES";
        $cadenaB="";
        $item = count($this->detalle_mantenimiento);

        $pago=0;
        for($i=0;$i<$item;$i++){
            $DES=$this->detalle_mantenimiento[$i]['descripcion'];
            $COS=$this->detalle_mantenimiento[$i]['costo'];
            $cadenaB=$cadenaB."('$num_documento','$this->cod_vehiculo','$km_inicial','$this->km_actual','$this->fecha','$this->tipo_mantenimiento','$this->motivo_mantenimiento','$this->fecha_inicio_mantenimiento','$this->fecha_fin_mantenimiento','$DES','$COS','1'),";
            $pago=$pago+$COS;
        }

        $cadenaB = substr($cadenaB, 0, -1);
        $exe = mysqli_query($con, $cadenaA.$cadenaB);


        $insertar = "INSERT INTO pagos( fecha_servicio, proveedor, descripcion, unidad, tipo_servicio, detraccion, fecha_detraccion, 
        estado_detraccion, valo, medio_envio_valo, fecha_envio_valo, moneda, dias_val, costo_dia, descuento, tipo_documento, num_doc,
        fecha_emitido, fecha_recepcionado, compromiso_pago, fecha_pago, monto_pago, estado_pago,estado) VALUES
        ('$this->fecha','-','$this->tipo_mantenimiento','$placa','MANTENIMIENTO DE UNIDADES','-','-',
        'PENDIENTE','-','-','-','SOLES','0','0','0',
        '-','0','0','0','0','0','$pago','PENDIENTE','1')";

        $exe1 = mysqli_query($con, $insertar);





        if ($exe !== false && $exe1 !== false) {
            $_SESSION['carrito_mantenimiento'] = array();
            MensajeExitoso("Mantenimiento Registrado al Sistema");
        } else {
            MensajeError("Mantenimiento No Pudo Ser Registrado al Sistema");
        }
    }


    public function Eliminar($con)
    {
        //se uso el cod_vehiculo para recibir el cod del mantenimiento
        $eliminar = "UPDATE mantenimientos SET estado='0' WHERE id_mantenimiento = '$this->cod_vehiculo'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            //MensajeExitoso($eliminar);
            MensajeExitoso("Mantenimiento Eliminado del Sistema");
        } else {
            MensajeError("Mantenimiento No Pudo Ser Eliminado");
            //MensajeExitoso($eliminar);
        }
    }
}
