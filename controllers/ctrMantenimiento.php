<?php
//session_start();
$accion = $_POST['accion'];
controlador($accion);

function controlador($accion){
	require_once '../db_conexion.php';
	$cone = mysqli_connect($host, $user, $pass, $db);
	switch ($accion) {
		case 'ADD_MANTENIMIENTO':
			if($_POST['descripcion']!='' && $_POST['costo']!=''){
				$descripcion=$_POST['descripcion'];
				$costo=$_POST['costo'];
				session_start();
				if(!isset($_SESSION['carrito_mantenimiento'])){
					$_SESSION['carrito_mantenimiento'] = array();
				}
	
				$carrito_mantenimiento = $_SESSION['carrito_mantenimiento'];
	
				$item = count($carrito_mantenimiento);

				$carrito_mantenimiento[$item]=array(
							'descripcion'=>$descripcion,
							'costo'=>$costo
				);
				$_SESSION['carrito_mantenimiento'] = $carrito_mantenimiento;
			}
			break;	
		case 'LIST_MANTENIMIENTOS':
				session_start();
				if(!isset($_SESSION['carrito_mantenimiento'])){
					$_SESSION['carrito_mantenimiento'] = array();
				}
	
				$carrito_mantenimiento = $_SESSION['carrito_mantenimiento'];
				$item = count($carrito_mantenimiento);
	
				$contador=0;
				if($item>0){
					echo '<table id="example2" class="table table-bordered table-hover">';
					echo '<thead style="background-color:#55B7BE;color:#FFFFFF" >';
					echo "<tr>";
					echo "<th>Descripcion</th><th>Costo</th><th>-</th>";
					echo "</tr>";
					echo '</thead>';
					while ($contador<$item):
						echo "<tr>";
						echo "<td>".$carrito_mantenimiento[$contador]['descripcion']."</td><td>".$carrito_mantenimiento[$contador]['costo']."</td>";
						echo "<td><button type='button' class='btn btn-xs btn-danger' onclick='EliminarItemMantenimiento(".$contador.")'><span class='fa fa-trash' ></span></button></td>";
						echo "</tr>";
						$contador++;
					endwhile;
				}
				break;

			case 'LIST_DETALLE_MANTENIMIENTOF':
					$id_mantenimiento = $_POST['referencia'];
	
					$sql1 = "select * from mantenimientos where id_mantenimiento='".$id_mantenimiento."' and estado=1";
					$res1= mysqli_query($cone, $sql1);
			
					echo '<table id="example2" class="table table-bordered table-hover" style="text-align:center;">';
					echo '<thead style="background-color:#55B7BE;color:#FFFFFF" >';
					echo "<tr>";
					echo "<th>Descripcion</th><th>Costo</th>";
					echo "</tr>";
					echo '</thead>';
					$numreceta='';
					$total=0;
					$igv=0;
					while ($row = mysqli_fetch_assoc($res1)) :
							echo "<tr>";
							echo "<td>".$row['descripcion']."</td><td>".$row['costo']."</td>";
							echo "</tr>";
							$total=$total+$row['costo'];
					endwhile; 
					echo "<tr><td><b>TOTAL</td><td>S/ ".round($total,2)."</td></tr>";
					break;

			case 'ELIM_MANTENIMIENTO':		
					$item = $_POST["item"];
					session_start();
					$carrito_mantenimiento = $_SESSION['carrito_mantenimiento'];
		
					for($i=$item;$i<count($carrito_mantenimiento)-1;$i++ ){                           
						$carrito_mantenimiento[$i]=$carrito_mantenimiento[$i+1];
					}
					unset($carrito_mantenimiento[count($carrito_mantenimiento)-1]);
					
					$_SESSION['carrito_mantenimiento'] = $carrito_mantenimiento;
					break;	
					
			case 'ELIM_MEDICAMENTOTODOS':		
				session_start();
				$_SESSION['carrito_ventafar']= array();
				$carrito_ventafar = $_SESSION['carrito_ventafar'];
				break;	
		default:
			# code...
			break;

	}

}

?>