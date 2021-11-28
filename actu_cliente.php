<?php
    include('database.php');
    $conexion=conectar();
    if(!$conexion){
        die("error de conexion");
    }
    echo "<hr style='border-color: red'>";
    echo "<br>";
    $id=$_POST['enviar2'];
    $nombre=$_POST['nombre'];
    $ape_pat=$_POST['ape_pat'];//Recibe los datos del usuario con el formulario
    $ape_mat=$_POST['ape_mat'];
    $estado=$_POST['estado'];
    $colonia=$_POST['colonia'];
    $num=$_POST['numero'];
    $calle=$_POST['calle'];
    $telefono=$_POST['telefono'];
    $sql ="call actucliente($id,'$nombre','$ape_pat','$ape_mat','$estado','$colonia',
    '$calle',$num,$telefono)"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
    $result = $conexion->query($sql);
    header('Location: cliente_actualizar.php');
?>