<?php
    ob_start();
require 'db_conexion.php';
$con = mysqli_connect($host, $user, $pass, $db);
session_start();
$user = $_SESSION['usuario'];
$empresa = $_SESSION['empresa'];
$query = "SELECT * from usuarios where dni='$user'";
$res = mysqli_query($con, $query);
$dnipaciente = $_GET['dni'];
$fechapaciente = $_GET['fecha'];
$nombrepaciente;
?>
<style>
	@page {
		margin-left: 0.5cm;
		margin-right: 0.5cm;
        margin-top:1cm;
	}
</style>
<h5><center>DECLARACION JURADA DE ANTECEDENTES PERSONALES</center></h5>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <table  width="90%" align="center" border="1" style="font-size:70%;">
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Direccion</th>
                                <th>Empresa</th>
                            </tr>
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
<br>
    <p style="font-size:70%;">Responda las pregutas de abajo, si a sufrido o sufre actualmente alguna enfermedad o sitomas relacionados:</p>
    <table align="center" border="4" style="font-size:60%;">
                <tr>
                    <th><center>CABEZA Y CUELLO</center></th>
                    <th></th>
                    <th><center>SISTEMA RESPIRATORIO</center></th>
                    <th></th>
                    <th><center>SISTEMA CADIOVASCULAR ENDOCRINO</center></th>
                    <th></th>
                </tr>
            <tbody>
                <tr>
                <td>TORTICOLIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>FALTA DE AIRE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TIENE TENSION ALTA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>DOLOR DE CABEZA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>AMIGDALITIS FRECUENTE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>DOLOR DE PECHO ANGINA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>JAQUECA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TOS CRONICA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>PALPITACIONES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>VERTIGO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>DESCARRO CON SANGRE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>EDEMA DE PIERNAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>DESMAYO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>RESFRIADO FRECUENTE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TOMA MEDICINA PARA EL CORAZON</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>EPILEPSIA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ALERGIAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SIENTE FALTA DE AIRE POR LA NOCHE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>SINUSITIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>BRONQUITIS O ASMA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SIENTE DOLOR EN LOS MIENBROS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>TIENE DEFICIENCIA VISUAL</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p8'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>PROBLEMAS PULMONARES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p8'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SE CANSA CUANDO CAMINA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p8'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>TIENE DEFICIENCIA AUDITIVA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p9'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>PULMONIA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p9'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SUFRE DE HIPERTENSION ARTERIAL</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p9'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>LABIRINTITIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p10'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TUBERCULOSIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p10'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>DIABETES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p10'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>TIENE PROBLEMA TIROIDES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='cyc_p11'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>RINITIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sr_p11'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>HIPER O HIPOTIROIDISMO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sce_p11'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
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
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>INFECCION URINARIA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sg_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>REUMATISMO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>GASTRITIS, ULCERAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ORINA CON SANGRE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sg_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ALERGIA O ASMA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>HEMORROIDES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>DOLOR PARA ORINAR</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sg_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>DIABETES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>PROBLEMAS DE DIGESTION</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>COLICO RENAL</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sg_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>EPILEPSIA DESMAYO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>PROBLEMAS DE VESICULA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ENFERMEDADES VENEREAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sg_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SIFILIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>TIENE DIARREA FRECUENTE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ORINA BIEN</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sg_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>CANCER</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>ESTREÑIMIENTO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>OTROS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sg_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==''){echo ('<td>-</td>');}else{echo ('<td>'.$rpta.'</td>');}
                    ?>
                    <td>TENSION ALTA, CARDIOPATIAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>EVACUA DIARIAMENTE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p8'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <th><center>INFECTOLOGIA<center></th>
                    <td></td>
                    <td>TUBERCULOSIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p8'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>HEPATITIS, PANCREATITIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p9'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>MALARIA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='i_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>LEPRA O MAL DE HANSEN</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p9'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>HECES CON SANGRE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p10'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>DENGUE</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='i_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ALCOHOLISMO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p10'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>ICTERICIA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sd_p11'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>HEPATITIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='i_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ULCERA DE ESTOMAGO O DUODENO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='f_p11'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <th><center>OTROS<center></th>
                    <th></th>
                    <td>PAPERAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='i_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <th><center>SIST. OFTALMOLOGICO<center></th>
                    <th></th>
                </tr>
                <tr>
                    <td>HERNIA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>UTA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='i_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ENFERMEDADES PARA DIFERENCIAR COLORES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='so_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>NERVIOSISMO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TIFOIDEA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='i_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ENFERMEDADES QUE REDUSCAN LA AGUDEZA VISUAL</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='so_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>ANSIEDAD, DEPRESION</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TBC O TOS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='i_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <th><center>SOLO PARA MUJERES<center></th>
                    <td></td>
                </tr>
                <tr>
                    <td>OLVIDO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <th><center>SISTEMA MUSCULO ESQUELETICO</center></th>
                    <td></td>
                    <td>CICLO MESTRUAL REGULAR</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='spm_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>PERDIDA DE MEMORIA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SIENTE DOLORES EN LOS BRAZOS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>FECHA ULTIMO CICLO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='spm_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==''){echo ('<td>-</td>');}else{echo ('<td>'.$rpta.'</td>');}
                    ?>
                </tr>
                <tr>
                    <td>ALERGIA A MEDICAMENTO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SIENTE DOLORES EN LAS PIERNAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    
                    <td>COLICO MESTRUAL</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='spm_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>ESTA ENGORDANDO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SIENTE DOLOR LUMBAR</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    
                    <td>INTENSIDAD DEL COLICO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='spm_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){
                            echo ('<td>LEVE</td>');
                        }
                        if($array['rpta']==1){
                            echo ('<td>MODERADO</td>');
                        }
                        if($array['rpta']==2){
                            echo ('<td>FUERTE</td>');
                        }
                    ?>
                </tr>
                <tr>
                    <td>ESTA ADELGAZANDO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p8'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TIENE LIMITACIONES DE MOVIMIENTO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>USA ANTICONCEPTIVOS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='spm_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>TIENE DIABETES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p9'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>ARTRITIS O REUMATISMO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>EN GESTACION</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='spm_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>TIENE ALGUN TUMOR</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p10'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TIENE VARICES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <th><center>VACUNAS RECIBIDAS</center></th>
                    <td></td>
                </tr>
                <tr>
                    <td>TIENE O TUVO CANCER</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p11'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>FRACTURAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>FIEBRE AMARILLA</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='vc_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>CIRUGIAS (LOS ULTIMOS 60 DIAS) </td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p12'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TORCEDURAS - LUXACIONES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p8'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>HEPATITIS B</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='vc_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>ENFERMEDADES PSIQUIATRICAS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p13'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TENDINITIS</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p9'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>TETANO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='vc_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>ALCOHOLISMO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p14'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>SINDROME DE TUNEL DEL CARPO</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='sme_p10'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>OTRAS:</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='vc_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==''){echo ('<td>-</td>');}else{echo ('<td>'.$rpta.'</td>');}
                    ?>
                </tr>
                <tr>
                    <td>USO DE MEDICINAS CONTINUOS (ULTIMOS 15 DIAS)</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p15'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>USO DE MEDICINAS PERMANENTES</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='o_p16'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
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
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='hdv_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿SE ALIMENTA DE MANERA REGULAR?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='hdv_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿HACE ACTIVIDAD FISICA?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='hdv_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>¿USA DROGAS?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='hdv_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿FUMA ACTUALMENTE?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='hdv_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USA ALGUN TRANQUILIZANTE?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='hdv_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
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
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='do_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USA PROTESIS DENTAL?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='do_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
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
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p1'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USTED TIENE O TUVO ALGUNA ENFERMEDAD CAUSADA POR EL TRABAJO?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p2'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USTED TIENE O TUVO DIFICULTADES PARA EJECUTAR ALGUN TRABAJO?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p3'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>¿DESCANSO POR ACCIDENTE LABORAL?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p4'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USTED TIENE O TUVO ALGUNA DEFICIENCIA POR ACCIDENTE DE TRABAJO?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p6'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USTED TIENE O TUVO DIFICULTADES PARA RELACIONARSE CON COLEGAS DEL TRABAJO?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p7'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>¿CUANTOS DIAS?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p5'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==''){echo ('<td>-</td>');}else{echo ('<td>'.$rpta.'</td>');}
                    ?>
                    <td>¿USTED UTILIZA EQUIPOS DE PROTECCION?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p8'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USTED EJECUTA O EJECUTÓ TRABAJOS EN LUGARES CON ALTO NIVEL DE RUIDO?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p9'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>¿HIZO ALGUN CURSO DE SEGURIDAD?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p10'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USTED EJECUTÓ O EJECUTARA TRABAJOS EN LUGARES CON MUCHO POLVO?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p11'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    <td>¿USTED TRABAJA O TRABAJÓ EN LUGARES CON OLORES FUERTES?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p13'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>¿HIZO ALGUN CURSO DE PREVENCION DE ACCIDENTES?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p12'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                    
                    <td>¿USTED TRABAJA O TRABAJÓ EN LUGARES CON PRODUCTOS QUIMICOS?</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p14'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==0){echo ('<td>NO</td>');}else{echo ('<td>SI</td>');}
                    ?>
                </tr>
                <tr>
                    <td>PERIODO DE DESCANSO</td>
                    <td></td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p15i'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==''){echo ('<td> - </td>');}else{echo ('<td>'.$rpta.'</td>');}
                    ?>
                    <td>A</td>
                    <?php 
                        $query1 = "SELECT * from rptas_declaracionjurada where dni='$dnipaciente' and fecha='$fechapaciente' and cod_preg='ho_p15f'";
                        $consulta1=mysqli_query($con,$query1);    
                        $array = mysqli_fetch_array($consulta1);
                        $rpta=$array['rpta'];
                        if($array['rpta']==''){echo ('<td> - </td>');}else{echo ('<td>'.$rpta.'</td>');}
                    ?>
                    <td></td>                          
                </tr>
            </tbody>
        </table>
        <p style="color:red;font-size:70%;">* POR LA PRESENTE DECLARO BAJO APERCIBIMIENTO DE LEY Y JURAMENTO QUE LA INFORMACION PRESENTADA ANTERIORMENTE ES VERDADERA, COMPLETA, CORRECTA Y DETALLADA. ME HAGO RESPONSABLE SI HE FALSEADO U OCULTADO LA VERDAD, LIBERANDO DE RESPONSABILIDAD A LA EMPRESA CONTRATANTE, ASI MISMO QUEDO OBLIGADO A INFORMAR TODA CONDICION DE SALUD NUEVA.</p>
        <?php 
            $query2 = "SELECT * from usuarios where dni='$dnipaciente'";
            $consulta2=mysqli_query($con,$query2);    
            $array2 = mysqli_fetch_array($consulta2);
        ?>
        <br>
        <br>
        <table align="center">
            <tr>
                <td>Fecha: </td>
                <td><?php echo($fechapaciente); ?></td>
            </tr>
            <tr>
                <td>Firma:</td>
                <td></td>
                <td>Huella Digital: </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td>___________________</td>
                <td></td>
                <td>___________________</td>
            </tr>
        </table>
    </div>
    </body>
</html>
<?php
    $html=ob_get_clean();
    //echo $html;
    require_once 'lib_pdf/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4');
    $dompdf->render();
    $dompdf->stream("DJ_".$array2['dni'].".pdf",array("Attachment"=>false));
?>