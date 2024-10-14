<?php

date_default_timezone_set('America/Lima');
$accion = $_POST['accion'];
controlador($accion);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function controlador($accion){
	require_once '../db_conexion.php';
	$cone = mysqli_connect($host, $user, $pass, $db);
	switch ($accion) {
		case 'LIST_CONSOLIDADOS':
			$query="select * from  consolidados_boletas where estado='1' order by mes_ano";
			$res= mysqli_query($cone, $query);

			echo "<table class='table table-bordered table-hover'>";
			echo '<thead style="background-color:#007bff;color:#FFFFFF" >';
			echo "<tr>";
			echo "<th>Periodo</th><th>Archivo</th><th>Fecha Subida</th><th>Accion</th>";
			echo "</tr>";
			echo '</thead>';

			while ($row = mysqli_fetch_assoc($res)) : 
				echo "<tr>";
				echo "<td>".$row['mes_ano']."</td><td>".$row['name'].".zip</td><td>".$row['hora_fecha']."</td>";
				echo "<td>";	
				echo '<a href="documentos/Boletas_Pago/Consolidados/'.$row['name'].'.zip" download="'.$row['name'].'.zip">Descargar archivo</a>';
				echo "</td>";
				echo "</tr>";
			endwhile;
			echo '</table>';
		break;

		case 'LIST_BOLETAS_X_COLABORADOR':
			$colaborador=$_POST['colaborador'];

			$directorio="../documentos/Boletas_Pago/".$colaborador.'/';
			if(!is_dir($directorio)){
				echo '<b>Sin Boletas disponible</b>';
			}else{
				$boletas=scandir($directorio);
				$query="select * from  personal where dni='$colaborador' limit 1";
				$res= mysqli_query($cone, $query);
				$array = mysqli_fetch_array($res);
				echo '<label>Boletas por Personal: '. $array['nombres'].'</label>';
				echo '<table id="example2" class="table table-bordered table-hover" style="width:80%;text-align:center;margin: 0 auto;">';
				echo '<thead style="background-color:#007bff;color:#FFFFFF">';
				echo "<tr>";
				echo "<th>Periodo</th><th>Archivo</th><th colspan='3'>Accion</th>";
				echo "</tr>";
				echo '</thead>';

				for ($i = 0; $i < count($boletas); $i++) {
					$archivo = $boletas[$i];
					if ($archivo !== '.' && $archivo !== '..') {
						echo '<tr>';
						echo '<td>';
						$periodo=explode('-',$archivo);
						$periodo=$periodo[0];
						echo $periodo;
						echo '</td>';
						echo '<td>'.$archivo."</td>";
						echo '<td>';
						echo '<button type="button" class="btn btn-primary" onclick="DescargarBoleta('."'".$colaborador."','".$archivo."'".')"><li class="fa fa-download"></li></button>';
						echo '</td>';
						echo '<td>';
						echo '<a href=https://api.whatsapp.com/send?phone=51'.$array['telefono']."&text=🚚%20FS%20Servicios%20Integrales%20🚚%20%0AMire%20y%20Descargue%20su%20Boleta%20de%20Pago%20correspondiente%20al%20periodo%20".$periodo."%20📄%20:%0Ahttps://194.163.44.135/FS_WebApp/documentos/Boletas_Pago/".$colaborador.'/'.$archivo.' download target="_blank"><img src="images/logo_whatsapp.png" width="35"/></a>';
						echo '</td>';
						echo '<td>';
						echo '<button type="button" class="btn btn-primary" onclick="EnvioBoletaPeriodoCorreo('."'".$periodo."','".$array['nombres']."','".$array['dni']."','".$array['correo_electronico']."'".')"><li class="fa fa-envelope"></li></button>';
						echo '</td>';
						echo '</tr>';
					}
				}
				echo '</table>';
			}
		break;

		case 'ENVIO_BOLETA_CORREO':
			require '../PHPMailer/src/Exception.php';
			require '../PHPMailer/src/PHPMailer.php';
			require '../PHPMailer/src/SMTP.php';

			$periodo=$_POST['periodo'];
			$nombre=$_POST['nombre'];
			$dni=$_POST['dni'];
			$correo=$_POST['correo'];


			$mail = new PHPMailer(true);

			try {
						// Configuración del servidor
				$mail->isSMTP();                                    // Configura el envío a través de SMTP
				$mail->Host       = 'smtp.dreamhost.com';           // Especifica el servidor SMTP
				$mail->SMTPAuth   = true;                           // Habilita la autenticación SMTP
				$mail->Username   = 'free@chs.pe';      // Tu usuario SMTP
				$mail->Password   = 'grupo2024';               // Tu contraseña SMTP
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Habilita la encriptación TLS
				$mail->Port       = 465;                           // Puerto TCP para conectarse
				// Destinatarios
				$mail->setFrom('free@chs.pe', 'GESTION HUMANA FS SERVICIOS INTEGRALES');
				$mail->addAddress($correo, $nombre); // Agrega un destinatario
					
						// Contenido del correo
				$mail->isHTML(true);                               // Establece el formato de correo en HTML
				$mail->Subject = 'FS - Boleta de Pago Periodo '.$periodo;
				$mail->Body    = '<b>FS Servicios Integrales</b><br><b>Sr(a). '.$nombre.':</b> Mire y/o descague su boleta de pago del periodo '.$periodo.' en el siguiente link:<br> https://194.163.44.135/FS_WebApp/documentos/Boletas_Pago/'.$dni.'/'.$periodo.'-'.$dni.'.pdf <br><br><br> <b>GESTION HUMANA<br>FS SERVICIO INTEGRALES';
				$mail->AltBody = '<b>FS Servicios Integrales</b><br><b>Sr(a). '.$nombre.':</b> Mire y/o descague su boleta de pago del periodo '.$periodo.' en el siguiente link:<br> https://194.163.44.135/FS_WebApp/documentos/Boletas_Pago/'.$dni.'/'.$periodo.'-'.$dni.'.pdf <br><br><br> <b>GESTION HUMANA<br>FS SERVICIO INTEGRALES';
					
				$mail->send();
						
				echo 'Correo enviado exitosamente.';
			} catch (Exception $e) {
				echo "Error al enviar el correo: {$mail->ErrorInfo}";
			}
		break;


		case 'LIST_BOLETAS_X_PERIODO':

			
			$ano=$_POST['ano'];
			$mes=$_POST['mes'];

			$directorio = '../documentos/Boletas_Pago';
			$prefijo = $mes.'_'.$ano;
			$resultados = [];
    		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directorio));

			$directorioVacio = true;

			foreach ($iterator as $archivo) {
				if ($archivo->isFile()) {
					$directorioVacio = false; // Encontramos un archivo, por lo que no está vacío
					break; // Salimos del bucle, ya no necesitamos seguir buscando
				}
			}

			if($directorioVacio){
				echo '<b>Sin Boletas disponible</b>';
			}else{
				echo '<label>Boletas por Periodo</label>';
				echo '<table id="example2" class="table table-bordered table-hover" style="width:80%;text-align:center;margin: 0 auto;">';
				echo '<thead style="background-color:#007bff;color:#FFFFFF">';
				echo "<tr>";
				echo "<th>Periodo</th><th>Colaborador</th><th colspan='3'>Accion</th>";
				echo "</tr>";
				echo '</thead>';

				foreach ($iterator as $archivo) {
					if ($archivo->isFile() && strpos($archivo->getFilename(), $prefijo) === 0) {
						$namefile=explode("-",$archivo->getPathname());

						echo '<tr>';
						echo '<td>';
						echo $mes.'_'.$ano;
						echo '</td>';

						$query="select * from  personal where dni='".substr($namefile[1],0,-4)."' limit 1";
						$res= mysqli_query($cone, $query);
						$array = mysqli_fetch_array($res);
						echo '<td>';
						echo $array['nombres'];
						echo '</td>';
						echo '<td>';
						echo '<button type="button" class="btn btn-primary" onclick="DescargarBoleta('."'".$array['dni']."','".$mes.'_'.$ano.'-'.$namefile[1]."'".')"><li class="fa fa-download"></li></button>';
						echo '</td>';
						echo '<td>';
						echo '<a href=https://api.whatsapp.com/send?phone=51'.$array['telefono']."&text=🚚%20FS%20Servicios%20Integrales%20🚚%20%0AMire%20y%20Descargue%20su%20Boleta%20de%20Pago%20correspondiente%20al%20periodo%20".$mes.'-'.$ano."%20📄%20:%0Ahttps://194.163.44.135/FS_WebApp/documentos/Boletas_Pago/".substr($namefile[1],0,-4).'/'.$mes.'_'.$ano.'-'.$namefile[1].' download target="_blank"><img src="images/logo_whatsapp.png" width="35"/></a>';
						echo '</td>';
						echo '<td>';
						echo '<button type="button" class="btn btn-primary" onclick="EnvioBoletaPeriodoCorreo('."'".$mes.'_'.$ano."','".$array['nombres']."','".$array['dni']."','".$array['correo_electronico']."'".')"><li class="fa fa-envelope"></li></button>';
						echo '</td>';
						echo '<tr>';
					}
				}
			}

		break;


		/*case 'REGISTRAR_DATOS_COMPLEMENTARIOS':
			$sited=$_POST['sited'];
			$tipo_venta=$_POST['tipo_venta'];
			$dia_credito=$_POST['dia_credito'];
			$observacion=$_POST['observacion'];
			$fecha_vencimiento=$_POST['fecha_vencimiento'];
			$query="update cab_facturacion_seguros set tipo_venta='$tipo_venta', dia_credito='$dia_credito',observacion='$observacion',fecha_vencimiento='$fecha_vencimiento' where sited='$sited' and estado=1";
			$res= mysqli_query($cone, $query);
			if ($res !== false) {
				echo 'OK';
		   }else{
				echo 'ERROR';
			}
		break;
		case 'GET_INFO_SEGURO':
			$seguro=$_POST['seguro'];
			$sited=$_POST['sited'];
			$ruc='';
			$razon_social='';
						switch ($seguro) {
				case 'PACIFICOSEGUROS':
					$ruc='20332970411';
					$razon_social='PACIFICO COMPAÑIA DE SEGUROS Y REASEGUROS';
					break;
				case 'PACIFICOEPS':
					$ruc='20431115825';
					$razon_social='PACIFICO SA ENTIDAD PRESTADORA DE SALUD';
					break;
				case 'PACIFICOSCTR':
					$ruc='20431115825';
					$razon_social='PACIFICO SA ENTIDAD PRESTADORA DE SALUD';
				break;
				case 'RIMACSEGUROS':
					$ruc='20100041953';
					$razon_social='RIMAC SEGUROS Y REASEGUROS';
				break;
				case 'RIMACEPS':
					$ruc='20414955020';
					$razon_social='RIMAC S.A. ENTIDAD PRESTADORA DE SALUD';
				break;
				case 'RIMACSCTR':
					$ruc='20414955020';
					$razon_social='RIMAC S.A. ENTIDAD PRESTADORA DE SALUD';
				break;
				case 'MAPFRESOAT':
					$ruc='20202380621';
					$razon_social='MAPFRE PERU COMPAÑIA DE SEGUROS Y REASEGUROS S.A.';
				break;
				case 'MAPFREEPS':
					$ruc='20517182673';
					$razon_social='MAPFRE PERU S.A. ENTIDAD PRESTADORA DE SALUD';
				break;
				case 'MAPFRESEGUROS':
					$ruc='20418896915';
					$razon_social='MAPFRE PERU VIDA COMPAÑIA DE SEGUROS Y REASEGUROS';
				break;
				case 'MAPFRESCTR':
					$ruc='20517182673';
					$razon_social='MAPFRE PERU S.A. ENTIDAD PRESTADORA DE SALUD';
				break;
				case 'POSITIVAEPS':
					$ruc='20601978572';
					$razon_social='LA POSITIVA S.A. ENTIDAD PRESTADORA DE SALUD';
				break;  
				case 'POSITIVASCTR':
					$ruc='20601978572';
					$razon_social='LA POSITIVA S.A. ENTIDAD PRESTADORA DE SALUD';
				break;  
				case 'POSITIVASOAT':
					$ruc='20100210909';
					$razon_social='LA POSITIVA SEGUROS Y REASEGUROS S.A.';
				break;
				case 'POSITIVAREEPS':
					$ruc='20100210909';
					$razon_social='LA POSITIVA SEGUROS Y REASEGUROS S.A.';
				break;
				case 'SANITASEPS':
					$ruc='20523470761';
					$razon_social='SANITAS PERU S.A. - EPS';
				break;  
				case 'SANITASSCTR':
					$ruc='20523470761';
					$razon_social='SANITAS PERU S.A. - EPS';
				break;  
				case 'BANCONACION':
					$ruc='20122794424';
					$razon_social='FONDO DE EMPLEADOS DEL BANCO DE LA NACION';
				break;  
                case 'BANCONACION ':
					$ruc='20122794424';
					$razon_social='FONDO DE EMPLEADOS DEL BANCO DE LA NACION';
				break;  
				case 'REDSALUD':
					$ruc='20600258894';
					$razon_social='HEALTH CARE ADMINISTRATION RED SALUD S.A.C.';
				break; 
				case 'ELECTROSUR':
					$ruc='20119205949';
					$razon_social='ELECTROSUR S.A.';
				break; 
				case 'CHUBB':
					$ruc='20390625007';
					$razon_social='CHUBB PERU S.A. COMPAÑIA DE SEGUROS Y REASEGUROS';
				break;
			}
			
			$query="select a.sited,b.nombre,b.dni from (select sited,seguro,paciente from preliquidacion where estado=1 and sited='$sited') as a join (select * from pacientes where estado=1)as b on a.paciente=b.dni group by sited; ";
			$consulta=mysqli_query($cone,$query);
			
			$nombre='';
			while ($row = mysqli_fetch_assoc($consulta)) : 
				$nombre=$row['nombre'];
			endwhile;


			echo $ruc.'$'.$razon_social.'$'.$nombre;
		break;

		case 'CALCULAR_VENCIMIENTO_CREDITO':
			$hoy = date("Y-m-d");
			$diascredito=$_POST['diascredito'];
			$fecha_base = new DateTime($hoy);
			$feriados = ['2024-06-29','2024-06-30','2024-07-23','2024-07-28','2024-07-29','2024-08-06','2024-08-30','2024-10-08','2024-11-01','2024-12-08','2024-12-09','2024-12-25','2024-12-31'];
	
			$diasSumados=0;
			while ($diasSumados < $diascredito) {
				$fecha_base->modify('+1 day');
				if ( !in_array($fecha_base->format('Y-m-d'), $feriados)) {
					$diasSumados++;
				}
			}

			echo $fecha_base->format('Y-m-d');

		break;
		case 'LIST_PRODUCTOS_FACTURACION':
			$sited=$_POST['sited'];
			$seguro=$_POST['seguro'];
			switch ($seguro) {
				case 'PACIFICOSEGUROS':
					$tabla_pl='catalogo_pacifico';
				break;
				case 'PACIFICOEPS':
					$tabla_pl='catalogo_pacifico';
				break;
				case 'PACIFICOSCTR':
					$tabla_pl='catalogo_pacifico';
				break;
				case 'RIMACSEGUROS':
					$tabla_pl='catalogo_rimac';
				break;
				case 'RIMACEPS':
					$tabla_pl='catalogo_rimac';
				break;
				case 'RIMACSCTR':
					$tabla_pl='catalogo_rimac';
				break;
				case 'MAPFRESOAT':
					$tabla_pl='catalogo_mapfre';
				break;
				case 'MAPFREEPS':
					$tabla_pl='catalogo_mapfre';
				break;
				case 'MAPFRESEGUROS':
					$tabla_pl='catalogo_mapfre';
				break;
				case 'MAPFRESCTR':
					$tabla_pl='catalogo_mapfre';
				break;
				case 'POSITIVASOAT':
					$tabla_pl='catalogo_positiva';
				break;
				case 'POSITIVAEPS':
					$tabla_pl='catalogo_positiva';
				break;  
				case 'POSITIVAREEPS':
					$tabla_pl='catalogo_positiva';
				break;  
				case 'POSITIVASCTR':
					$tabla_pl='catalogo_positiva';
				break;  
				case 'SANITASEPS':
					$tabla_pl='catalogo_sanitas';
				break;  
				case 'SANITASSCTR':
					$tabla_pl='catalogo_sanitas';
				break;  
				case 'BANCONACION':
					$tabla_pl='catalogo_banconacion';
				break;  
				case 'REDSALUD':
					$tabla_pl='catalogo_redsalud';
				break; 
				case 'ELECTROSUR':
					$tabla_pl='catalogo_electrosur';
				break; 
				case 'CHUBB':
					$tabla_pl='catalogo_chubbs';
				break; 
				case 'MINSA':
					$tabla_pl='catalogo_minsa';
				break;          
				default:
					$tabla_pl='catalogo_particular';
				break;
			}

			$flageliminaranterior=0;
			$copagofijo_pl=0;
			$copagovariable_pl=0;
			$subtotal=0;
            $flagodonto=0;

			$queryjalaventa="select a.*,b.nomenclador,b.unidad from (select * from preliquidacion where sited='$sited' and estado=1)as a join (select * from ".$tabla_pl." where estado=1)as b on a.cod_interno=b.cod_interno; ";
			$consultajalarventa=mysqli_query($cone,$queryjalaventa);
			echo "<table class='table table-bordered table-hover'>";
			echo '<thead style="background-color:#00b3ba;color:#FFFFFF" >';
			echo "<tr>";
			echo "<th>Codigo</th><th>Descripcion</th><th>Cant.</th><th>Precio</th><th>SubTotal</th>";
			echo "</tr>";
			echo '</thead>';
            $suma_cofijos=0;
			while ($row = mysqli_fetch_assoc($consultajalarventa)) : 
                $porciones = explode(".", $row['cod_interno']);
				if(($porciones[2]>=2612 && $porciones[2]<=2617) ){
					$suma_cofijos=$suma_cofijos+($row['precio']*$row['cantidad']);
				}
                if ($porciones[0].'.'.$porciones[1].'.'.$porciones[2]=='COS.RIM.2833'){
					$flagodonto=1;
				}
				$copagofijo_pl=$row['co_pago_fijo'];
				$copagovariable_pl=$row['co_pago_variable'];
				echo "<tr>";
				echo "<td>".$row['cod_interno']."</td><td>".$row['nomenclador']."</td><td>".$row['cantidad']."</td><td>".$row['precio']."</td><td>S/ ".round($row['cantidad']*$row['precio'],2)."</td>";
				echo "</tr>";
				$subtotal=$subtotal+($row['cantidad']*$row['precio']);
			endwhile;
			$queryjalaventa="select a.*,b.nombre_comercial,c.precio_kairos,c.afecto from (select * from preliquidacion_farm where sited='$sited' and estado=1)as a join (select * from ma_medicamento where estado=1)as b join (select * from precios_farmacia where estado=1)as c on a.cod_interno=b.cod_interno and a.cod_interno=c.cod_interno;";
			$consultajalarventa=mysqli_query($cone,$queryjalaventa);
            $afecto=0;
			$noafecto=0;
			while ($row = mysqli_fetch_assoc($consultajalarventa)) : 
				echo "<tr>";
				echo "<td>".$row['cod_interno']."</td><td>".$row['nombre_comercial']."</td><td>".$row['cantidad']."</td><td>".$row['precio']."</td><td>S/ ".round($row['cantidad']*$row['precio'],2)."</td>";
				echo "</tr>";
                if ($row['afecto']==0){
					$noafecto=$noafecto+($row['precio']*(float)$row['cantidad']);
				}elseif($row['afecto']==1){
					$afecto=$afecto+($row['precio']*(float)$row['cantidad']);
				}
				$subtotal=$subtotal+($row['cantidad']*$row['precio']);
			endwhile;
			echo '<tr>';
			echo '<td></td><td></td><td></td><td><b>SubTotal</b></td><td>S/ '.round($subtotal,2).'</td>';
			echo '</tr>';
			if($flagodonto==0){
				$descuentofactura=($subtotal-$suma_cofijos)*((100-$copagovariable_pl)/100)+($copagofijo_pl/1.18);
			}elseif($flagodonto==1){
				$descuentofactura=($subtotal-($copagofijo_pl/1.18))*((100-$copagovariable_pl)/100)+($copagofijo_pl/1.18);
			}
			echo '<tr>';
			echo '<td></td><td></td><td></td><td><b>Descuento</b></td><td>S/ '.round($descuentofactura,2).'</td>';
            echo '</tr>';
			echo '<tr>';
			echo '<td></td><td></td><td></td><td><b>Gravada</b></td><td>S/ '.round($subtotal-$descuentofactura,2).'</td>';
			echo '</tr>';
			echo '<tr>';
			$noafecto=$noafecto-($noafecto*((100-$copagovariable_pl)/100));
            $igvfinal=($subtotal-($descuentofactura+$noafecto))*0.18;
			echo '<td></td><td></td><td></td><td><b>IGV 18.00%</b></td><td>S/ '.round($igvfinal,2).'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td></td><td></td><td></td><td><b>Total</b></td><td>S/ '.round(($subtotal-$descuentofactura)+$igvfinal,2).'</td>';
			echo '</tr>';
			echo '</table>';
			echo '<button type="button" style="background-color:#00b3ba;" class="btn btn-success" onclick="ActualizarImport()">Conforme</button>';       
			break;

        case 'DATOS_COMPLEMENTARIOS_SEGURO':
			$sited=$_POST['sited'];
			$seguro=$_POST['seguro'];
			$fecha_envio_seguro=$_POST['fecha_envio_seguro'];
			$fecha_venc_seguro=$_POST['fecha_venc_seguro'];

			$query="update cab_facturacion_seguros set estado_factura='ENVIADA', fecha_envio_seguro='$fecha_envio_seguro', fecha_vencimiento_seguro='$fecha_venc_seguro' where sited='$sited' and seguro='$seguro' and estado='1'";
			$exe=mysqli_query($cone,$query);
			if ($exe !== false) {
				echo("OK");
			} else {
				echo("ERROR");
			}
			break;

        case 'GUARDAR_ITEM_MOVIMIENTO_FACTURA':
			$factura=$_POST['factura'];
			$fecha=$_POST['fecha'];
			$tipo_operacion=$_POST['tipo_operacion'];
			$num_operacion=$_POST['num_operacion'];
			$monto=$_POST['monto'];
			$descripcion=$_POST['descripcion'];
			$observacion=$_POST['observacion'];

			$query="insert into movimientos_pagos_seguros (factura,fecha,tipo_operacion,num_operacion,monto,descripcion,observacion,estado) values ('$factura','$fecha','$tipo_operacion','$num_operacion','$monto','$descripcion','$observacion','1')";
			$exe=mysqli_query($cone,$query);
			if ($exe !== false) {
				echo("OK");
			} else {
				echo("ERROR");
			}
		break;

		case 'LIST_MOVIMIENTOS_FACTURA':
			$sited=$_POST['sited'];
			$seguro=$_POST['seguro'];
			$factura=$_POST['factura'];

			/*$flageliminaranterior=0;
			$copagofijo_pl=0;
			$copagovariable_pl=0;*/
			/*$subtotal=0;

			$query="select * from movimientos_pagos_seguros where factura='$factura' and estado=1 order by fecha desc";
			$consulta=mysqli_query($cone,$query);
			echo "<table class='table table-bordered table-hover'>";
			echo '<thead style="background-color:#00b3ba;color:#FFFFFF" >';
			echo "<tr>";
			echo "<th>Fecha</th><th>Tipo Operacion</th><th>Num Operacion</th><th>Monto</th><th>Descripcion</th><th>Observacion</th><th></th>";
			echo "</tr>";
			echo '</thead>';
            $suma_cofijos=0;
			while ($row = mysqli_fetch_assoc($consulta)) : 
				echo "<tr>";
				echo "<td>".$row['fecha']."</td><td>".$row['tipo_operacion']."</td><td>".$row['num_operacion']."</td><td>".$row['monto']."</td><td>".$row['descripcion']."</td><td>".$row['observacion']."</td>";
				echo "<td><button type='button' class='btn btn-xs btn-danger' onclick='EliminarMovimientoFactura(".$row['id'].")'><span class='fa fa-trash' ></span></button></td>";
				echo "</tr>";
				$subtotal=$subtotal+($row['monto']);
			endwhile;
			echo '<tr>';
			echo '<td></td><td></td><td></td><td></td><td><b>SubTotal</b></td><td>S/ '.round($subtotal,2).'</td>';
			echo '</tr>';
			echo '</table>';

		break;

		case 'ELIMINAR_MOVIMIENTO_FACTURA':
			$id=$_POST['id'];
			$query="update movimientos_pagos_seguros set estado=0 where id='$id' and estado=1";
			$exe=mysqli_query($cone,$query);
			if ($exe !== false) {
				echo("OK");
			} else {
				echo("ERROR");
			}
		break;*/


		default:
			# code...
		break;

	}


}

?>