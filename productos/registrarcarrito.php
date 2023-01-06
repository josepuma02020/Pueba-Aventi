<?php
session_start();
include('../conexion.php');
$cantidad = $_POST['cantidad'];
$idproducto = $_POST['idproducto'];
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
echo $idcompra;
$consultanuevoregistrodecompra = "INSERT INTO `registroscompra`(`idregistro`, `producto`, `compra`, `cantidad`) VALUES ('','$idproducto','$idcompra','$cantidad')";
$query = mysqli_query($link, $consultanuevoregistrodecompra) or die($consultanuevoregistrodecompra);
