<?php

    include 'bd/conexion.php';

    $conexion = getConexion();
    $mensajes = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $cct = strtoupper($_POST['fe_cct']);
        $nombre = ucfirst($_POST['fe_nombre']);
        $direccion = ucfirst($_POST['fe_direccion']);
        $telefono = $_POST['fe_telefono'];
        $correo = strtolower($_POST['fe_correo']);
    }

    if(empty($cct) or empty($nombre) or empty($direccion) or empty($correo))
    {
        $mensajes .= '<label class="alert alert-danger"><li>Complete los campos requeridos</li></label>';
    } 
    else
    {
        $sql = 'CALL guardar_plantel(:_cct,:_nombre,:_dir,:_tel,:_correo)';
        $guardar = $conexion->prepare($sql);

        $guardar->bindParam(':_cct', $cct, PDO::PARAM_STR, 10);
        $guardar->bindParam(':_nombre', $nombre, PDO::PARAM_STR, 50);
        $guardar->bindParam(':_dir', $direccion, PDO::PARAM_STR, 100);
        $guardar->bindParam(':_tel', $telefono, PDO::PARAM_STR, 13);
        $guardar->bindParam(':_correo', $correo, PDO::PARAM_STR, 45);

        if ($guardar->execute()){
            $mensajes .= '<label class="alert alert-success"><li>Plantel almacenado correctamente</li></label>';
            // $mensajes .= $cct;
            // var_dump($guardar);
        }else{
            $mensajes .= '<label class="alert alert-danger"><li>Plantel no almacenado</li></label>';
        }
    }

    $conexion = null;

    include 'vistas/escuelas_vista.php';

?>