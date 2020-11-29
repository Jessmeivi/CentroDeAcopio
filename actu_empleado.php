<?php
    include('database.php');
    $conexion=conectar();
    if(!$conexion)
    {
        die("error de conexion");
    }
    echo "<hr style='border-color: red'>";
    echo "<br>";
    $id=$_POST['enviar2'];
    $nom=$_POST['nombre'];
    $ape_pat=$_POST['ape_pat'];//Recibe los datos del usuario con el formulario
    $ape_mat=$_POST['ape_mat'];
    $salario=$_POST['salario'];
    
   
    $sql ="UPDATE empleado
    set nom='$nom',ape_pat='$ape_pat',
    ape_mat='$ape_mat',salario='$salario'
    where id_emp=$id"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
    $result = $conexion->query($sql);
    
?>