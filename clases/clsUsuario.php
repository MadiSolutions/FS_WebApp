<?php
class Usuario
{
    public $user;
    public $contrasena;
    public $tipo_user;
    public $nombre;
    public $estado;
    function __construct($user,$contrasena,$tipo_user,$nombre,$estado)
    {
        $this->user = $user;
        $this->contrasena = $contrasena;
        $this->tipo_user = $tipo_user;
        $this->nombre = $nombre;
        $this->estado = $estado;
    }

    public function Agregar($con)
    {   
        $validar="select * from usuarios where user='$this->user'";
        $consulta=mysqli_query($con,$validar);
        //$array = mysqli_fetch_array($consulta);
        $array=mysqli_num_rows($consulta);  

        if($array==0){
            $insertar = "INSERT INTO usuarios(user, contrasena, tipo_user, nombre,estado)VALUES('$this->user','$this->contrasena','$this->tipo_user','$this->nombre',1)";
            $exe = mysqli_query($con, $insertar);
            if ($exe !== false) {
                MensajeExitoso("Usuario Registrado al Sistema ");
            } else {
                MensajeError("Usuario No Pudo Ser Registrado al Sistema");
            }
        }
        else{
            $activar = "UPDATE usuarios set estado='1', tipo_user='$this->tipo_user' where user='$this->user'";
            $exe = mysqli_query($con, $activar);
            if ($exe !== false) {
                MensajeExitoso("Usuario Registrado al Sistema ");
            } else {
                MensajeError("Usuario No Pudo Ser Registrado al Sistema");
            }
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE usuarios SET contrasena = '$this->contrasena', tipo_user = '$this->tipo_user' WHERE user = '$this->user'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Usuario Modificado ");
        } else {
            MensajeError("El Usuario No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE usuarios SET estado='0' WHERE user = '$this->user'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Usuario Eliminado del Sistema ");
        } else {
            MensajeError("Usuario No Pudo Ser Eliminado");
        }
    }
}
