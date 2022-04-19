<?php

    //POR ARCHIVO INCLUIMOS SISTEMA DE LA BASE DE DATOS
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    if($_SERVER["SERVER_NAME"]!="localhost"){
        require ('/joomlanas/click/encrypt/dataEncrypt.php');
        require ('/joomlanas/click/encrypt/Crypt/AES.php');

        $crypt = new Crypt_Rijndael();
        $crypt->setKeyLength(256);
        $crypt->setBlockLength(256);
        $crypt->setIV($iv);
        $crypt->setKey($key);
        $db   = trim($crypt->decrypt(base64_decode($dbhost)));
        $user = trim($crypt->decrypt(base64_decode($dbuser)));
        $pass = trim($crypt->decrypt(base64_decode($dbpass)));
        $dbname = trim($crypt->decrypt(base64_decode($dbname)));


        define("ORIGENDB","mysql");// valores gladius o mysql
        define("HOST",$db); //define("HOST","localhost"); 
        define("USERNAME",$user); //define("USERNAME","root");
        define("PASSWORD",$pass); //define("PASSWORD","");
        define("BASEDEDATOS",$dbname);	
    }
    if($_SERVER["SERVER_NAME"]=="localhost"){
    define("ORIGENDB","mysql");// valores gladius o mysql
    define("HOST","localhost"); //define("HOST","localhost"); 
    define("USERNAME",'root'); //define("USERNAME","root");
    define("PASSWORD",''); //define("PASSWORD","");
    define("BASEDEDATOS",'test');	
    }

    function ConectarDb(){
        $G = mysqli_connect(HOST, USERNAME, PASSWORD) or die ('Error de coneccion mySql');
        mysqli_select_db($G , BASEDEDATOS) or die ('Error al seleccionar base de datos');		
        return $G;
    }

    function cerrarConexion($G){
        $G = mysqli_close ($G);
        return $G;
    }	

    function EjecutarConsulta($G, $sql){	
        $resultados = "";
        $resultados = mysqli_query($G, $sql);
        if(!is_bool($resultados)){
            mysqli_data_seek ($resultados, 0);
            while($caca[] = mysqli_fetch_assoc($resultados));
            array_pop($caca);  // pop the last row off, which is an empty row
            $resultados= $caca;
            } 
        return $resultados;
    }
