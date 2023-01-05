<?php
include('../conexion.php');
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];
$cedula = $_POST['cedulan'];
$telefono = $_POST['telefono'];
$claveh = password_hash($clave, PASSWORD_DEFAULT);
$consulta = "INSERT INTO `usuarios`(`cedula`, `nombre`, `correo`, `telefono`, `rol`, `usuario`, `clave`) VALUES 
('$cedula','$nombre','$correo','$telefono','$rol','$usuario','$claveh')";
echo $query = mysqli_query($link, $consulta) or die($consulta);
