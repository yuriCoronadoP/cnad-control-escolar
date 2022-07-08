<?php

    include 'bd/conexion.php';
    $conexion = getConexion();

    $consulta_empleados = 'SELECT usuario,password FROM empleados';
    $sql = $conexion->prepare($consulta_empleados);
    $sql->execute();
    $dataset_empleados = $sql->fetchAll(PDO::FETCH_OBJ);
    // var_dump($dataset_empleados);

    include 'vistas/mostrarEmpleados_vista.php';

?>