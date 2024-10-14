<?php

if (isset($_POST['subir_archivozip_boletas'])) {
    $mes=$_POST['mes_boletas'];
    $ano=$_POST['ano_boletas'];


    $flag=0;
    $dir = "documentos/Boletas_Pago/Consolidados/";
    $permitidos = array('zip'); //Archivos permitido
    $ruta_cargapdf = $dir . $_FILES['archivozip_boletas']['name'];
    $arregloArchivo = explode(".", $_FILES['archivozip_boletas']['name']);
	$extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        if (move_uploaded_file($_FILES['archivozip_boletas']['tmp_name'], $dir.'BOLETAS_PAGO_'.$mes.'-'.$ano.'.zip')) {
            $flag=1;
        }
    }
    if($flag==0){
        MensajeError('Archivo no permitido!');
    }
    if($flag==1){
        $zip = new ZipArchive;
        if ($zip->open($dir.'BOLETAS_PAGO_'.$mes.'-'.$ano.'.zip') === TRUE) {
            $fileCount = $zip->numFiles;
            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = $zip->getNameIndex($i);
                $fileNameEdit=$fileName;
                $fileNameEdit=str_replace(' ','',$fileNameEdit);
                $fileNameEdit=explode('-',$fileNameEdit);
                if ($zip->extractTo('documentos/Boletas_Pago/'.$fileNameEdit[1].'/', $fileName)) {
                    // Renombrar el archivo después de extraerlo
                    rename('documentos/Boletas_Pago/'.$fileNameEdit[1].'/' . $fileName, 'documentos/Boletas_Pago/'.$fileNameEdit[1].'/'.$mes.'_'.$ano.'-'.$fileNameEdit[1].'.pdf');
                }
                //$zip->extractTo('documentos/Boletas_Pago/'.$fileNameEdit[1].'/',$fileName);
            }
            $zip->close();
        }
        $queryeliminar="update consolidados_boletas set estado='0' where name='BOLETAS_PAGO_".$mes.'-'.$ano."' and estado=1";
		$consultaeliminar=mysqli_query($con,$queryeliminar);
		$queryinsert="insert into consolidados_boletas (name, mes_ano, estado) values ('BOLETAS_PAGO_".$mes.'-'.$ano."','$mes".'-'.$ano."','1')";
		$consultainsert=mysqli_query($con,$queryinsert);
        MensajeExitoso('Archivo cargado con Exito!');
    }
}

require('views/boletas.view.php');



