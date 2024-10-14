<?php
class Cliente
{
    public $cod_cliente;
    public $ruc;
    public $razon_social;
    public $direccion;
    public $telefono;
    public $correo_electronico;
    public $estado;
    function __construct($cod_cliente,$ruc,$razon_social,$direccion,$telefono,$correo_electronico,$estado)
    {
        $this->cod_cliente = $cod_cliente;
        $this->ruc = $ruc;
        $this->razon_social = $razon_social;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo_electronico = $correo_electronico;
        $this->estado = $estado;
    }

    public function Agregar($con)
    {   
        $insertar = "INSERT INTO clientes(ruc, razon_social, direccion, telefono, correo_electronico, estado) VALUES('$this->ruc','$this->razon_social','$this->direccion','$this->telefono','$this->correo_electronico',1)";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Cliente Registrado al Sistema ");
        //MensajeExitoso($insertar);
        } else {
            MensajeError("Cliente No Pudo Ser Registrado al Sistema");
        //MensajeExitoso($insertar);
        
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE clientes SET ruc='$this->ruc',razon_social='$this->razon_social',direccion='$this->direccion',telefono='$this->telefono',correo_electronico='$this->correo_electronico' WHERE cod_cliente='$this->cod_cliente'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Cliente Modificado ");
        } else {
            MensajeError("El Cliente No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE clientes SET estado='0' WHERE cod_cliente = '$this->cod_cliente'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Cliente Eliminado del Sistema ");
        } else {
            MensajeError("Cliente No Pudo Ser Eliminado");
        }
    }
}
