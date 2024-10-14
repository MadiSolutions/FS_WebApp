<?php
class Asig_operacion
{
    public $cod_asig_operacion;
    public $dni;
    public $jornada;
    public $cliente;
    public $fecha_inicio;
    public $estado;
    function __construct($cod_asig_operacion,$dni,$jornada,$cliente,$fecha_inicio,$estado)
    {
        $this->cod_asig_operacion = $cod_asig_operacion;
        $this->dni = $dni;
        $this->jornada = $jornada;
        $this->cliente = $cliente;
        $this->fecha_inicio = $fecha_inicio;
        $this->estado = $estado;
    }
    
    public function Agregar($con)
    {   
        $insertar = "INSERT INTO asignaciones_operacion(dni,jornada,cliente,fecha_inicio,estado) VALUES('$this->dni','$this->jornada','$this->cliente','$this->fecha_inicio','$this->estado')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Asignacion Registrada al Sistema ");
        } else {
            MensajeError("Asignacion No Pudo Ser Registrada al Sistema");
        }
    }
    public function Modificar($con)
    {
        $modificar = "UPDATE asignaciones_operacion SET jornada='$this->jornada',cliente='$this->cliente', fecha_inicio='$this->fecha_inicio' WHERE cod_asig_operacion='$this->cod_asig_operacion'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Asignacion Modificada ");
        } else {
            MensajeError("Asignacion No Pudo Ser Modificada");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE asignaciones_operacion SET estado='0' WHERE cod_asig_operacion = '$this->cod_asig_operacion'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Asignacion Eliminada del Sistema ");
        } else {
            MensajeError("Asignacion No Pudo Ser Eliminado");
        }
    }
}
