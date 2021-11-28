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
            color:#ffffff;
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
            font-size:18px;
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
            <li class="menu-item"><a href="#">Factura</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="la_principal.php"><i class="fas fa-file-invoice"></i> Compra</a></li>
                    <li class="menu-item"><a href="la_principal2.php"><i class="fas fa-file-invoice-dollar"></i> Venta</a></li>
                </ol>
            </li>
        </ol>
    </nav>
    <?php
        if($_POST){
            include('database.php');
            $conexion=conectar();
            if(!$conexion){
                die("error de conexion");
            }
            else{
                $nombre=$_POST['nombre'];
                $producto=$_POST['producto'];//Recibe los datos del usuario con el formulario
                $cantidad=$_POST['cantidad'];
                $total=$_POST['total'];
                $pat=$_POST['pat'];
                $mat=$_POST['mat'];
                
                $id_prod ="SELECT max(id_prod) as 'id' from producto";
                $pro= $conexion->query($id_prod);
                $duct = $pro->fetch_assoc();
                $to=$duct['id'];

                //comparar si existe el nombre //////////////////////////////////////////////////////////////
                if($producto==""){
                    $producto=0;
                }
                if($cantidad==""){
                    $cantidad=0;
                }
                if($producto!=0 && $producto<=$to){
                    $sql ="SELECT precio from producto where id_prod=$producto";
                    $result = $conexion->query($sql);
                    $row = $result->fetch_assoc();
                    $valor=$row['precio'];
                }else{
                    //sisisisisisisiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
                    $valor=0;
                }
                if($valor != null){

                

                $precio =$valor * $cantidad;
                $total = $total + $precio;
                
                if($nombre==""){
                    if(($producto!=0 && $producto<=$to) || $cantidad!=0){
                        $sql1="UPDATE producto set cantidad=cantidad+$cantidad
                        where id_prod=$producto";
                        $agregar=$conexion->query($sql1);
                    }
                }
            
                $id_cliente ="SELECT id_cliente from cliente where nom_cliente 
                like '$nombre%' and ape_pat like '$pat%' and ape_mat like '$mat%'";
                $id = $conexion->query($id_cliente);
                $row2 = $id->fetch_assoc();
                $id=$row2['id_cliente'];

                if($id==""){
                    echo "<script type='text/javascript>alert('no existe ese nombre');</script>'";
                    header("Location:la_principal.php");
                }else{
                    echo "entro";
                    if(($producto!=0 && $producto<=$to) || $cantidad!=0){
                        $sql1="INSERT into ids(idproducto,cantidad)values($producto,$cantidad)";
                        $agregar=$conexion->query($sql1);
                    }
                }
             }
                echo" <table class='center'>
                    <tr>
                        <td align='center'>
                            <h1>INGRESE LOS DATOS</h1>
                            <h3>reciclador : $nombre $pat $mat</h3> 
                        </td>
                    </tr>
                    <tr>
                        <td align='center'>
                            <form name='Registro' action='http://localhost/conexion/la_principal.php' method='POST'> <!--Igualmente el formulario se envia a la misma pagina--> 
                        
                                <input type='hidden' name='nombre' value='".$nombre."'>
                                    
                                <input type='hidden' name='pat' value='".$pat."'>
                                    
                                <input type='hidden' name='mat' value='".$mat."'>
                                <input type='hidden' name='total' value='".$total."'>
                                <div class='input-container'>
                                    <input type='number' name='producto'><br><label>Producto:</label><br>
                                </div>
                                <div class='input-container'>
                                    <input type='number' name='cantidad'><br><label>Cantidad:</label><br>
                                </div>
                                    
                                <table>
                                    <tr>
                                        <td>
                                            <input class='btn' type='submit' name='enviar' value='Enviar'>
                                        </td>
                                        <td>
                                            <input class='btn' type='reset' name='borrar' value='Borrar'>
                                        </td>
                                    </tr>
                                </table>
                            </form> 
                            <div class='input-container'>
                                <input type='number' id='total' value=$total><label>Total:</label><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form name='Registro' action='http://localhost/conexion/la_chida.php' method='POST'> <!--Igualmente el formulario se envia a la misma pagina--> 
                        
                                <input type='hidden' name='nombre' value='".$nombre."'>
                            
                                <input type='hidden' name='pat' value='".$pat."'>
                            
                                <input type='hidden' name='mat' value='".$mat."'>
                                <input type='hidden' name='total' value='".$total."'>
                                <table>
                                    <tr>
                                        <td>
                                            <input class='btn' type='submit' name='terminar' value='terminar'>
                                        </td>
                                    </tr>
                                </table>
                            </form> 
                        </td>
                    </tr>
                </table>";
                $sql ="SELECT id_prod,tipo_prod,descrip_prod,precio FROM producto"; 
                $result = $conexion->query($sql);

                if($result->num_rows > 0){
                    echo "<table>";
                    while($row = $result->fetch_assoc()){
                        echo "<tr> <td> <b>id</b>: ".$row["id_prod"]."  <b>Tipo</b>: ".$row["tipo_prod"]."
                        <b>Descripcion: </b>". $row["descrip_prod"].
                        "<b> se paga a: $</b>". $row["precio"].
                        "</td> </tr>";
                    }
                    echo "</table>";
                }
               //Con el query manda los datos y apoyado de la ecnriptacion md5 su contraseña queda encriptada
            }
        }else{
    ?>
            <table  class="center">
                <tr>
                    <td align="center">
                        <h1>INGRESE LOS DATOS</h1> <!--Formulario para crear al nuevo usuario--> 
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <form name="Registro" action="http://localhost/conexion/la_principal.php" method="POST"> <!--Igualmente el formulario se envia a la misma pagina--> 
                            <div class="input-container">
                                <input type="text" name="nombre"><br><label>Nombre de la persona:</label><br>
                            </div>
                            <div class="input-container">
                                <input type="text" name="pat"><br><label>Apellido paterno:</label><br>
                            </div>
                            <div class="input-container">
                                <input type="text" name="mat"><br><label>Apellido materno:</label><br>
                            </div>
                            <div class="input-container">
                                <input type="text" name="producto"><br><label>Producto:</label><br>
                            </div>
                            <div class="input-container">
                                <input type="text" name="cantidad"><br><label>Cantidad:</label><br>
                            </div>
                        
                            <table>
                                <tr>
                                    <td>
                                        <input type="hidden" name="total"  value=0>
                                        <input  class="btn" type="submit" name="enviar" value="Enviar">
                                    </td>
                                    <td>
                                        <input  class="btn" type="reset" name="borrar" value="Borrar">
                                    </td>
                                </tr>
                            </table>
                        </form> 
                    </td>
                </tr>
                <tr>
                    <td>
                    <?php
                        include('database.php');
                        $conexion=conectar();
                        
                        if(!$conexion){
                            die("error de conexion");
                        }else{   
                            
                            $sql ="SELECT id_prod,tipo_prod,descrip_prod,precio FROM producto"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
                            $result = $conexion->query($sql);
                            if($result->num_rows > 0){
                                echo "<table>";
                                while($row = $result->fetch_assoc()){
                                    echo "<tr> <td>  <b>id</b>: ".$row["id_prod"]."
                                    <b>Tipo</b>: ".$row["tipo_prod"]."
                                    <b>Descripcion: </b>". $row["descrip_prod"].
                                    "<b> se paga a: $</b>". $row["precio"].
                                    "</td> </tr>";
                                }
                                echo "</table>";
                            }
                        }
                    ?>
                    </td>
                </tr>
            </table>
    <?php
        }
                        
                            $var="call cuantos_productos()";
                            $resu2 = $conexion->query($var); //-------------------------
                        
                            $duct = $resu2->fetch_assoc();
                           $res= $duct['total'];
                            echo "<center><h2 style='color:#FFFFFF'>TOTAL DE PRODUCTOS ".$res. "</h2></center><br>";
                            //~~~~~~~~~~~~~~~~~~~~~
    ?>
    
</body>
</html>