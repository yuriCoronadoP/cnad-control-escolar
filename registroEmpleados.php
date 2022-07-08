<?php

    include 'bd/conexion.php';
    $mensajes = '';

    // conexion 1
    $conexion = getConexion();
    
    // llenado de select CURP
    $consulta_personas = 'SELECT idpersonas,rfc FROM personas';
    $stmt = $conexion->prepare($consulta_personas);
    $stmt->execute();
    $dataset_personas = $stmt->fetchAll(PDO::FETCH_OBJ);

    // llenado de select ROL
    $consulta_permisos = 'SELECT idpermisos,rol FROM permisos';
    $stmt = $conexion->prepare($consulta_permisos);
    $stmt->execute();
    $dataset_permisos = $stmt->fetchAll(PDO::FETCH_OBJ);
    // echo '<pre>'; print_r($dataset_permisos); echo '</pre>';
    // var_dump($dataset_personas);
    // echo count($dataset_personas);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $rfc = $_POST['rfc'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $rol = $_POST['rol'];


        // validacion de inputs
        if(empty($rfc) or empty($usuario) or empty($password) or empty($rol)){
            $mensajes .= '<label class="alert alert-danger"><li>Complete todos los campos</li></label>';
        } else {
            // Guardado de empleados
            $sql_guardarempleado = 'CALL guardar_empleado(:usuario,:password,:idpersonas,:idpermisos);';
            $conexion = getConexion();
            $guardar = $conexion->prepare($sql_guardarempleado);
            $guardar->bindParam(':usuario', $usuario, PDO::PARAM_STR, 45);
            $guardar->bindParam(':password', $password, PDO::PARAM_STR, 512);
            $guardar->bindParam(':idpersonas', $rfc, PDO::PARAM_INT, 11);
            $guardar->bindParam(':idpermisos', $rol, PDO::PARAM_INT, 11);

            if($guardar->execute()){
                // var_dump($guardar);
                $mensajes = '<label class="alert alert-success"><li>Empleado almacenado correctamente</li></label>';
            }else{
                $mensajes = '<label class="alert alert-danger"><li>Empleado no almacenado</li></label>';
            }
            
            // echo '<pre>'; print_r($guardar->execute()); echo '</pre>';
            $conexion = null;
        }

    }

    include 'vistas/registroEmpleados_vista.php';

?>