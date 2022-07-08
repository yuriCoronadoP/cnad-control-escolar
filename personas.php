<?php

    include 'bd/conexion.php';

    $mensajes = '';
    $conexion = getConexion();
    $consulta_escuela = 'SELECT idescuela, nombre FROM escuela';
    $dataSet_escuela = $conexion->prepare($consulta_escuela);
    $dataSet_escuela->execute();
    $resultado_dataSetescuela = $dataSet_escuela->fetchAll(PDO::FETCH_OBJ);
    // var_dump($resultado_dataSetescuela);

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $nombre = $_POST['nombre'];
        $paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $genero = $_POST['genero'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $curp = $_POST['curp'];
        $rfc = $_POST['rfc'];
        $id_escuela = $_POST['id_escuela'];

        if(empty($nombre) or empty($telefono) or empty($correo) or empty($curp) or empty($rfc))
        {
            $mensajes .= '<label class="alert alert-danger"><li>Complete los campos requeridos</li></label>';
        } 
        else
        {
            $sql = 'CALL guardar_persona(:_nombre,:_paterno,:_materno,:_genero,:_direccion,:_telefono,:_correo,:_curp,:_rfc,:_idescuela)';
            $guardar = $conexion->prepare($sql);

            $guardar->bindParam(':_nombre', $nombre, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_paterno', $paterno, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_materno', $materno, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_genero', $genero, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_direccion', $direccion, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_telefono', $telefono, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_correo', $correo, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_curp', $curp, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_rfc', $rfc, PDO::PARAM_STR, 45);
            $guardar->bindParam(':_idescuela', $id_escuela, PDO::PARAM_STR, 45);

            // var_dump($guardar->execute());
            // $guardado = $guardar->execute();
            // $resultado = $gudardar->fetchAll(PDO::FETCH_OBJ);  

            if ($guardar->execute()){
                $mensajes .= '<label class="alert alert-success"><li>Datos de la persona almacenados</li></label>';
                
            } else{
                $mensajes .= '<label class="alert alert-danger"><li>No se almacenaron los datos de la persona</li></label>';
            }
        }
    }

    $conexion = null;
    include 'vistas/personas_vista.php';

    //https://docs.google.com/document/d/1IBGIQfJX1X1jGnVxZ1o7TNS6fdRJWVDIcjHjyINnv_c/edit

?>