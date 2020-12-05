<?php
    include('database.php');
    $conexion=conectar();
    if(!$conexion)
    {
        die("error de conexion");
    }
    
    $nombre=$_POST['nombre'];
    $total=$_POST['total'];
    if($nombre!=""){
    $id_recicladora ="SELECT id_recicladora from recicladora where nombre
    like '$nombre%'";
    $id = $conexion->query($id_recicladora);
    $row2 = $id->fetch_assoc();
    $id=$row2['id_recicladora'];
if($total!=0){
    $sql="INSERT into factura_venta(id_reci,total_V,fecha_v)
    values($id,$total,sysdate()) ";
    $result=$conexion->query($sql);

    $id_fac ="SELECT max(id_factura_venta) as 'id' from factura_venta";
    $fac = $conexion->query($id_fac);
    $row3 = $fac->fetch_array();
    $f=$row3['id'];

    
$ids ="SELECT idproducto,cantidad FROM ids";
$ids_result = $conexion->query($ids);
if($ids_result->num_rows > 0)
{
    
    while($row = $ids_result->fetch_assoc())
    {
        $idprod=$row['idproducto'];
        $canti=$row['cantidad'];
        $lleva="INSERT into venta(id_factura_v,id_producto,
        cantidad) values($f,$idprod,$canti)";
        $lleva_sql = $conexion->query($lleva);
        $sql1="UPDATE producto set cantidad=cantidad-$canti
               where id_prod=$idprod";
        $agregar=$conexion->query($sql1);
    }
}
}
$trun="truncate ids";
$cate=$conexion->query($trun);

    }
    header('Location: la_principal2.php');
?>


