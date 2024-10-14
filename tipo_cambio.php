<?php
require_once 'clases/clsPacientes.php';

$query = "SELECT * from tipo_cambio;";
$res = mysqli_query($con, $query);

require('views/tipo_cambio.view.php');
