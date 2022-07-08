<?php

function getConexion(){
    $conexion;

    try{
        $conexion = new PDO('mysql:host=localhost;dbname=control_escolar_g2','root','');
    } catch(PDOException $e){
        $conexion = null;
        // echo "Error: ".$e->getMessage();
    }
    return $conexion;
}

?>
