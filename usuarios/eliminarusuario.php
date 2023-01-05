<?php
include('../conexion.php');
$cedula = $_POST['cedula'];





$consulta = "DELETE FROM `usuarios` WHERE cedula = '$cedula' ";
echo $query = mysqli_query($link, $consulta) or die($consulta);
