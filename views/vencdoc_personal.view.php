<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Lista Documentaria Personal</h1>
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
                    <table id="example2" class="table table-bordered table-hover" aling="right" style="text-align:center;">
                            <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th><center>Nombres</center></th>
                                    <th><center>DNI</center></th>
                                    <th><center>Contrato</center></th>
                                    <th><center>Licencia</center></th>
                                    <th><center>Licencia Interna</center></th>
                                    <th><center>Examen Medico</center></th>
                                    <th><center>Curso Induccion</center></th>
                                    <th><center>Examen Manejo Teorico</center></th>
                                    <th><center>Examen Manejo Practico</center></th>
                                    <th><center>SCTR</center></th>
                                    <th><center>Vida Ley</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set('America/Lima');
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <th style="background-color:   #707b7c   ;color:#ffffff" ><?php echo $row['nombres'] ?></th>
                                        <th style="background-color:   #707b7c   ;color:#ffffff" ><?php echo $row['dni'] ?></th>
                                        <?php
                                        //contrato 
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($row['venc_contrato']);
                                            $msj_new_date=$row['venc_contrato'];
                                            $diff = $old_date->diff($new_date);
                                            $diff =$diff->format('%R%a');
											if($diff<0){
                                        ?>


										<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }
                                        //licencia 
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($row['venc_licencia_mtc']);
                                            $msj_new_date=$row['venc_licencia_mtc'];
                                            $diff = $old_date->diff($new_date);
                                            $diff =$diff->format('%R%a');
											if ($row['venc_licencia_mtc']=='2001-01-01'){ ?>
                                            	<td><span class="badge badge-danger">NO APLICA</span>
                                            <?php } else {
                                            if($diff<0){
                                            ?>
                                        	<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php } 
                                            }
                                        //licencia interna
                                            $new_date=date("Y-m-d",strtotime($row['licencia_interna'].$row['venc_licencia_interna'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
                                            $diff = $old_date->diff($new_date);
                                            $diff =$diff->format('%R%a');
											if ($row['licencia_interna']=='2001-01-01'){ ?>
                                            	<td><span class="badge badge-danger">NO APLICA</span>
                                            <?php } else {
                                            if($diff<0){
                                        ?>
                                            										<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }}
                                        //examen medico
                                            $new_date=date("Y-m-d",strtotime($row['examen_medico'].$row['venc_examen_medico']));
                                            $msj_new_date=$new_date; 
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
                                            $diff = $old_date->diff($new_date);
                                            $diff =$diff->format('%R%a');
											if ($row['examen_medico']=='2001-01-01'){ ?>
                                            	<td><span class="badge badge-danger">NO APLICA</span>
                                            <?php } else {
                                            if($diff<0){
                                        ?>
                                            										<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }}
                                        //curso_inducccion
                                            $new_date=date("Y-m-d",strtotime($row['curso_induccion'].$row['venc_curso_induccion'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
                                            $diff = $old_date->diff($new_date);
                                            $diff =$diff->format('%R%a');
											if ($row['curso_induccion']=='2001-01-01'){ ?>
                                            	<td><span class="badge badge-danger">NO APLICA</span>
                                            <?php } else {
                                            if($diff<0){
                                        ?>
                                            										<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }}
                                        //manejo_teorico
                                        $new_date=date("Y-m-d",strtotime($row['manejo_teorico'].$row['venc_manejo_teorico'])); 
                                        $msj_new_date=$new_date;
                                        $old_date = new DateTime();
                                        $new_date = new DateTime($new_date);
                                        $diff = $old_date->diff($new_date);
                                        $diff =$diff->format('%R%a');
										if ($row['manejo_teorico']=='2001-01-01'){ ?>
                                            	<td><span class="badge badge-danger">NO APLICA</span>
                                            <?php } else {
                                        if($diff<0){
                                        ?>
                                            										<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php } }
                                        //manejo_practico
                                            $new_date=date("Y-m-d",strtotime($row['manejo_practico'].$row['venc_manejo_practico'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
                                            $diff = $old_date->diff($new_date);
                                            $diff =$diff->format('%R%a');
										if ($row['manejo_practico']=='2001-01-01'){ ?>
                                            	<td><span class="badge badge-danger">NO APLICA</span>
                                            <?php } else {
                                            if($diff<0){
                                        ?>
                                            										<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }}
                                        //sctr
                                            $new_date=date("Y-m-d",strtotime($row['sctr'].$row['venc_sctr'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
                                            $diff = $old_date->diff($new_date);
                                            $diff =$diff->format('%R%a');
											if ($row['sctr']=='2001-01-01'){ ?>
                                            	<td><span class="badge badge-danger">NO APLICA</span>
                                            <?php } else {
                                            if($diff<0){
                                        ?>
                                            										<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }  }
                                        //vida_ley
                                            $new_date=date("Y-m-d",strtotime($row['vida_ley'].$row['venc_vida_ley'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
                                            $diff = $old_date->diff($new_date);
                                            $diff =$diff->format('%R%a');
											if ($row['vida_ley']=='2001-01-01'){ ?>
                                            	<td><span class="badge badge-danger">NO APLICA</span>
                                            <?php } else {
                                            if($diff<0){
                                        ?>
                                            										<td><span class="badge badge-danger">VENCIDO <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>=0 && $diff<=15){?>
                                            <td><span class="badge badge-warning">RENOVACION URGENTE<BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>15 && $diff<=30){?>
                                            <td><span class="badge badge-info">PRONTA RENOVACION <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }if($diff>30){?>
                                            <td><span class="badge badge-success">VIGENTE <BR><?php echo ("$msj_new_date"); ?></span>
                                        <?php }  } 
                                        ?>
                                        <th style="background-color: #d4e6f1 ;color:#d6eaf8 ">
                                            <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id_personal').value ='<?= $row['id_personal']?>';document.getElementById('update_dni').value ='<?= $row['dni']?>';document.getElementById('update_inicio_dni').value ='<?= $row['inicio_dni']?>';document.getElementById('update_venc_dni').value ='<?= $row['venc_dni']?>';document.getElementById('update_num_contrato').value ='<?= $row['num_contrato'] ?>';document.getElementById('update_fecha_ingreso_contrato').value ='<?= $row['fecha_ingreso_contrato'] ?>';document.getElementById('update_fecha_termino_contrato').value ='<?= $row['fecha_termino_contrato'] ?>';document.getElementById('update_venc_contrato').value ='<?= $row['venc_contrato'] ?>';document.getElementById('update_licencia_mtc').value ='<?= $row['licencia_mtc'] ?>';document.getElementById('update_venc_licencia_mtc').value ='<?= $row['venc_licencia_mtc'] ?>';document.getElementById('update_licencia_interna').value ='<?= $row['licencia_interna'] ?>';document.getElementById('update_manejo_teorico').value ='<?= $row['manejo_teorico'] ?>';document.getElementById('update_manejo_practico').value ='<?= $row['manejo_practico'] ?>';document.getElementById('update_examen_medico').value ='<?= $row['examen_medico'] ?>';document.getElementById('update_curso_induccion').value ='<?= $row['curso_induccion'] ?>';document.getElementById('update_sctr').value ='<?= $row['sctr'] ?>';document.getElementById('update_vida_ley').value ='<?= $row['vida_ley'] ?>';"  title="Actualizar Documentos"> Actualizar </a>
                                        </th>
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

<!-- Modal para Modificar -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">ACTUALIZAR DOCUMENTOS PERSONAL</h4>
            </div>
            <div class="modal-body">
            <form action="panel.php?modulo=vencdoc_personal" id="ingresar" method="POST">
                    <input type="hidden" name="update_id_personal" id="update_id_personal" value="">
                    <input type="hidden" name="update_dni" id="update_dni" value="">
                    <h4 style="font-family:candara; color:#1338BE">DOCUMENTACION</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_inicio_dni">DNI INICIO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_inicio_dni" id="update_inicio_dni" placeholder="INICIO DNI" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_venc_dni">DNI FIN</label>            
                            </th>
                            <th>
                                <input type="date" name="update_venc_dni" id="update_venc_dni" placeholder="FIN DNI" class="form-control" required="required">
                            </th>
                            
                        </tr>            
                        <tr>
                            <th>
                                <label for="update_num_contrato">NUM. CONTRATO</label>    
                            </th>
                            <th>
                                <input type="text" name="update_num_contrato" id="update_num_contrato" placeholder="Num Contrato" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_fecha_ingreso_contrato">FECHA INGRESO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_fecha_ingreso_contrato" id="update_fecha_ingreso_contrato" placeholder="Fecha Ingreso" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_fecha_termino_contrato">FECHA TERMINO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_fecha_termino_contrato" id="update_fecha_termino_contrato" placeholder="Fecha Termino" class="form-control" required="required">
                            </th>
                            
                        </tr> 
                        <tr>
                            <th>
                                <label for="update_venc_contrato">VENC. CONTRATO</label>    
                            </th>
                            <th>
                                <input type="date" name="update_venc_contrato" id="update_venc_contrato" placeholder="Venc Contrato" class="form-control" required="required">
                            </th>
                        </tr>     
                        <tr>
                            <th>
                                <label for="update_licencia_mtc">INICIO LICENCIA MTC</label>            
                            </th>
                            <th>
                                <input type="date" name="update_licencia_mtc" id="update_licencia_mtc" placeholder="Fecha Ingreso" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_venc_licencia_mtc">FIN LICENCIA MTC</label>            
                            </th>
                            <th>
                                <input type="date" name="update_venc_licencia_mtc" id="update_venc_licencia_mtc" placeholder="Fecha Termino" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_licencia_interna">INICIO LICENCIA AAQ</label>  
                                <input type="hidden" name="update_venc_licencia_interna" id="update_venc_licencia_interna" value="">          
                            </th>
                            <th>
                                <input type="date" name="update_licencia_interna" id="update_licencia_interna" placeholder="Fecha Ingreso" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>   
                            <th>
                                <label for="update_manejo_teorico">MANEJO TEORICO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_manejo_teorico" id="update_manejo_teorico" placeholder="Examen Teorico" class="form-control" required="required">
                                <input type="hidden" name="update_venc_manejo_teorico" id="update_venc_manejo_teorico" value="">
                            </th>  
                            <th>
                                <label for="update_manejo_practico">MANEJO PRACTICO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_manejo_practico" id="update_manejo_practico" placeholder="Examen Teorico" class="form-control" required="required">
                                <input type="hidden" name="update_venc_manejo_practico" id="update_venc_manejo_practico" value="">    
                            </th>
                        </tr>        
                        <tr>   
                            <th>
                                <label for="update_examen_medico">EXAMEN MEDICO</label>            
                            </th>
                            <th>
                                <input type="date" name="update_examen_medico" id="update_examen_medico" placeholder="Examen Medico" class="form-control" required="required">
                                <input type="hidden" name="update_venc_examen_medico" id="update_venc_examen_medico" value=""> 
                            </th>  
                            <th>
                                <label for="update_curso_induccion">CURSO INDUCCION</label>            
                            </th>
                            <th>
                                <input type="date" name="update_curso_induccion" id="update_curso_induccion" placeholder="Curso Induccion" class="form-control" required="required">
                                <input type="hidden" name="update_venc_curso_induccion" id="update_venc_curso_induccion" value="">
                                
                            </th>
                            <th>
                                <label for="update_sctr">SCTR</label>            
                            </th>
                            <th>
                                <input type="date" name="update_sctr" id="update_sctr" placeholder="Curso Induccion" class="form-control" required="required">
                                <input type="hidden" name="update_venc_sctr" id="update_venc_sctr" value="">
                                
                            </th>
                        </tr>   
                        <tr>
                            <th>
                                <label for="update_vida_ley">VIDA LEY</label>            
                            </th>
                            <th>
                                <input type="date" name="update_vida_ley" id="update_vida_ley" placeholder="Vida Ley" class="form-control" required="required">
                                <input type="hidden" name="update_venc_vida_ley" id="update_venc_vida_ley" value="">
                            </th>  
                        </tr>            
                    </table>
                    
                    <input type="submit" name="update_vencdoc_personal" id="update_vencdoc_personal" Value="Actualizar" class="btn btn-primary">
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>