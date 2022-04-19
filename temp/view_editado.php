<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "koneksi.php";
include 'webservice/functions/functions_db.php';


$G = ConectarDb(); 
$query = "SELECT * FROM web_comercial_uy_info ORDER BY LOCALIDAD";
$result_query = EjecutarConsulta($G, $query);
cerrarConexion($G);

$result_query = $result_query[0];

if($result_query->rowCount() > 0 ){
    print_r($result_query->rowCount());
    die;
   $no=1;
   while ($r = $result_query->fetch()) {

       echo '<tr>
                
                <td>'.$no.'</td>
                <td><a href="detail.php?ID='.$r['ID'].'">'.$r['DESCRIPCION'].'</a></td>
             </tr>';
        
       ++$no;

    }//end while
    
}else{
    
    echo "<tr><td colspan=\"2\">Not Found</td></tr>";
}


/* $query = $pdo->prepare("SELECT * FROM article");
$query->execute();
if($query->rowCount() > 0 ){
    
   $no=1;
   while ($r = $query->fetch()) {
        
       echo '<tr>
                
                <td>'.$no.'</td>
                <td><a href="detail.php?id='.$r['id'].'">'.$r['title'].'</a></td>
             </tr>';
        
       ++$no;

    }//end while
    
}else{
    
    echo "<tr><td colspan=\"2\">Not Found</td></tr>";
} */
