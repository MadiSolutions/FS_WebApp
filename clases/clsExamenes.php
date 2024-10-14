<?php
class Examen
{
    public $codigo;
    public $descripcion;

    function __construct($codigo, $descripcion)
    {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO tipo_examen(descripcion,estado)
        VALUES('$this->descripcion',1)";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Examen Registrado al Sistema");
        } else {
            MensajeError("El Examen No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE tipo_examen SET descripcion = '$this->descripcion' WHERE codigo = '$this->codigo'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Examen Modificado");
        } else {
            MensajeError("El Examen No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE tipo_examen SET estado='0' WHERE codigo = '$this->codigo'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Examen Eliminado del Sistema");
        } else {
            MensajeError("El Examen No Pudo Ser Eliminado");
        }
    }
}
