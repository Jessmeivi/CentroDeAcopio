<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recicladora AGS</title>
    <!-- Agregamos nuestro ícono -->
    <link rel = "icon" href = "img/imgLogo.png" type = "image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/2682b753b2.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/menu_emp.css">

    <style>
        .btn{
            color:#fff;
            background-color:#e74c3c;
            outline: none;
            border: 0;
            color: #fff;
            text-transform:uppercase;
            margin-right: 10px;
            border-radius:2px;
            cursor:pointer;
            position:relative;
        }
        .input-container{
            position:relative;
            margin-bottom:25px;
        }
        .input-container label{
            position:absolute;
            top:0px;
            left:0px;
            font-size:16px;
            color:#00000;	
            transition: all 0.5s ease-in-out;
        }
        .input-container input{ 
            border:0;
            border-bottom:1px solid #555;  
            background:transparent;
            width:100%;
            padding:8px 0 5px 0;
            font-size:16px;
            color:#00000;
        }
        .input-container input:focus{ 
            border:none;	
            outline:none;
            border-bottom:1px solid #e74c3c;	
        }
        .input-container input:focus ~ label,
        .input-container input:valid ~ label{
            top:-12px;
            font-size:12px;
            
        }
        table.center {
            margin-left: auto;
            margin-right: auto;
        }
        table{
            color: #ffffff;
        }
        div input{
            color: #FFFFFF;
        }
        h2{
            color: #FFFFFF;
        }
    </style>

</head>
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
    echo"<center><h2>LOS CAMBIOS SE HAN REALIZADO: nombre=$nombre, direccion=$direccion<h2></center>";
   
    $sql ="UPDATE recicladora 
    set nombre='$nombre',direccion='$direccion',
    colonia='$colonia',num_calle=$num
    where id_recicladora=$id"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
    $result = $conexion->query($sql);
    
    //header('Location: actualizar_recicladora.php');
  echo "<center><button style=' color:#fff; background-color:#e74c3c; outline: none; border: 0;color: #fff;
  text-transform:uppercase; margin-right: 10px; border-radius:2px; cursor:pointer; position:relative;'>
  <a style='text-decoration:none;' href='http://localhost/conexion/inicio_emp.php'>Regresar</a></button></center>";
?>

</html>