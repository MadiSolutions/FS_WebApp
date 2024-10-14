<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mi Declaracion Jurada</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datos_paciente" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Direccion</th>
                                    <th>Empresa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['dni'] ?></td>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['edad'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td><?php echo $row['empresa'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <br>
                        <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nueva Declaracion Jurada"> Agregar Nueva <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo Declaracion Jurada</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>Fecha</th>
                                    <th>Ver</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res1)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['cod_declaracionjurada'] ?></td>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['empresa'] ?></td>
                                        <td><?php echo $row['fecha'] ?></td>
                                        <td> <a <?="href=mideclaracionjurada.php?dni=$row[dni]&fecha=$row[fecha]"?> download target="_blank">Ver</a></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_cod_declaracionjurada').value = <?= $row['cod_declaracionjurada'] ?>;document.getElementById('delete_empresa').value = <?= $row['cod_declaracionjurada'] ?>;" title="Eliminar Declaracion Jurada" class="text-danger"> <i class="fas fa-trash"></i> </a>
                                                </div>
                                            </div>

                                        </td>
                                        
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                        <div class="modal-header bg-primary">
                                <h4 class="modal-title" id="defaultModalLabel">Agregar Nueva Declaracion Jurada</h4>
                        </div>
                        <div class="modal-body">
                        <h4>Responda las pregutas de abajo, si a sufrido o sufre actualmente alguna enfermedad o sitomas relacionados:</h4>
                        <form action="panel.php?modulo=declaracionjurada" id="ingresar" method="POST" enctype="multipart/form-data">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><center>CABEZA Y CUELLO</center></th>
                                        <th></th>
                                        <th><center>SISTEMA RESPIRATORIO</center></th>
                                        <th></th>
                                        <th><center>SISTEMA CADIOVASCULAR ENDOCRINO</center></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TORTICOLIS</td>
                                        <td><select name="cyc_p1" id='cyc_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>FALTA DE AIRE</td>
                                        <td><select name="sr_p1" id='sr_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>TIENE TENSION ALTA</td>
                                        <td><select name="sce_p1" id='sce_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>DOLOR DE CABEZA</td>
                                        <td><select name="cyc_p2" id='cyc_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>AMIGDALITIS FRECUENTE</td>
                                        <td><select name="sr_p2" id='sr_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>DOLOR DE PECHO ANGINA</td>
                                        <td><select name="sce_p2" id='sce_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>JAQUECA</td>
                                        <td><select name="cyc_p3" id='cyc_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>TOS CRONICA</td>
                                        <td><select name="sr_p3" id='sr_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>PALPITACIONES</td>
                                        <td><select name="sce_p3" id='sce_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>VERTIGO</td>
                                        <td><select name="cyc_p4" id='cyc_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>DESCARRO CON SANGRE</td>
                                        <td><select name="sr_p4" id='sr_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>EDEMA DE PIERNAS</td>
                                        <td><select name="sce_p4" id='sce_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>DESMAYO</td>
                                        <td><select name="cyc_p5" id='cyc_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>RESFRIADO FRECUENTE</td>
                                        <td><select name="sr_p5" id='sr_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>TOMA MEDICINA PARA EL CORAZON</td>
                                        <td><select name="sce_p5" id='sce_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>EPILEPSIA</td>
                                        <td><select name="cyc_p6" id='cyc_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>ALERGIAS</td>
                                        <td><select name="sr_p6" id='sr_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>SIENTE FALTA DE AIRE POR LA NOCHE</td>
                                        <td><select name="sce_p6" id='sce_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>SINUSITIS</td>
                                        <td><select name="cyc_p7" id='cyc_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>BRONQUITIS O ASMA</td>
                                        <td><select name="sr_p7" id='sr_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>SIENTE DOLOR EN LOS MIENBROS</td>
                                        <td><select name="sce_p7" id='sce_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>TIENE DEFICIENCIA VISUAL</td>
                                        <td><select name="cyc_p8" id='cyc_p8' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>PROBLEMAS PULMONARES</td>
                                        <td><select name="sr_p8" id='sr_p8' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>SE CANSA CUANDO CAMINA</td>
                                        <td><select name="sce_p8" id='sce_p8' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>TIENE DEFICIENCIA AUDITIVA</td>
                                        <td><select name="cyc_p9" id='cyc_p9' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>PULMONIA</td>
                                        <td><select name="sr_p9" id='sr_p9' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>SUFRE DE HIPERTENSION ARTERIAL</td>
                                        <td><select name="sce_p9" id='sce_p9' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>LABIRINTITIS</td>
                                        <td><select name="cyc_p10" id='cyc_p10' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>TUBERCULOSIS</td>
                                        <td><select name="sr_p10" id='sr_p10' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>DIABETES</td>
                                        <td><select name="sce_p10" id='sce_p10' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>TIENE PROBLEMA TIROIDES</td>
                                        <td><select name="cyc_p11" id='cyc_p11' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>RINITIS</td>
                                        <td><select name="sr_p11" id='sr_p11' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>HIPER O HIPOTIROIDISMO</td>
                                        <td><select name="sce_p11" id='sce_p11' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <th><center>SISTEMA DIGESTIVO</center></th>
                                        <th></th>
                                        <th><center>SISTEMA GENITOURINARIO</center></th>
                                        <th></th>
                                        <th><center>FAMILIA (TIENE O TUVO)</center></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>ACIDEZ, NAUSEAS VOMITOS</td>
                                        <td><select name="sd_p1" id='sd_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>INFECCION URINARIA</td>
                                        <td><select name="sg_p1" id='sg_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>REUMATISMO</td>
                                        <td><select name="f_p1" id='f_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>GASTRITIS, ULCERAS</td>
                                        <td><select name="sd_p2" id='sd_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>ORINA CON SANGRE</td>
                                        <td><select name="sg_p2" id='sg_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>ALERGIA O ASMA</td>
                                        <td><select name="f_p2" id='f_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>HEMORROIDES</td>
                                        <td><select name="sd_p3" id='sd_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>DOLOR PARA ORINAR</td>
                                        <td><select name="sg_p3" id='sg_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>DIABETES</td>
                                        <td><select name="f_p3" id='f_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>PROBLEMAS DE DIGESTION</td>
                                        <td><select name="sd_p4" id='sd_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>COLICO RENAL</td>
                                        <td><select name="sg_p4" id='sg_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>EPILEPSIA DESMAYO</td>
                                        <td><select name="f_p4" id='f_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>PROBLEMAS DE VESICULA</td>
                                        <td><select name="sd_p5" id='sd_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>ENFERMEDADES VENEREAS</td>
                                        <td><select name="sg_p5" id='sg_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>SIFILIS</td>
                                        <td><select name="f_p5" id='f_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>TIENE DIARREA FRECUENTE</td>
                                        <td><select name="sd_p6" id='sd_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>ORINA BIEN</td>
                                        <td><select name="sg_p6" id='sg_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>CANCER</td>
                                        <td><select name="f_p6" id='f_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>ESTREÑIMIENTO</td>
                                        <td><select name="sd_p7" id='sd_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>OTROS</td>
                                        <td><input type="text" id="sg_p7" name="sg_p7"  size="6" /></td>
                                        <td>TENSION ALTA, CARDIOPATIAS</td>
                                        <td><select name="f_p7" id='f_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>EVACUA DIARIAMENTE</td>
                                        <td><select name="sd_p8" id='sd_p8' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <th><center>INFECTOLOGIA<center></th>
                                        <td></td>
                                        <td>TUBERCULOSIS</td>
                                        <td><select name="f_p8" id='f_p8' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>HEPATITIS, PANCREATITIS</td>
                                        <td><select name="sd_p9" id='sd_p9' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>MALARIA</td>
                                        <td><select name="i_p1" id='i_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>LEPRA O MAL DE HANSEN</td>
                                        <td><select name="f_p9" id='f_p9' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>HECES CON SANGRE</td>
                                        <td><select name="sd_p10" id='sd_p10' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>DENGUE</td>
                                        <td><select name="i_p2" id='i_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>ALCOHOLISMO</td>
                                        <td><select name="f_p10" id='f_p10' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>ICTERICIA</td>
                                        <td><select name="sd_p11" id='sd_p11' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>HEPATITIS</td>
                                        <td><select name="i_p3" id='i_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>ULCERA DE ESTOMAGO O DUODENO</td>
                                        <td><select name="f_p11" id='f_p11' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <th><center>OTROS<center></th>
                                        <th></th>
                                        <td>PAPERAS</td>
                                        <td><select name="i_p4" id='i_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <th><center>SIST. OFTALMOLOGICO<center></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>HERNIA</td>
                                        <td><select name="o_p1" id='o_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>UTA</td>
                                        <td><select name="i_p5" id='i_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>ENFERMEDADES PARA DIFERENCIAR COLORES</td>
                                        <td><select name="so_p1" id='so_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>NERVIOSISMO</td>
                                        <td><select name="o_p2" id='o_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>TIFOIDEA</td>
                                        <td><select name="i_p6" id='i_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>ENFERMEDADES QUE REDUSCAN LA AGUDEZA VISUAL</td>
                                        <td><select name="so_p2" id='so_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>ANSIEDAD, DEPRESION</td>
                                        <td><select name="o_p3" id='o_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>TBC O TOS</td>
                                        <td><select name="i_p7" id='i_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <th><center>SOLO PARA MUJERES<center></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>OLVIDO</td>
                                        <td><select name="o_p4" id='o_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <th><center>SISTEMA MUSCULO ESQUELETICO</center></th>
                                        <td></td>
                                        <td>CICLO MESTRUAL REGULAR</td>
                                        <td>
                                            <select name="spm_p1" id='spm_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PERDIDA DE MEMORIA</td>
                                        <td><select name="o_p5" id='o_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>SIENTE DOLORES EN LOS BRAZOS</td>
                                        <td><select name="sme_p1" id='sme_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>FECHA ULTIMO CICLO</td>
                                        <td><input type="date" id="spm_p2" name="spm_p2" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ALERGIA A MEDICAMENTO</td>
                                        <td><select name="o_p6" id='o_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>SIENTE DOLORES EN LAS PIERNAS</td>
                                        <td><select name="sme_p2" id='sme_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        
                                        <td>COLICO MESTRUAL</td>
                                        <td><select name="spm_p3" id='spm_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SIEMPRE</option>
                                                <option value="2">A VECES</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>ESTA ENGORDANDO</td>
                                        <td><select name="o_p7" id='o_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>SIENTE DOLOR LUMBAR</td>
                                        <td><select name="sme_p3" id='sme_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        
                                        <td>INTENSIDAD DEL COLICO</td>
                                        <td>
                                            <select name="spm_p4" id='spm_p4' required="required">  
                                                <option value="0">LEVE</option>
                                                <option value="1">MODERADO</option>
                                                <option value="2">FUERTE</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ESTA ADELGAZANDO</td>
                                        <td><select name="o_p8" id='o_p8' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>TIENE LIMITACIONES DE MOVIMIENTO</td>
                                        <td><select name="sme_p4" id='sme_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        
                                        <td>USA ANTICONCEPTIVOS</td>
                                        <td>
                                            <select name="spm_p5" id='spm_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TIENE DIABETES</td>
                                        <td><select name="o_p9" id='o_p9' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>ARTRITIS O REUMATISMO</td>
                                        <td><select name="sme_p5" id='sme_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>

                                        <td>EN GESTACION</td>
                                        <td>
                                            <select name="spm_p6" id='spm_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TIENE ALGUN TUMOR</td>
                                        <td><select name="o_p10" id='o_p10' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>TIENE VARICES</td>
                                        <td><select name="sme_p6" id='sme_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <th><center>VACUNAS RECIBIDAS</center></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>TIENE O TUVO CANCER</td>
                                        <td><select name="o_p11" id='o_p11' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>FRACTURAS</td>
                                        <td><select name="sme_p7" id='sme_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>FIEBRE AMARILLA</td>
                                        <td><select name="vc_p1" id='vc_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>CIRUGIAS (LOS ULTIMOS 60 DIAS) </td>
                                        <td><select name="o_p12" id='o_p12' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>TORCEDURAS - LUXACIONES</td>
                                        <td><select name="sme_p8" id='sme_p8' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>HEPATITIS B</td>
                                        <td><select name="vc_p2" id='vc_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>ENFERMEDADES PSIQUIATRICAS</td>
                                        <td><select name="o_p13" id='o_p13' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>TENDINITIS</td>
                                        <td><select name="sme_p9" id='sme_p9' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>TETANO</td>
                                        <td><select name="vc_p3" id='vc_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>ALCOHOLISMO</td>
                                        <td><select name="o_p14" id='o_p14' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>SINDROME DE TUNEL DEL CARPO</td>
                                        <td><select name="sme_p10" id='sme_p10' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>OTRAS:</td>
                                        <td><input type="text" id="vc_p4" name="vc_p4"  size="10" /></td>
                                    </tr>
                                    <tr>
                                        <td>USO DE MEDICINAS CONTINUOS (ULTIMOS 15 DIAS)</td>
                                        <td><select name="o_p15" id='o_p15' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>USO DE MEDICINAS PERMANENTES</td>
                                        <td><select name="o_p16" id='o_p16' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <th><center>HABITOS DE VIDA</center></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>¿USA PRESERVATIVO (CONDON)?</td>
                                        <td><select name="hdv_p1" id='hdv_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>¿SE ALIMENTA DE MANERA REGULAR?</td>
                                        <td><select name="hdv_p2" id='hdv_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>¿HACE ACTIVIDAD FISICA?</td>
                                        <td>
                                            <select name="hdv_p3" id='hdv_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>¿USA DROGAS?</td>
                                        <td><select name="hdv_p4" id='hdv_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>¿FUMA ACTUALMENTE?</td>
                                        <td><select name="hdv_p5" id='hdv_p5' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>¿USA ALGUN TRANQUILIZANTE?</td>
                                        <td>
                                            <select name="hdv_p6" id='hdv_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <th><center>DIVISION ODONTOLOGICA</center></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>¿SUELE IR AL DENTISTA?</td>
                                        <td><select name="do_p1" id='do_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select> </td>
                                        <td>¿USA PROTESIS DENTAL?</td>
                                        <td><select name="do_p2" id='do_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <th><center>HISTORIA OCUPACIONAL ¿USTED TIENE O TUVO ALGUNO DE LOS SIGUIENTES PROBLEMAS?</center></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>¿USTED TIENE O TUVO ALGUN ACCIDENTE DE TRABAJO?</td>
                                        <td><select name="ho_p1" id='ho_p1' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>¿USTED TIENE O TUVO ALGUNA ENFERMEDAD CAUSADA POR EL TRABAJO?</td>
                                        <td><select name="ho_p2" id='ho_p2' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>¿USTED TIENE O TUVO DIFICULTADES PARA EJECUTAR ALGUN TRABAJO?</td>
                                        <td><select name="ho_p3" id='ho_p3' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                
                                    <tr>
                                        <td>¿DESCANSO POR ACCIDENTE LABORAL?</td>
                                        <td><select name="ho_p4" id='ho_p4' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>¿USTED TIENE O TUVO ALGUNA DEFICIENCIA POR ACCIDENTE DE TRABAJO?</td>
                                        <td><select name="ho_p6" id='ho_p6' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>¿USTED TIENE O TUVO DIFICULTADES PARA RELACIONARSE CON COLEGAS DEL TRABAJO?</td>
                                        <td><select name="ho_p7" id='ho_p7' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>¿CUANTOS DIAS?</td>
                                        <td><input type="text" id="ho_p5" name="ho_p5"  size="3" /></td></td>
                                        <td>¿USTED UTILIZA EQUIPOS DE PROTECCION?</td>
                                        <td><select name="ho_p8" id='ho_p8' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>  
                                        <td>¿USTED EJECUTA O EJECUTÓ TRABAJOS EN LUGARES CON ALTO NIVEL DE RUIDO?</td>
                                        <td><select name="ho_p9" id='ho_p9' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>                        
                                    </tr>
                                    <tr>

                                        <td>¿HIZO ALGUN CURSO DE SEGURIDAD?</td>
                                        <td><select name="ho_p10" id='ho_p10' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        <td>¿USTED EJECUTÓ O EJECUTARA TRABAJOS EN LUGARES CON MUCHO POLVO?</td>
                                        <td><select name="ho_p11" id='ho_p11' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>   
                                        <td>¿USTED TRABAJA O TRABAJÓ EN LUGARES CON OLORES FUERTES?</td>
                                        <td><select name="ho_p13" id='ho_p13' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>                       
                                    </tr>
                                    <tr>
                                        <td>¿HIZO ALGUN CURSO DE PREVENCION DE ACCIDENTES?</td>
                                        <td><select name="ho_p12" id='ho_p12' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>
                                        
                                        <td>¿USTED TRABAJA O TRABAJÓ EN LUGARES CON PRODUCTOS QUIMICOS?</td>
                                        <td><select name="ho_p14" id='ho_p14' required="required">  
                                                <option value="0">NO</option>
                                                <option value="1">SI</option>
                                        </select></td>                          
                                    </tr>
                                    <tr>
                                        <td>PERIODO DE DESCANSO</td>
                                        <td></td>
                                        <td>INICIO: <input type="text" id="ho_p15i" name="ho_p15i"  size="30" /></td></td>
                                        <td>A</td>
                                        <td>FIN: <input type="text" id="ho_p15f" name="ho_p15f"  size="30" /></td>
                                        <td></td>                          
                                    </tr>
                                </tbody>
                            </table>
                            <h4><p style="color:red;">* POR LA PRESENTE DECLARO BAJO APERCIBIMIENTO DE LEY Y JURAMENTO QUE LA INFORMACION PRESENTADA ANTERIORMENTE ES VERDADERA, COMPLETA, CORRECTA Y DETALLADA. ME HAGO RESPONSABLE SI HE FALSEADO U OCULTADO LA VERDAD, LIBERANDO DE RESPONSABILIDAD A LA EMPRESA CONTRATANTE, ASI MISMO QUEDO OBLIGADO A INFORMAR TODA CONDICION DE SALUD NUEVA.</p></h4>
                            <input type="submit" name="add_declaracionjurada" Value="Registrar" class="btn btn-primary">
                        </form>
                        </div>
                        <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Eliminar -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Declaracion Jurada</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=declaracionjurada" method="POST">
                    <input type="hidden" name="delete_cod_declaracionjurada" id="delete_cod_declaracionjurada" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar La Declaracion Jurada? Codigo: </label>
                        <input type="text" name="delete_empresa" id="delete_empresa" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_declaracionjurada" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
