<?php
class MisResultados
{
    public $cod_examen;
    public $tipo_examen;
    public $detalle;
    public $fecha;
    public $dni_paciente;
    public $dni_responsable;
    public $flag;
    public $ruta_cargapdf;
    public $flagzip;
    public $ruta_cargazip;

    function __construct($cod_examen, $tipo_examen, $detalle, $fecha, $dni_paciente,$dni_responsable,$flag,$ruta_cargapdf,$flagzip,$ruta_cargazip)
    {
        $this->cod_examen = $cod_examen;
        $this->tipo_examen = $tipo_examen;
        $this->detalle = $detalle;
        $this->fecha = $fecha;
        $this->dni_paciente = $dni_paciente;
        $this->dni_responsable = $dni_responsable;
        $this->flag = $flag;
        $this->ruta_cargapdf=$ruta_cargapdf;
        $this->flagzip= $flagzip;
        $this->ruta_cargazip=$ruta_cargazip;
    }

    public function Agregar($con)
    {
        if($this->flag==1){
            if($this->flagzip==1){
                $insertar = "INSERT INTO resultados(tipo_examen,detalle,fecha,dni_paciente,dni_responsable,estado_examen,url_resultado,url_imagen)
                VALUES('$this->tipo_examen', '$this->detalle', '$this->fecha', '$this->dni_paciente', '$this->dni_responsable',1,'$this->ruta_cargapdf','$this->ruta_cargazip')";
                $exe = mysqli_query($con, $insertar);
                if ($exe !== false) {
                    MensajeExitoso("Resultado Registrado al Sistema, PDF OK, ZIP OK ");
                    //MensajeExitoso("INSERT INTO resultados(tipo_examen,detalle,fecha,dni_paciente,dni_responsable,estado_examen,url_resultado,url_imagen) VALUES('$this->tipo_examen', '$this->detalle', '$this->fecha', '$this->dni_paciente', '$this->dni_responsable',1,'$this->ruta_cargapdf',$this->ruta_cargazip)");
                }else{
                    MensajeError("Resultado no Registrado");
                    //MensajeExitoso("INSERT INTO resultados(tipo_examen,detalle,fecha,dni_paciente,dni_responsable,estado_examen,url_resultado,url_imagen) VALUES('$this->tipo_examen', '$this->detalle', '$this->fecha', '$this->dni_paciente', '$this->dni_responsable',1,'$this->ruta_cargapdf',$this->ruta_cargazip)");
                }
            }else{
                $insertar = "INSERT INTO resultados(tipo_examen,detalle,fecha,dni_paciente,dni_responsable,estado_examen,url_resultado)
                VALUES('$this->tipo_examen', '$this->detalle', '$this->fecha', '$this->dni_paciente', '$this->dni_responsable',1,'$this->ruta_cargapdf')";
                $exe = mysqli_query($con, $insertar);
                if ($exe !== false) {
                    MensajeExitoso("Resultado Registrado al Sistema, PDF OK, ZIP NO ");
                    //MensajeExitoso("INSERT INTO resultados(tipo_examen,detalle,fecha,dni_paciente,dni_responsable,estado_examen,url_resultado,url_imagen) VALUES('$this->tipo_examen', '$this->detalle', '$this->fecha', '$this->dni_paciente', '$this->dni_responsable',1,'$this->ruta_cargapdf',$this->ruta_cargazip)");
                }else{
                    MensajeError("Resultado no Registrado");
                    //MensajeExitoso("INSERT INTO resultados(tipo_examen,detalle,fecha,dni_paciente,dni_responsable,estado_examen,url_resultado,url_imagen) VALUES('$this->tipo_examen', '$this->detalle', '$this->fecha', '$this->dni_paciente', '$this->dni_responsable',1,'$this->ruta_cargapdf',$this->ruta_cargazip)");
                }
            }
        }else {
            if($this->flagzip==1){
                $insertar = "INSERT INTO resultados(tipo_examen,detalle,fecha,dni_paciente,dni_responsable,estado_examen,url_imagen)
                VALUES('$this->tipo_examen', '$this->detalle', '$this->fecha', '$this->dni_paciente', '$this->dni_responsable',1,'$this->ruta_cargazip')";
                $exe = mysqli_query($con, $insertar);
                if ($exe !== false) {
                    MensajeExitoso("Resultado Registrado al Sistema, PDF NO, ZIP OK ");
                }else{
                    MensajeError("Resultado no Registrado");
                }
            }else{
                $insertar = "INSERT INTO resultados(tipo_examen,detalle,fecha,dni_paciente,dni_responsable,estado_examen)
                VALUES('$this->tipo_examen', '$this->detalle', '$this->fecha', '$this->dni_paciente', '$this->dni_responsable',1)";
                $exe = mysqli_query($con, $insertar);
                if ($exe !== false) {
                    MensajeExitoso("Resultado Registrado al Sistema, PDF NO, ZIP OK ");
                }else{
                    MensajeError("Resultado no Registrado");
                }
            }
        }
    }

