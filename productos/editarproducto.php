<?php
include('../conexion.php');
$precio = $_POST['precio'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$idproducto = $_POST['idproducto'];
$disponibilidad = $_POST['disponibilidad'];
$consulta = "UPDATE `productos` SET `producto`='$producto',`precio`='$precio ',`disponibilidad`='$disponibilidad' WHERE idproducto = '$idproducto'";
echo $query = mysqli_query($link, $consulta) or die($consulta);
