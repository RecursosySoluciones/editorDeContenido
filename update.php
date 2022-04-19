<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'webservice/functions/functions_db.php';

$error_counter  = 0;
$status         = "ERROR";
$MSJ_ERROR_CODE = "ERROR!, no se recibio el parametro ";
$data           = $MSJ_ERROR_CODE;


if(isset($_POST['content'])){
    $CONTENT = $_POST['content'];;
}else{
    if($data != $MSJ_ERROR_CODE){
        $data = $data." y ";
    }
    $aux_data="'content'";
    $data = $data.$aux_data;
    $error_counter++;
}

if(isset($_POST['id'])){
    $ID = $_POST['id'];;
}else{
    if($data != $MSJ_ERROR_CODE){
        $data = $data." y ";
    }
    $aux_data="'id  '";
    $data = $data.$aux_data;
    $error_counter++;
}

if ($error_counter == 0) {
    $G = ConectarDb(); 
    $query = "UPDATE web_comercial_uy_info SET INFORMACION = '".$CONTENT."' WHERE ID = ".$ID."";

    if ($G->query($query ) === TRUE) {
                        
        header("Location:index.php");

    } else {

        $status = 'ERROR';
        $data   = "Error: " . $query  . "<br>" . $G->error;
        print_r($data);
        die;
        $GLOBALS["return_array"] = array(
            "STATUS"    => $status,
            "DATA"      => $data
        );
    
    }
    
    cerrarConexion($G);
} 

// ARMA UN ARRAY CON LOS RESULTADOS DE LA BUSQUEDA
$GLOBALS["return_array"] = array(
    "STATUS"        => $status,
    "DATA"          => $data,
);

// IMPRIME EL ARRAY CON LOS RESULTADOS DE LA BUSQUEDA PARA QUE LOS CAPTURE EL JS QUE SOLICITO EL WEBSERVICE
print_r(json_encode($GLOBALS["return_array"],128));
die;
