<?php

// Consulta para obtener el personal
$sql = "SELECT id_personal,dni, nombres FROM personal"; 
$result = $con->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:candara; color:#1338BE">Boletas Personal de FS</h1>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModalSubirArchivo">
                            Subir archivo
                        </button>
                        <button type="button" class="btn btn-primary" onclick="ListConsolidadosBoletasPago()">Lista Consolidados</button>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Mueve el select aquí -->
                        <div>
                            <label for="personal">Lista Por Colaborador</label><br>
                            <select name="personal" id="personal" required="required">
                                <option value="">- Seleccione -</option>
                                <?php
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row['dni']) . "'>" . htmlspecialchars($row['nombres']) . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay datos</option>";
                                }
                                ?>
                            </select>
                            <button type="button" class="btn btn-primary" onclick="ModalBoletasXColaborador()"><li class="fa fa-search"></li></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Mueve el select aquí -->
                        <div>
                            <label>Lista Por Periodo Mensual</label><br>
                            <select name="periodo_mes" id="periodo_mes" required="required">
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Nombiembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            <select name="periodo_ano" id="periodo_ano" required="required">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                            <button type="button" class="btn btn-primary" onclick="ModalBoletasXPeriodo()"><li class="fa fa-search"></li></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12" id="div_ListBoletas"></div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<div class="modal fade" id="AddModalSubirArchivo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">SUBIR ARCHIVO ZIP BOLETAS PAGO FS</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=boletas" id="Subir" method="POST" enctype="multipart/form-data">
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <td colspan="4">
                                <label for="sited_subirhc">CARGAR ARCHIBO .ZIP CON CONSOLIDADO DE BOLETAS DE PAGO DEL PERIODO</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="mes_boletas">Seleccione el Mes</label>
                            </td>
                            <td>
                                <select name="mes_boletas" id='mes_boletas' required="required" class="form-control">
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Nombiembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </td>
                            <td>
                                <label for="ano_boletas">Año</label>
                            </td>
                            <td>
                                <select name="ano_boletas" id="ano_boletas" required="required" class="form-control">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </td>
                        </tr>   
                        <tr>
                            <td>
                                <label for="archivozip_boletas">Archivo</label>
                            </td>
                            <td colspan="3">
                                <input type="file" name="archivozip_boletas" id="archivozip_boletas">
                            </td>
                        </tr>        
                    </table>  <br>
                    <input type="submit" name="subir_archivozip_boletas" Value="Subir" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalListConsolidadosBoletasPago" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#007bff;">
                <h4 class="modal-title" id="defaultModalLabel" style="color:#ffff; font-weight: bold;">Consolidados Cargados</h4>
            </div>
            <div class="modal-body">
                <div class="col-12" id="div_ListConsolidados"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" style="background-color:#00b3ba; color:#ffffff" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    //se usa
    function DescargarBoleta(colaborador,archivo){
        var randomParam = Math.random().toString(36).substring(2, 15);
        window.open('documentos/Boletas_Pago/'+colaborador+'/'+archivo+'?cache_buster='+"'"+randomParam,'_blank');
    }

    function EnvioBoletaPeriodoCorreo(periodo,nombre,dni,correo){
        $.ajax({
          method: "POST",
          url: 'controllers/ctrBoletasPago.php',
          data: {
              "accion": "ENVIO_BOLETA_CORREO",
              "periodo":periodo,
              "nombre":nombre,
              "dni":dni,
              "correo":correo
            }
        })
        .done(function( retorno ) {
            alert(retorno);
        });
    }
    function ModalBoletasXPeriodo(){
        mes=document.getElementById("periodo_mes").value;
        ano=document.getElementById("periodo_ano").value;
        $.ajax({
          method: "POST",
          url: 'controllers/ctrBoletasPago.php',
          data: {
              "accion": "LIST_BOLETAS_X_PERIODO",
              "ano": ano,
              "mes": mes
            }
        })
        .done(function( retorno ) {
            $("#div_ListBoletas").html(retorno);
        });
    }


    function ListConsolidadosBoletasPago(sited,seguro){
        $('#ModalListConsolidadosBoletasPago').modal('show');
        $.ajax({
          method: "POST",
          url: 'controllers/ctrBoletasPago.php',
          data: {
              "accion": "LIST_CONSOLIDADOS"
            }
        })
        .done(function( retorno ) {
            $("#div_ListConsolidados").html(retorno);
        });
    }

    function ModalBoletasXColaborador(){
        colaborador=document.getElementById("personal").value;
        if(colaborador==''){
            alert('Seleccione colaborador');
        }else{
            $.ajax({
            method: "POST",
            url: 'controllers/ctrBoletasPago.php',
            data: {
                "accion": "LIST_BOLETAS_X_COLABORADOR",
                "colaborador": colaborador
                }
            })
            .done(function( retorno ) {
                $("#div_ListBoletas").html(retorno);
            });
        }
    }

</script>


