<?php

    include 'bd/conexion.php';

    $mensajes = '';
    $sql_guardarpermiso = 'CALL guardar_permiso(:_rol);';

    // var_dump($sql_consultarpermisos);

    function acortarRoles($rol){
        $size = strlen($rol);
        if($size >= 7){
            return substr($rol,0,7);
        }else{
            return $rol;
        }
    }

   

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $rol = $_POST['rol'];

        if(empty($rol)){
            $mensajes .= '<label class="alert alert-danger"><li>Complete el campo requerido</li></label>';
        } else{
            $conexion = getConexion();
            $guardar = $conexion->prepare($sql_guardarpermiso);
            $guardar->bindParam(':_rol', $rol, PDO::PARAM_STR, 45);

            if($guardar->execute()){
                $mensajes .= '<label class="alert alert-success"><li>Permiso almacenado correctamente</li></label>';
            }else{
                $mensajes .= '<label class="alert alert-danger"><li>Permiso no almacenado</li></label>';
            }
            $conexion = null;
        }
    }

    // Consulta de permisos

    $conexion = getConexion();
    $sql_consultarpermisos = 'SELECT idpermisos,rol FROM permisos';
    $stmt = $conexion->prepare($sql_consultarpermisos);
    $stmt->execute();
    
  
    // set the resulting array to associative
    // $result = 
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $dataset_permisos = $stmt->fetchAll();
    // echo '<pre>'; print_r($dataset_permisos); echo '</pre>';


    $conexion = null;
    include 'vistas/permisosEmpleados_vista.php';
?>
