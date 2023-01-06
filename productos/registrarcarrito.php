<?php
session_start();
include('../conexion.php');
$cantidad = $_POST['cantidad'];
$idproducto = $_POST['idproducto'];
$precio = $_POST['precio'];
$consultaexistecarrito = "select * from compra where cliente = $_SESSION[cedula]";
$query = mysqli_query($link, $consultaexistecarrito) or die($consultaexistecarrito);
$fila = mysqli_fetch_array($query);
if (isset($fila)) {
    $idcompra = $fila['idcompra'];
} else {
    $consultanuevacompra = "INSERT INTO `compra`(`idcompra`, `cliente`, `estado`) VALUES ('','$_SESSION[cedula]','0')";
    $query = mysqli_query($link, $consultanuevacompra) or die($consultanuevacompra);
    $consultaexistecarrito = "select max(idcompra) 'idcompra' from compra ";
    $query = mysqli_query($link, $consultaexistecarrito) or die($consultaexistecarrito);
    $fila = mysqli_fetch_array($query);
    $idcompra = $fila['idcompra'];
}
$valor = $cantidad * $precio;
$consultanuevoregistrodecompra = "INSERT INTO `registroscompra`(`idregistro`, `producto`, `compra`, `cantidad`,`precio`) VALUES ('','$idproducto','$idcompra','$cantidad','$valor')";
echo $query = mysqli_query($link, $consultanuevoregistrodecompra) or die($consultanuevoregistrodecompra);
