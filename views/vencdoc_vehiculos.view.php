<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Lista Documentaria por Vehiculo</h1>
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
					<div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover" aling="center" style="text-align:center;font-size:15px">
                            <thead style="background-color:#1338BE;color:#ffffff" >
                                <tr>
                                    <th>Placa</th>
                                    <th>Tipo Vehiculo</th>
									<th>Equipamiento</th>
                                    <th>SOAT</th>
                                    <th>Poliza</th>
                                    <th>Poliza Mercancia</th>
                                    <th>Rev. Tecnica</th>
									<th>Cert. MAPTEL</th>
                                    <th>GPS</th>
                                    <th>TUC</th>       
                                    <th>Cert. Operatividad</th>
                                    <th>Extintor</th>
                                    <th>Cert. Tacos</th>
                                    <th>Checklist</th>
									<th>Homologacion Vehicular</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set('America/Lima');
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <th style="background-color:   #707b7c   ;color:#ffffff" ><?php echo $row['placa'] ?></th>
                                        <th style="background-color:   #707b7c   ;color:#ffffff" ><?php echo $row['tipo_vehiculo'] ?></th>
                                		<th><?php echo $row['equipamiento'];
											if (file_exists("documentos/vehiculos/EQUIPAMIENTO".'_'.$row['placa'].'.jpg')) { ?>
                                            	<br><a <?="href=documentos/vehiculos/EQUIPAMIENTO".'_'.$row['placa'].'.jpg' ?> target="_blank" rel="noopener noreferrer"><img src="images/logo_visor.png" width="30"/></a>
                                            <?php }else { ?>
                                            <br><span class="badge badge-danger">Sin Archivo</span>
                                            <?php } ?>
                                        </th>
                                        <?php 
                                            $new_date=date("Y-m-d",strtotime($row['soat'].$row['venc_soat'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
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
                                        //poliza 
                                            $new_date=date("Y-m-d",strtotime($row['poliza'].$row['venc_poliza'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
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
                                        //poliza mercancia
                                            $new_date=date("Y-m-d",strtotime($row['poliza_mercancia'].$row['venc_poliza_mercancia'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
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
                                        //revicion tecnica
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($row['venc_rev_tecnica']);
                                            $msj_new_date=$row['venc_rev_tecnica'];
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
										//cert matpel
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($row['venc_cert_matpel']);
                                            $msj_new_date=$row['venc_cert_matpel'];
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
                                        //gps
                                            $new_date=date("Y-m-d",strtotime($row['gps'].$row['venc_gps']));
                                            $msj_new_date=$new_date; 
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
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
                                        //tuc
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($row['venc_tuc']);
                                            $msj_new_date=$row['venc_tuc'];
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
                                         
                                         
                                        //cert operatividad
                                            $new_date=date("Y-m-d",strtotime($row['cert_operatividad'].$row['ven_cert_operatividad'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
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
                                        //extintor
                                            $new_date=date("Y-m-d",strtotime($row['extintor'].$row['venc_extintor']));
                                            $msj_new_date=$new_date; 
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
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
                                        //cert tacos
                                            $new_date=date("Y-m-d",strtotime($row['cert_tacos'].$row['venc_cert_tacos'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
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
                                        //checklist
                                        $new_date=date("Y-m-d",strtotime($row['checklist'].$row['venc_checklist'])); 
                                        $msj_new_date=$new_date;
                                        $old_date = new DateTime();
                                        $new_date = new DateTime($new_date);
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
										//homologacion vehicular
                                            $new_date=date("Y-m-d",strtotime($row['homo_vehicular'].$row['venc_homo_vehicular'])); 
                                            $msj_new_date=$new_date;
                                            $old_date = new DateTime();
                                            $new_date = new DateTime($new_date);
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
                                        ?>
                                         
                                        <th>
                                            <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_placa').value ='<?= $row['placa']?>';document.getElementById('update_cod_vehiculo').value ='<?= $row['cod_vehiculo']?>';document.getElementById('update_soat').value ='<?= $row['soat']?>';document.getElementById('update_poliza').value ='<?= $row['poliza']?>';document.getElementById('update_poliza_mercancia').value ='<?= $row['poliza_mercancia']?>';document.getElementById('update_rev_tecnica').value ='<?= $row['rev_tecnica']?>';document.getElementById('update_venc_rev_tecnica').value ='<?= $row['venc_rev_tecnica']?>';document.getElementById('update_gps').value ='<?= $row['gps']?>';document.getElementById('update_tuc').value ='<?= $row['tuc']?>';document.getElementById('update_venc_tuc').value ='<?= $row['venc_tuc']?>';document.getElementById('update_cert_matpel').value ='<?= $row['cert_matpel']?>';document.getElementById('update_venc_cert_matpel').value ='<?= $row['venc_cert_matpel']?>';document.getElementById('update_homo_vehicular').value ='<?= $row['homo_vehicular']?>';document.getElementById('update_cert_operatividad').value ='<?= $row['cert_operatividad']?>';document.getElementById('update_extintor').value ='<?= $row['extintor']?>';document.getElementById('update_cert_tacos').value ='<?= $row['cert_tacos']?>';document.getElementById('update_checklist').value ='<?= $row['checklist']?>';" title="Actualizar Documentos"><img src="images/actualizar_icono.png" width="45%" /></a>
                                        </th>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        </div>
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
                <h4 class="modal-title" id="defaultModalLabel">ACTUALIZAR DOCUMENTOS VEHICULO</h4>
            </div>
            <div class="modal-body">
            <form action="panel.php?modulo=vencdoc_vehiculos" id="ingresar" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update_cod_vehiculo" id="update_cod_vehiculo" value="">
                    <input type="hidden" name="update_placa" id="update_placa" value="">
                    <h4 style="font-family:candara; color:#1338BE">DOCUMENTOS DEL VEHICULO</h4>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>
                                <label for="update_soat">SOAT</label><br>
                                <input type="file" name="update_documento_soat" id="update_documento_soat">
                            </th>
                            <th>
                                <input type="date" name="update_soat" id="update_soat" placeholder="NOMBRE ESPOSO(A)" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_poliza">POLIZA</label><br>
                                <input type="file" name="update_documento_poliza" id="update_documento_poliza">
                            </th>
                            <th>
                                <input type="date" name="update_poliza" id="update_poliza" placeholder="Poliza" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_poliza_mercancia">POLIZA MERCANCIA</label><br>
                                <input type="file" name="update_documento_polizamercancia" id="update_documento_polizamercancia">
                            </th>
                            <th>
                                <input type="date" name="update_poliza_mercancia" id="update_poliza_mercancia" placeholder="DNI ESPOSO(A)" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_rev_tecnica">REVISION TECNICA INICIO</label><br>
                                <input type="file" name="update_documento_revisiontecnica" id="update_documento_revisiontecnica">
                            </th>
                            <th>
                                <input type="date" name="update_rev_tecnica" id="update_rev_tecnica" placeholder="Revision Tecnica" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_venc_rev_tecnica">REVISION TECNICA FIN</label>  
                            </th>
                            <th>
                                <input type="date" name="update_venc_rev_tecnica" id="update_venc_rev_tecnica" placeholder="Revision Tecnica" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>  
                            <th>
                                <label for="update_gps">GPS</label><br>
                                <input type="file" name="update_documento_gps" id="update_documento_gps">
                            </th>
                            <th>
                                <input type="date" name="update_gps" id="update_gps" placeholder="Fecha Instalacion GPS" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_tuc">TUC INICIO</label><br>
                                <input type="file" name="update_documento_tuc" id="update_documento_tuc">  
                            </th>
                            <th>
                                <input type="date" name="update_tuc" id="update_tuc" placeholder="TUC" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_venc_tuc">TUC FIN</label>    
                            </th>
                            <th>
                                <input type="date" name="update_venc_tuc" id="update_venc_tuc" placeholder="Vencimiento TUC" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_cert_matpel">CERT. MATPEL INICIO</label><br>
                                <input type="file" name="update_documento_certmatpel" id="update_documento_certmatpel">    
                            </th>
                            <th>
                                <input type="date" name="update_cert_matpel" id="update_cert_matpel" placeholder="Cert. MATPEL Inicio" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_venc_cert_matpel">CERT. MATPEL FIN</label>    
                            </th>
                            <th>
                                <input type="date" name="update_venc_cert_matpel" id="update_venc_cert_matpel" class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_homo_vehicular">HOMOLOGACION VEHICULAR</label><br>
                                <input type="file" name="update_documento_homovehicular" id="update_documento_homovehicular">      
                            </th>
                            <th>
                                <input type="date" name="update_homo_vehicular" id="update_homo_vehicular"  class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_cert_operatividad">CERT. OPERATIVIDAD</label><br>
                                <input type="file" name="update_documento_certoperatividad" id="update_documento_certoperatividad">    
                            </th>
                            <th>
                                <input type="date" name="update_cert_operatividad" id="update_cert_operatividad" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_extintor">EXTINTOR</label><br>
                                <input type="file" name="update_documento_extintor" id="update_documento_extintor">    
                            </th>
                            <th>
                                <input type="date" name="update_extintor" id="update_extintor"  class="form-control" required="required">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="update_cert_tacos">CERT. TACOS</label><br>
                                <input type="file" name="update_documento_certtacos" id="update_documento_certtacos">  
                            </th>
                            <th>
                                <input type="date" name="update_cert_tacos" id="update_cert_tacos" class="form-control" required="required">
                            </th>
                            <th>
                                <label for="update_checklist">CHECKLIST</label><br>
                                <input type="file" name="update_documento_checklist" id="update_documento_checklist">    
                            </th>
                            <th>
                                <input type="date" name="update_checklist" id="update_checklist" class="form-control" required="required">
                            </th>
                        </tr>
                    </table>
                    <input type="submit" name="update_vencdoc_vehiculos" id="update_vencdoc_vehiculos" Value="Actualizar" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>