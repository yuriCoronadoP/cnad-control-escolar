<?php

    include 'bd/conexion.php';
    $mensajes = '';
    $conexion = getConexion();


    session_start();
    if(isset($_SESSION['usuario'])){
        header('Location:index.php');
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        $consulta_usuario = 'SELECT idempleados FROM empleados where empleados.usuario = :usuario AND empleados.password = :password';
        $sql = $conexion->prepare($consulta_usuario);
        $sql->execute(array(
            ':usuario'=>$usuario,
            ':password'=>$password
        ));
        
        $resultado = $sql->fetch();
        // var_dump($resultado);
        if($resultado != false){
            $_SESSION['usuario'] = $usuario;
            header('Location:bienvenido.php');
        }else{
            $mensajes = '<label class="alert alert-success"><li>Empleado almacenado correctamente</li></label>';
        }
    }
    $conexion = null;


    include 'vistas/login_vista.php';

?>