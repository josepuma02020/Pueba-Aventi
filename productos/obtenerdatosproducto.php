<?php


include('../conexion.php');
$id = $_POST['id'];
$consultadatos = "SELECT * FROM `productos` WHERE idproducto = '$id'";
$query = mysqli_query($link, $consultadatos) or die($consultadatos);
$ver = mysqli_fetch_row($query);
$datos = array(
    'producto' => $ver[1],
    'precio' => $ver[2],
    'disponibilidad' => $ver[3],
    'nombrearchivo' => $ver[4],
);
echo json_encode($datos);
