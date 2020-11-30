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
    $direccion=$_POST['direccion'];//Recibe los datos del usuario con el formulario
    $colonia=$_POST['colonia'];
    $num=$_POST['num_calle'];
    
   
    $sql ="UPDATE recicladora 
    set nombre='$nombre',direccion='$direccion',
    colonia='$colonia',num_calle='$num'
    where id_recicladora=$id"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
    $result = $conexion->query($sql);
    header('Location: actualizar_recicladora.php');
?>