<?php
class Paciente
{
    public $dni;
    public $nombre;
    public $telefono;
    public $correo;
    public $direccion;

    function __construct($dni, $nombre, $telefono, $correo, $direccion)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->direccion = $direccion;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO usuarios(dni, nombre, direccion, telefono, correo, tipo_user,contra,estado)
        VALUES('$this->dni', '$this->nombre', '$this->direccion', '$this->telefono', '$this->correo', 3,'$this->dni',1)";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Paciente Registrado al Sistema");
        } else {
            MensajeError("El Paciente No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE usuarios SET nombre = '$this->nombre', direccion = '$this->direccion', telefono = '$this->telefono',correo = '$this->correo' WHERE dni = '$this->dni'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Paciente Modificado");
        } else {
            MensajeError("El Paciente No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE usuarios SET estado='0' WHERE dni = '$this->dni'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Paciente Eliminado del Sistema");
        } else {
            MensajeError("El Paciente No Pudo Ser Eliminado");
        }
    }
}
