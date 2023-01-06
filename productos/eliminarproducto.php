<?php
include('../conexion.php');
$id = $_POST['id'];
$consulta = "DELETE FROM `productos` WHERE idproducto = '$id' ";
echo $query = mysqli_query($link, $consulta) or die($consulta);
