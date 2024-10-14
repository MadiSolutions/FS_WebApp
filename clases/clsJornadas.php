<?php
class Jornada
{
    public $cod_servicio;
    public $tipo_servicio;
    public $descripcion_servicio;
    public $estado;

    function __construct($cod_servicio, $tipo_servicio,$descripcion_servicio,$estado)
    {
        $this->cod_servicio = $cod_servicio;
        $this->tipo_servicio = $tipo_servicio;
        $this->descripcion_servicio = $descripcion_servicio;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO jornadas(tipo_servicio, descripcion_servicio, estado)
        VALUES('$this->tipo_servicio','$this->descripcion_servicio',1)";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Jornada Registrada al Sistema");
        } else {
            MensajeError("Jornada No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE jornadas SET tipo_servicio ='$this->tipo_servicio',descripcion_servicio='$this->descripcion_servicio' WHERE cod_servicio = '$this->cod_servicio';";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Jornada Modificada");
            //MensajeExitoso($modificar);
        } else {
            MensajeError("Jornada No Pudo Ser Modificado");
            //MensajeExitoso($modificar);
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE jornadas SET estado='0' WHERE cod_servicio = '$this->cod_servicio'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            //MensajeExitoso($eliminar);
            MensajeExitoso("Jornada Eliminada del Sistema");
        } else {
            MensajeError("Jornada No Pudo Ser Eliminado");
            //MensajeExitoso($eliminar);
        }
    }
}
