<?php
class Tarea
{
    public $id_tarea;
    public $fecha_registro;
    public $fecha_vencimiento;
    public $descripcion;
    public $asignada_por;
    public $asignada_a;
    public $estado_tarea;
    public $observacion;
    public $fecha_endesarrollo;
    public $fecha_enviadoarevision;
    public $fecha_calificado;
    function __construct($id_tarea,$fecha_registro,$fecha_vencimiento,$descripcion,$asignada_por,$asignada_a,$estado_tarea,$observacion,$fecha_endesarrollo,$fecha_enviadoarevision,$fecha_calificado)
    {
        $this->id_tarea = $id_tarea;
        $this->fecha_registro = $fecha_registro;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->descripcion = $descripcion;
        $this->asignada_por = $asignada_por;
        $this->asignada_a = $asignada_a;
        $this->estado_tarea = $estado_tarea;
        $this->observacion = $observacion;
        $this->fecha_endesarrollo = $fecha_endesarrollo;
        $this->fecha_enviadoarevision = $fecha_enviadoarevision;
        $this->fecha_calificado = $fecha_calificado;
    }

    public function Agregar($con)
    {   
        $insertar = "INSERT INTO tareas(fecha_registro,fecha_vencimiento,descripcion,asignada_por,asignada_a,estado_tarea,observacion,estado)VALUES('$this->fecha_registro','$this->fecha_vencimiento','$this->descripcion','$this->asignada_por','$this->asignada_a','$this->estado_tarea','$this->observacion',1)";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Tarea Registrada");
        } else {
            MensajeError("Tarea No Pudo Ser Registrada");
        }
    }

    public function Modificar($con)
    {
        $hoy=date("Y-m-d"); 
        //$fecha_endesarrollo='2001-01-01';
        //$fecha_enviadoarevision='2001-01-01';
        //$fecha_calificado='2001-01-01';
        if($this->estado_tarea=='EN DESARROLLO' && $this->fecha_endesarrollo=='2001-01-01'){$this->fecha_endesarrollo=$hoy;}
        if($this->estado_tarea=='ENVIADO A REVISION' && $this->fecha_enviadoarevision=='2001-01-01'){$this->fecha_enviadoarevision=$hoy;}
        if(($this->estado_tarea=='ACEPTADO' || $this->estado_tarea=='RECHAZADO') && $this->fecha_calificado=='2001-01-01'){$this->fecha_calificado=$hoy;}

        $modificar = "UPDATE tareas SET fecha_registro='$this->fecha_registro',fecha_endesarrollo='$this->fecha_endesarrollo',fecha_enviadoarevision='$this->fecha_enviadoarevision',fecha_calificado='$this->fecha_calificado',fecha_vencimiento='$this->fecha_vencimiento',descripcion='$this->descripcion',asignada_por='$this->asignada_por',asignada_a='$this->asignada_a',estado_tarea='$this->estado_tarea',observacion='$this->observacion' WHERE id_tarea='$this->id_tarea'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Tarea Modificada");
        } else {
            //MensajeError($modificar);
            MensajeError("La Tarea No Pudo Ser Modificada");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE tareas SET estado='0' WHERE id_tarea ='$this->id_tarea'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            //MensajeExitoso($eliminar);
            MensajeExitoso("Tarea Eliminada");
        } else {
            MensajeError("Tarea No Pudo Ser Eliminada");
        }
    }
}
