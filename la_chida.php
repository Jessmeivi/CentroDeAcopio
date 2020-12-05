<?php
    include('database.php');
    $conexion=conectar();
    if(!$conexion)
    {
        die("error de conexion");
    }
    $pat=$_POST['pat'];
    $mat=$_POST['mat'];
    $nombre=$_POST['nombre'];
    $total=$_POST['total'];
    if($nombre!=""){
    $id_cliente ="SELECT id_cliente from cliente where nom_cliente 
    like '$nombre%' and ape_pat like '$pat%' and ape_mat like '$mat%'";
    $id = $conexion->query($id_cliente);
    $row2 = $id->fetch_assoc();
    $id=$row2['id_cliente'];
if($total!=0){
    $sql="INSERT into factura_comp(id_cliente,total,fecha)
    values($id,$total,sysdate()) ";
    $result=$conexion->query($sql);

    $id_fac ="SELECT max(id_fac) as 'id' from factura_comp";
    $fac = $conexion->query($id_fac);
    $row3 = $fac->fetch_assoc();
    $f=$row3['id'];

    
$ids ="SELECT idproducto,cantidad FROM ids";
$ids_result = $conexion->query($ids);
if($ids_result->num_rows > 0)
{
    
    while($row = $ids_result->fetch_assoc())
    {
        $idprod=$row['idproducto'];
        $canti=$row['cantidad'];
        $lleva="INSERT into lleva(id_factura,id_producto,
        cantidad) values($f,$idprod,$canti)";
        $lleva_sql = $conexion->query($lleva);
        $sql1="UPDATE producto set cantidad=cantidad+$canti
               where id_prod=$idprod";
        $agregar=$conexion->query($sql1);
    }
}
}
$trun="truncate ids";
$cate=$conexion->query($trun);

    }
    header('Location: la_principal.php');
?>


