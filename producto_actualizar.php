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
    </style>
</head>
<body>
    <nav class="menu">
        <ol>
            <li class="menu-item"><a href="inicio_emp.php">Home</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="index.php"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
                </ol>     
            </li>
            <li class="menu-item"><a href="#">Recicladora</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="recicladoras.php"><i class="fas fa-plus-circle"></i> Agregar</a></li>
                    <li class="menu-item"><a href="actualizar_recicladora.php"><i class="far fa-edit"></i></i> Actualizar</a></li>
                    <li class="menu-item"><a href="recicladora_eliminar.php"><i class="fas fa-trash-alt"></i> Eliminar</a></li>
                </ol>    
            </li>
            <li class="menu-item"><a href="#">Productos</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="productos_agregar.php"><i class="fas fa-plus-circle"></i> Agregar</a></li>
                    <li class="menu-item"><a href="producto_actualizar.php"><i class="far fa-edit"></i></i> Actualizar</a></li>
                    <li class="menu-item"><a href="productos_eliminar.php"><i class="fas fa-trash-alt"></i> Eliminar</a></li>
                </ol>
            </li>
            <li class="menu-item"><a href="#">Cliente</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="Registro.php"> <i class="fas fa-user-plus"></i> Agregar</a></li>
                    <li class="menu-item"><a href="cliente_actualizar.php"><i class="fas fa-user-edit"></i> Actualizar</a></li>
                   <li class="menu-item"><a href="cliente_eliminar.php"> <i class="fas fa-trash-alt"></i> Eliminar</a></li>
                </ol>
            </li>
            <li class="menu-item"><a href="#">Empleado</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="empleados_agregar.php"><i class="fas fa-plus-circle"></i> Agregar</a></li>
                    <li class="menu-item"><a href="actualizar_empleado.php"><i class="far fa-edit"></i></i> Actualizar</a></li>
                    <li class="menu-item"><a href="emp_eliminar.php"><i class="fas fa-trash-alt"></i> Eliminar</a></li>
                </ol>
            </li>
        </ol>
    </nav>
    <?php
        if($_POST)//Recibe los datos del formulario de abajo
        {
            
            include('database.php');
            $conexion=conectar();
            if(!$conexion){
                die("error de conexion");
            }
            else{   
                $id=$_POST['id'];
                echo "<hr style='border-color: red'>";
                echo "<br>";
                $sql ="SELECT tipo_prod,descrip_prod,precio,cantidad,estado FROM producto where id_prod=$id"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
                $result = $conexion->query($sql);

                if($result->num_rows > 0){
                    echo "<center><div style='width:50%'>";
                    echo "<center><div><h1 style='color:  #FFFFFF;'> ACTUALIZAR PRODUCTO</h1></div></center>";
                    echo "<form name='elim' action='http://localhost/conexion/actu_prod.php' method='POST'>" ;
                    echo "<table>";

                    while($row = $result->fetch_assoc()){
                        echo"<div class='input-container' > <input style='color:#FFFFFF' type='text' name='tipo' value='".$row["tipo_prod"]."'> <label style='color: #FFFFFF; '>Tipo de Producto: </label> </div><br>";
                
                        echo"<div class='input-container'><input style='color:#FFFFFF' type='text' name='desc' value='".$row["descrip_prod"]."'><label style='color:  #FFFFFF;'>Descripción Prod:   </label></div><br>";
                
                        echo"<div class='input-container'> <input style='color:#FFFFFF' type='number' name='precio' value='".$row["precio"]."'><label style='color:  #FFFFFF;'>Precio:  </label></div><br>";
                
                        echo "<div class='input-container'> <input style='color:#FFFFFF' type='number' name='cantidad' value='".$row["cantidad"]."'><label style='color:  #FFFFFF;'>Cantidad: </label></div><br>";
                        echo "<div class='input-container'> <input style='color:#FFFFFF' type='text' name='estado' value='".$row["estado"]."'><label style='color:  #FFFFFF;'>Estado del material:  </label></div><br>";
         
                        echo"  <tr>";
                        echo"<td>";
                      
                        echo" <input type='hidden' name='enviar2' value='$id'>";
                        echo" <input type='submit' class='btn' name='enviar' value='aceptar'>";
                        echo"</td>";
                        echo"</tr>";
                    }
                    echo "</table>";
                    echo "</form> ";
                }else{
                    echo"No hay nada";
                }    
                echo "<a class='btn' style='margin:10px;' href='http://localhost/conexion/inicio_emp.php'>cancelar</a> </div></center>";
            }
        }else{
    ?>
            <table class="center">
                <tr>
                    <td align="center">
                        <h1>Actualizar producto por id </h1> <!--Formulario para crear al nuevo usuario--> 
                    </td>
                </tr>
                <tr>
                    <td align="center"> 
                        <form name="Registro" action="http://localhost/conexion/producto_actualizar.php" method="POST"> <!--Igualmente el formulario se envia a la misma pagina--> 
                            <div class="input-container">
                                <input type="numeric" style="color:#FFFFFF" name="id"><br><label>ID_producto</label><br>
                            </div>
                            <table>
                                <tr>
                                    <td>
                                        <input class="btn" type="submit" name="enviar" value="Enviar">
                                    </td>
                                    <td>
                                        <input class="btn" type="reset" name="borrar" value="Borrar">
                                    </td>
                                </tr>
                            </table>
                        </form> 
                    </td>
                </tr>
            </table>
    <?php
        }
    ?>
    <?php
    //de aqui pa bajo

    //conexion da error en pantalla
        include('database.php');
        $conexion=conectar();
        if(!$conexion){
            die("error de conexion");
        }
        echo "
        <br>
        <br>
        <hr style='border-color: red; width: 50%;'>";
        $sql ="select* from cantidad_producto_mes;"; 
        $result = $conexion->query($sql);

        if($result->num_rows > 0){
            echo "<center><bold><h2 style='color: #FFFFFF'> Total de productos adquiridos por mes </h2></bold></center>";
            echo "<center><table>";
            while($row = $result->fetch_assoc()){
                echo "
                <tr> <td>  <b>Id Producto</b>: ".$row["id_producto"]."
                <b>Cantidad Total por Mes: </b>". $row["sum(lleva.cantidad )"].
                "</td> </tr>";
            }
            echo "</table></center>";
        }

    ?>

    <?php

        echo "
        <br>
        <br>
        <hr style='border-color: red; width: 50%;'>";

        $sql="select* from cliente_producto";
        $result = $conexion->query($sql);

        if($result->num_rows > 0){
            echo "<center><bold><h2 style='color: #FFFFFF'> Productos llevados por clientes </h2></bold></center>";
            echo "<center><table>";

            while($row = $result->fetch_assoc()){
                echo "
                <tr> <td>  <b>Id Producto</b>: ".$row["nombre"]."
                <b>Cantidad Total por Mes: </b>". $row["tipo_prod"].
                "</td> </tr>";
            }
            echo "</table></center>";
        }
    ?>

    
</body>
</html>
    