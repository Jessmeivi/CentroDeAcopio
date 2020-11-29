<?php
    include('database.php');
    $conexion=conectar();
    if(!$conexion)
    {
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
        while($row = $result->fetch_assoc())
        {
            echo "<tr> <td>  <b>Tipo</b>: ".$row["tipo_prod"]."
            <b>Descripcion: </b>". $row["descrip_prod"].
            "<b> se paga a: $</b>". $row["precio"].
            "</td> </tr>";
                }
                echo "</table>";
            }
?>