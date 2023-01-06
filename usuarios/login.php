<?php
session_start();
include('../conexion.php');
$usuario = htmlentities($_POST['usuario']);
$clave1 = htmlentities($_POST['clave']);
echo $consulta = "SELECT * from  usuarios where usuario = '$usuario'";
$query = mysqli_query($link, $consulta) or die($consulta);

$arreglo = mysqli_fetch_array($query);
if (isset($arreglo)) {
    $clave2 = $arreglo['clave'];
    $rol = $arreglo['rol'];
    //autenticacion
    if (password_verify($clave1, $clave2)) {
        $_SESSION['cedula'] = $arreglo['cedula'];
        $_SESSION['usuario'] = $usuario;
        $_SESSION['correo'] = $arreglo['correo'];
        $_SESSION['rol'] = $rol;
        $_SESSION['nombre'] = $arreglo['nombre'];
        $_SESSION['correo'] = $arreglo['correo'];
        $_SESSION['telefono'] = $arreglo['telefono'];
        header('Location: ' . "../index.php");
    }
} else {
    header('Location: ' . "./index.php");
}
