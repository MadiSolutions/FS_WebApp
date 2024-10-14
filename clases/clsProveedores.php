<?php
class Proveedor
{
    public $cod_proveedor;
    public $ruc;
    public $razon_social;
    public $nombre_contacto;
    public $direccion;
    public $ciudad;
    public $telefono;
    public $correo_electronico;
    public $calificacion;
    public $estado;
    function __construct($cod_proveedor,$ruc,$razon_social,$nombre_contacto,$direccion,$ciudad,$telefono,$correo_electronico,$calificacion,$estado)
    {
        $this->cod_proveedor = $cod_proveedor;
        $this->ruc = $ruc;
        $this->razon_social = $razon_social;
        $this->nombre_contacto = $nombre_contacto;
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
        $this->telefono = $telefono;
        $this->correo_electronico = $correo_electronico;
        $this->calificacion = $calificacion;
        $this->estado = $estado;
    }

    public function Agregar($con)
    {   
        $insertar = "INSERT INTO proveedores(ruc, razon_social, nombre_contacto,direccion, ciudad,telefono, correo_electronico, calificacion,estado) VALUES('$this->ruc','$this->razon_social','$this->nombre_contacto','$this->direccion','$this->ciudad','$this->telefono','$this->correo_electronico','$this->calificacion',1)";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Proveedor Registrado al Sistema ");
        } else {
            MensajeError("Proveedor No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE proveedores SET ruc='$this->ruc',razon_social='$this->razon_social',nombre_contacto='$this->nombre_contacto',direccion='$this->direccion',ciudad='$this->ciudad',telefono='$this->telefono',correo_electronico='$this->correo_electronico',calificacion='$this->calificacion' WHERE cod_proveedor='$this->cod_proveedor'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Proveedor Modificado ");
        } else {
            MensajeError("El Proveedor No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE proveedores SET estado='0' WHERE cod_proveedor = '$this->cod_proveedor'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Proveedor Eliminado del Sistema ");
        } else {
            MensajeError("Proveedor No Pudo Ser Eliminado");
        }
    }
}
