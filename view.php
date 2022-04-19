<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'webservice/functions/functions_db.php';

$error_counter  = 0;
$status         = "ERROR";
$MSJ_ERROR_CODE = "ERROR!, no se recibio el parametro ";
$data           = $MSJ_ERROR_CODE;

$G = ConectarDb(); 
$query = "SELECT ID, LOCALIDAD, TIPO_SERVICIO FROM web_comercial_uy_info ORDER BY LOCALIDAD";
$aux_query = EjecutarConsulta($G, $query);

cerrarConexion($G);

foreach ($aux_query as $key => $value) {
    echo '<tr>
        <td><a href="detail.php?id='.$value['ID'].'">'.$value['ID'].'</a></td>
        <td><a href="detail.php?id='.$value['ID'].'">'.$value['LOCALIDAD'].'</a></td>
        <td><a href="detail.php?id='.$value['ID'].'">'.$value['TIPO_SERVICIO'].'</a></td>
    </tr>';
    
}

?>