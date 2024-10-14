<?php
date_default_timezone_set('America/Lima');
class Vencdoc_Personal
{
    public $id_personal ;
    public $dni ;
    public $inicio_dni;
    public $venc_dni;
    public $licencia_mtc;
    public $venc_licencia_mtc;
    public $num_contrato,$fecha_ingreso_contrato,$fecha_termino_contrato,$venc_contrato,$licencia_interna,$examen_medico,$curso_induccion,$manejo_teorico;
    public $manejo_practico,$sctr,$vida_ley,$user;

    function __construct($id_personal,$dni,$inicio_dni,$venc_dni,$licencia_mtc,$venc_licencia_mtc,$num_contrato,$fecha_ingreso_contrato,$fecha_termino_contrato,$venc_contrato,$licencia_interna,$examen_medico,$curso_induccion,$manejo_teorico,$manejo_practico,$sctr,$vida_ley,$user)
    {
        $this->id_personal = $id_personal;
        $this->dni = $dni;
        $this->inicio_dni = $inicio_dni;
        $this->venc_dni = $venc_dni;
        $this->licencia_mtc = $licencia_mtc;
        $this->venc_licencia_mtc = $venc_licencia_mtc;
        $this->num_contrato = $num_contrato;
        $this->fecha_ingreso_contrato = $fecha_ingreso_contrato;
        $this->fecha_termino_contrato = $fecha_termino_contrato;
        $this->venc_contrato = $venc_contrato;
        $this->licencia_interna = $licencia_interna;
        $this->examen_medico = $examen_medico;
        $this->curso_induccion = $curso_induccion;
        $this->manejo_teorico = $manejo_teorico;
        $this->manejo_practico = $manejo_practico;
        $this->sctr = $sctr;
        $this->vida_ley = $vida_ley;
        $this->user=$user;
    }

    public function Modificar($con)
    {
        $hoy = date("Y-m-d H:m:s" );
        $insertar_vencdoc_log="INSERT INTO cambios_log(fechayhora, user, tipo_movimiento, tabla,cod_item) VALUES ('$hoy','$this->user','ACTUALIZACION DOCUMENTARIA','Personal','$this->id_personal');";
        $exe = mysqli_query($con, $insertar_vencdoc_log);
        $modificar = "UPDATE personal SET inicio_dni='$this->inicio_dni',venc_dni='$this->venc_dni',licencia_mtc='$this->licencia_mtc',venc_licencia_mtc='$this->venc_licencia_mtc',
                    num_contrato='$this->num_contrato',fecha_ingreso_contrato='$this->fecha_ingreso_contrato',fecha_termino_contrato='$this->fecha_termino_contrato',venc_contrato='$this->venc_contrato',licencia_interna='$this->licencia_interna',
                    examen_medico='$this->examen_medico',curso_induccion='$this->curso_induccion',manejo_teorico='$this->manejo_teorico',manejo_practico='$this->manejo_practico',
                    sctr='$this->sctr',vida_ley='$this->vida_ley' where id_personal='$this->id_personal'";
        $exe1 = mysqli_query($con, $modificar);
        if ($exe1 !== false && $exe!== false) {
            MensajeExitoso("Documento Actualizado");
            //MensajeError($modificar);
        } else {
            MensajeError("Documento No Pudo Ser Actualizado");
            //MensajeError($modificar);
        }
    }
}