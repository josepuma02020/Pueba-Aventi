<?php
include('../conexion.php');
$precio = $_POST['precio'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$disponibilidad = $_POST['disponibilidad'];
$consulta = "INSERT INTO `productos`(`idproducto`, `producto`, `precio`, `disponibilidad`, `nombrearchivo`) VALUES 
('','$producto','$precio','$disponibilidad','')";
echo $query = mysqli_query($link, $consulta) or die($consulta);
