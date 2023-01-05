<?php
include('../conexion.php');
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];
$cedula = $_POST['cedulan'];
$telefono = $_POST['telefono'];

if ($clave != '') {
    $claveh = password_hash($clave, PASSWORD_DEFAULT);
    $consulta = "UPDATE `usuarios` SET `clave`='$claveh' WHERE cedula = '$cedula' ";
    echo $query = mysqli_query($link, $consulta) or die($consulta);
}


$consulta = "UPDATE `usuarios` SET `nombre`='$nombre',`correo`='$correo',`telefono`='$telefono',`rol`='$rol',`usuario`='$usuario' WHERE cedula = '$cedula' ";
echo $query = mysqli_query($link, $consulta) or die($consulta);