    public function Modificar($con)
    {
        //if($this->ruta_cargapdf!='')
        //{
            if($this->flag==1){
                if($this->flagzip==1){
                    $modificar = "UPDATE resultados SET tipo_examen = '$this->tipo_examen', detalle = '$this->detalle', fecha = '$this->fecha',dni_paciente = '$this->dni_paciente',dni_responsable='$this->dni_responsable',url_resultado='$this->ruta_cargapdf',url_imagen='$this->ruta_cargazip' WHERE cod_examen = '$this->cod_examen'";
                    $exe = mysqli_query($con, $modificar);
                    if ($exe !== false) {
                        MensajeExitoso("Resultado Modificado, PDF OK, ZIP OK");
                    } else {
                        MensajeError("El Resultado No Pudo Ser Modificado");
                    }     
                }else{
                    $modificar = "UPDATE resultados SET tipo_examen = '$this->tipo_examen', detalle = '$this->detalle', fecha = '$this->fecha',dni_paciente = '$this->dni_paciente',dni_responsable='$this->dni_responsable',url_resultado='$this->ruta_cargapdf' WHERE cod_examen = '$this->cod_examen'";
                    $exe = mysqli_query($con, $modificar);
                    if ($exe !== false) {
                        MensajeExitoso("Resultado Modificado, PDF OK, ZIP NO");
                    } else {
                        MensajeError("El Resultado No Pudo Ser Modificado");
                    }    
                }
                
            }else{
                if($this->flagzip==1){
                    $modificar = "UPDATE resultados SET tipo_examen = '$this->tipo_examen', detalle = '$this->detalle', fecha = '$this->fecha',dni_paciente = '$this->dni_paciente',dni_responsable='$this->dni_responsable',url_imagen='$this->ruta_cargazip' WHERE cod_examen = '$this->cod_examen'";
                    $exe = mysqli_query($con, $modificar);
                    if ($exe !== false) {
                        MensajeExitoso("Resultado Modificado, PDF NO, ZIP SI");
                    } else {
                        MensajeError("El Resultado No Pudo Ser Modificado");
                    } 
                }else{
                    $modificar = "UPDATE resultados SET tipo_examen = '$this->tipo_examen', detalle = '$this->detalle', fecha = '$this->fecha',dni_paciente = '$this->dni_paciente',dni_responsable='$this->dni_responsable' WHERE cod_examen = '$this->cod_examen'";
                    $exe = mysqli_query($con, $modificar);
                    if ($exe !== false) {
                        MensajeExitoso("Resultado Modificado, PDF NO, ZIP NO");
                    } else {
                       MensajeError("El Resultado No Pudo Ser Modificado");
                    }   
                }
            }

    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE resultados SET estado_examen='0' WHERE cod_examen = '$this->cod_examen'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Examen Eliminado del Sistema");
        } else {
            MensajeError("El Examen No Pudo Ser Eliminado");
        }
    }
}
