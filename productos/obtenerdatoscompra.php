<?php
include('../conexion.php');
$id = $_POST['id'];
$consultadatos = "SELECT a.*,b.producto'nproducto' FROM registroscompra a INNER JOIN productos b on b.idproducto=a.producto WHERE  compra = '$id'";
$query = mysqli_query($link, $consultadatos) or die($consultadatos);
$datos = array();
while ($filas = mysqli_fetch_array($query)) {
    $datos[] = array($filas['producto'], $filas['cantidad'], $filas['precio'], $filas['nproducto']);
}

echo json_encode($datos);
