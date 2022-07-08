<?php

    include '../bd/conexion.php';


    # 1. instanciamos la conexion
    $conexion = getConexion();
    # 2. creamos la query al SP
    $consulta_eliminarPermiso = 'CALL eliminar_permiso(:idpermiso);';
    $stm = $conexion->prepare();

    $conexion = null;


?>