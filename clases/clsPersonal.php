<?php
class Personal
{
    public $id_personal;
    public $pais,$ubigeo,$mina_ciudad;
    public $nombres;
    public $fecha_nacimiento;
    public $lugar_nacimiento;
    public $dni,$inicio_dni,$venc_dni;
    public $direccion; 
    public $estado_civil;
    public $nombre_esposoa, $dni_esposoa,$num_hijos,$datos_hijos;
    public $sistema_pensiones,$nombre_afp,$cuenta_sistema_pensiones,$grado_instruccion,$tipo_licencia_conducir,$num_licencia_conducir,$licencia_mtc,$venc_licencia_mtc,$grupo_sanguineo,$telefono;
    public $nombre_emergencia,$telefono_emergencia,$direccion_emergencia,$correo_electronico,$cargo;
    public $banco_salario,$nro_cuenta_salario,$banco_cts,$nro_cuenta_cts,$salario;
    public $num_contrato,$fecha_ingreso_contrato,$fecha_termino_contrato,$venc_contrato,$licencia_interna,$venc_licencia_interna,$examen_medico,$venc_examen_medico,$curso_induccion,$venc_curso_induccion,$manejo_teorico,$venc_manejo_teorico;
    public $manejo_practico,$venc_manejo_practico,$sctr,$venc_sctr,$vida_ley,$venc_vida_ley;

    function __construct($id_personal,$pais,$ubigeo,$mina_ciudad,$nombres,$dni,$inicio_dni,$venc_dni,$direccion,$telefono,$correo_electronico,$grado_instruccion,
                        $fecha_nacimiento,$lugar_nacimiento,$grupo_sanguineo,$cargo,$tipo_licencia_conducir,$num_licencia_conducir,$licencia_mtc,$venc_licencia_mtc,
                        $estado_civil,$nombre_esposoa,$dni_esposoa,$num_hijos,$datos_hijos,$salario,$banco_salario,$nro_cuenta_salario,$banco_cts,$nro_cuenta_cts,
                        $sistema_pensiones,$nombre_afp,$cuenta_sistema_pensiones,$nombre_emergencia,$telefono_emergencia,$direccion_emergencia,$num_contrato,
                        $fecha_ingreso_contrato,$fecha_termino_contrato,$venc_contrato,$licencia_interna,$venc_licencia_interna,$examen_medico,$venc_examen_medico,
                        $curso_induccion,$venc_curso_induccion,$manejo_teorico,$venc_manejo_teorico,$manejo_practico,$venc_manejo_practico,$sctr,$venc_sctr,
                        $vida_ley,$venc_vida_ley)
    {
        $this->id_personal=$id_personal;
        $this->pais=$pais;
        $this->ubigeo=$ubigeo;
        $this->mina_ciudad=$mina_ciudad;
        $this->nombres = $nombres;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->lugar_nacimiento = $lugar_nacimiento;
        $this->dni = $dni;
        $this->inicio_dni=$inicio_dni;
        $this->venc_dni=$venc_dni;
        $this->id_personal=$id_personal;
        $this->direccion = $direccion; 
        $this->estado_civil = $estado_civil;
        $this->nombre_esposoa = $nombre_esposoa;
        $this->dni_esposoa = $dni_esposoa;
        $this->num_hijos = $num_hijos;
        $this->datos_hijos = $datos_hijos;
        $this->sistema_pensiones = $sistema_pensiones;
        $this->nombre_afp=$nombre_afp;
        $this->cuenta_sistema_pensiones=$cuenta_sistema_pensiones;
        $this->grado_instruccion = $grado_instruccion;
        $this->tipo_licencia_conducir = $tipo_licencia_conducir;
        $this->num_licencia_conducir = $num_licencia_conducir;
        $this->licencia_mtc=$licencia_mtc;
        $this->venc_licencia_mtc=$venc_licencia_mtc;
        $this->grupo_sanguineo = $grupo_sanguineo;
        $this->telefono = $telefono;
        $this->nombre_emergencia = $nombre_emergencia;
        $this->telefono_emergencia = $telefono_emergencia;
        $this->direccion_emergencia = $direccion_emergencia;
        $this->correo_electronico = $correo_electronico;
        $this->cargo=$cargo;
        $this->salario = $salario;
        $this->banco_salario = $banco_salario;
        $this->nro_cuenta_salario = $nro_cuenta_salario;
        $this->banco_cts = $banco_cts;
        $this->nro_cuenta_cts = $nro_cuenta_cts;
        $this->num_contrato = $num_contrato;
        $this->fecha_ingreso_contrato = $fecha_ingreso_contrato;
        $this->fecha_termino_contrato = $fecha_termino_contrato;
        $this->venc_contrato = $venc_contrato;
        $this->licencia_interna = $licencia_interna;
        $this->venc_licencia_interna = $venc_licencia_interna;
        $this->examen_medico = $examen_medico;
        $this->venc_examen_medico = $venc_examen_medico;
        $this->curso_induccion = $curso_induccion;
        $this->venc_curso_induccion = $venc_curso_induccion;
        $this->manejo_teorico = $manejo_teorico;
        $this->venc_manejo_teorico = $venc_manejo_teorico;
        $this->manejo_practico = $manejo_practico;
        $this->venc_manejo_practico = $venc_manejo_practico;
        $this->sctr = $sctr;
        $this->venc_sctr = $venc_sctr;
        $this->vida_ley = $vida_ley;
        $this->venc_vida_ley = $venc_vida_ley;
    }

