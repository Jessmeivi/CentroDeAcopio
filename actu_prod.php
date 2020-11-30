<?php
    include('database.php');
    $conexion=conectar();
    if(!$conexion){
        die("error de conexion");
    }
    echo "<hr style='border-color: red'>";
    echo "<br>";
    $id=$_POST['enviar2'];
    $tipo=$_POST['tipo'];
    $desc=$_POST['desc'];//Recibe los datos del usuario con el formulario
    $precio=$_POST['precio'];
    $cantidad=$_POST['cantidad'];
    $estado=$_POST['estado'];
   
    $sql ="UPDATE producto 
    set tipo_prod='$tipo',descrip_prod='$desc',
    precio='$precio',cantidad='$cantidad',estado='$estado'
    where id_prod=$id"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
    $result = $conexion->query($sql);
    header('Location: producto_actualizar.php');
?>