<?php
    $usuario=$_POST['usuario'];
    $passwd=$_POST['contraseña'];
    session_start();
    $_SESSION['usuario']=$usuario;

    include('database.php');
    $conexion=conectar();

    $consulta="SELECT * FROM empleado WHERE id_empleado='$usuario' AND passwd='$passwd'";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_num_rows($resultado);

    if($filas){
        header('Location: inicio_emp.php');
    }else{
?>
<?php
    header('Location: index.php');
?>
<?php
    }
    mysqli_free_result($resultado);
    //mysqli_close($conn);

?>