<?php


include('../conexion.php');
$cedula = $_POST['cedula'];
$consultadatos = "select * from usuarios where cedula = '$cedula'";
$query = mysqli_query($link, $consultadatos) or die($consultadatos);
$ver = mysqli_fetch_row($query);
$datos = array(
    'nombre' => $ver[1],
    'correo' => $ver[2],
    'telefono' => $ver[3],
    'rol' => $ver[4],
    'usuario' => $ver[5],
);
echo json_encode($datos);
