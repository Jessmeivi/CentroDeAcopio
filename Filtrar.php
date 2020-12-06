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

    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" />

</head>
<body>
    <img class="logo" src="img/logo.png" alt="logo">
    <h1 class="title">Centro de acopio ags</h1>
    
    <ul> 
        <li><a href="index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="info.php">Encuentranos</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
    <?php
        include('database.php');
        $conexion=conectar();
        if(!$conexion){
            die("error de conexion");
        }
        echo "<hr style='border-color: red'>";
        echo "<br>";
        $palabra=$_POST['filtro'];
        $sql ="SELECT tipo_prod,descrip_prod,precio FROM producto 
        where tipo_prod LIKE '%$palabra%'"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
        $result = $conexion->query($sql);
        if($result->num_rows > 0)
        {
            echo "<table>";
            while($row = $result->fetch_assoc()){
                echo "<tr> <td>  <b>Tipo</b>: ".$row["tipo_prod"]."
                <b>Descripcion: </b>". $row["descrip_prod"].
                "<b> se paga a: $</b>". $row["precio"].
                "</td> </tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>