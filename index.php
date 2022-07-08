<?php

    // include 'vistas/index_vista.php';
    session_start();
    if(isset($_SESSION['usuario'])){
        header('Location:bienvenido.php');
    }else{
        header('Location:login.php');
        // echo 'hola';
    }

    // include 'login.php';

?>