    public function Agregar($con)
    {
        $hoy = date("Y-m-d");
        $insertar = "INSERT INTO personal(fecha_registro, pais,ubigeo,mina_ciudad,nombres, fecha_nacimiento, lugar_nacimiento, dni, inicio_dni,venc_dni,direccion, estado_civil, 
        nombre_esposoa, dni_esposoa, num_hijos, datos_hijos, sistema_pensiones, nombre_afp,cuenta_sistema_pensiones, grado_instruccion, tipo_licencia_conducir,
        num_licencia_conducir, licencia_mtc,venc_licencia_mtc,grupo_sanguineo, telefono, nombre_emergencia, telefono_emergencia, direccion_emergencia, correo_electronico, cargo, salario, 
        banco_salario, nro_cuenta_salario, banco_cts, nro_cuenta_cts, num_contrato, fecha_ingreso_contrato, fecha_termino_contrato, venc_contrato, licencia_interna, 
        venc_licencia_interna, examen_medico, venc_examen_medico, curso_induccion, venc_curso_induccion, manejo_teorico, venc_manejo_teorico, manejo_practico, venc_manejo_practico, sctr,venc_sctr,vida_ley,venc_vida_ley,estado) VALUES
        ('$hoy','$this->pais','$this->ubigeo','$this->mina_ciudad','$this->nombres','$this->fecha_nacimiento','$this->lugar_nacimiento','$this->dni',
        '$this->inicio_dni','$this->venc_dni','$this->direccion','$this->estado_civil','$this->nombre_esposoa','$this->dni_esposoa','$this->num_hijos',
        '$this->datos_hijos','$this->sistema_pensiones','$this->nombre_afp','$this->cuenta_sistema_pensiones',
        '$this->grado_instruccion','$this->tipo_licencia_conducir','$this->num_licencia_conducir','$this->licencia_mtc','$this->venc_licencia_mtc',
        '$this->grupo_sanguineo','$this->telefono','$this->nombre_emergencia','$this->telefono_emergencia','$this->direccion_emergencia','$this->correo_electronico',
        '$this->cargo','$this->salario','$this->banco_salario','$this->nro_cuenta_salario','$this->banco_cts','$this->nro_cuenta_cts','$this->num_contrato',
        '$this->fecha_ingreso_contrato','$this->fecha_termino_contrato','$this->venc_contrato','$this->licencia_interna','+1 year','$this->examen_medico','+1 year',
        '$this->curso_induccion','+1 year','$this->manejo_teorico','+1 year','$this->manejo_practico','+1 year','$this->sctr','+1 month','$this->vida_ley','+6 month','1')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            $directorio = '../documentos/Boletas_Pago/'.$this->dni;
            mkdir($directorio, 0755, true);
            MensajeExitoso("Personal Registrado al Sistema");
        } else {
            //MensajeError("Personal No Pudo Ser Registrado al Sistema");
            MensajeError($insertar);
        }
    }

    public function Modificar($con)
    {
        $modificar = "Delete from personal where id_personal='$this->id_personal'";
        $exe = mysqli_query($con, $modificar);
        $hoy = date("Y-m-d");
        $insertar = "INSERT INTO personal(id_personal,fecha_registro, pais,ubigeo,mina_ciudad,nombres, fecha_nacimiento, lugar_nacimiento, dni, inicio_dni,venc_dni,direccion, estado_civil, 
        nombre_esposoa, dni_esposoa, num_hijos, datos_hijos, sistema_pensiones, nombre_afp,cuenta_sistema_pensiones, grado_instruccion, tipo_licencia_conducir,
        num_licencia_conducir, licencia_mtc,venc_licencia_mtc,grupo_sanguineo, telefono, nombre_emergencia, telefono_emergencia, direccion_emergencia, correo_electronico, cargo, salario, 
        banco_salario, nro_cuenta_salario, banco_cts, nro_cuenta_cts, num_contrato, fecha_ingreso_contrato, fecha_termino_contrato, venc_contrato, licencia_interna, 
        venc_licencia_interna, examen_medico, venc_examen_medico, curso_induccion, venc_curso_induccion, manejo_teorico, venc_manejo_teorico, manejo_practico, venc_manejo_practico, sctr,venc_sctr,vida_ley,venc_vida_ley,estado) VALUES
        ('$this->id_personal','$hoy','$this->pais','$this->ubigeo','$this->mina_ciudad','$this->nombres','$this->fecha_nacimiento','$this->lugar_nacimiento','$this->dni',
        '$this->inicio_dni','$this->venc_dni','$this->direccion','$this->estado_civil','$this->nombre_esposoa','$this->dni_esposoa','$this->num_hijos',
        '$this->datos_hijos','$this->sistema_pensiones','$this->nombre_afp','$this->cuenta_sistema_pensiones',
        '$this->grado_instruccion','$this->tipo_licencia_conducir','$this->num_licencia_conducir','$this->licencia_mtc','$this->venc_licencia_mtc',
        '$this->grupo_sanguineo','$this->telefono','$this->nombre_emergencia','$this->telefono_emergencia','$this->direccion_emergencia','$this->correo_electronico',
        '$this->cargo','$this->salario','$this->banco_salario','$this->nro_cuenta_salario','$this->banco_cts','$this->nro_cuenta_cts','$this->num_contrato',
        '$this->fecha_ingreso_contrato','$this->fecha_termino_contrato','$this->venc_contrato','$this->licencia_interna','+1 year','$this->examen_medico','+1 year',
        '$this->curso_induccion','+1 year','$this->manejo_teorico','+1 year','$this->manejo_practico','+1 year','$this->sctr','+1 mounth','$this->vida_ley','+6 mounth','1')";
        $exe1 = mysqli_query($con, $insertar);
        if ($exe1 !== false) {
            MensajeExitoso("Personal Modificado");
            //MensajeError($modificar);
        } else {
            MensajeError("El Personal No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "UPDATE personal SET estado='0' WHERE id_personal = '$this->id_personal'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Personal Eliminado del Sistema");
        } else {
            MensajeError("Personal No Pudo Ser Eliminado");
        }
    }
}