<?php
    function conectar()
    {
        $servername = "localhost";
        $database = "ca";
        $username = "root";
        $password = ""; //contraseña de cada quien

        //Crear la conexion
        /*
            Correr la sig linea en Workbench si te sale un error al momento de conectar (a causa de la contraseña)
            ALTER USER 'mysqlUsername'@'localhost' IDENTIFIED WITH mysql_native_password BY 'contraseña_que_quieres';
        */
        $conn = mysqli_connect($servername, $username, $password, $database);
        //Checar si se realizo la conexion

        if(!$conn)//Si la conexion falla se detiene el flujo del programa
        {
            die("ERROR: la conexion no se realizo correctamente.". mysqli_connect_error());
        }
        $cbd = mysqli_select_db($conn,$database);
        if(!$cbd)//Si el acceso a la base de datos falla
        {
            die("ERROR DE CONEXION CON LA BASE DE DATOS");
        }
        return($conn);
    }
?>
