<?php
session_start();
if ($_SESSION['usuario']) {
    include('../conexion.php');
    foreach ($_FILES as $file) {

        // $extension = pathinfo($file['name']['full_path'], PATHINFO_EXTENSION);
        if (isset($_GET['id'])) {
            $consultaarchivoactual = "SELECT nombrearchivo FROM `productos` where idproducto = '$_GET[id]'";
            $query = mysqli_query($link, $consultaarchivoactual) or die($consultaarchivoactual);
            $fila = mysqli_fetch_array($query);
            if (isset($fila)) {
                $id = $_GET['id'];
                $archivoactual = $fila['nombrearchivo'];
                if ($archivoactual != '') {
                    // unlink('./imagenproductos/' . $archivoactual);
                }
                move_uploaded_file($file['tmp_name'],  './imagenproductos/' . $file['name']);
            }
        } else {
            $consultaarchivoactual = "SELECT MAX(idproducto) 'id',nombrearchivo FROM `productos`";
            $query = mysqli_query($link, $consultaarchivoactual) or die($consultaarchivoactual);
            $fila = mysqli_fetch_array($query);
            if (isset($fila)) {
                $id = $fila['id'];
                $archivoactual = $fila['nombrearchivo'];
                if ($archivoactual != '') {
                    //  unlink('./imagenproductos/' . $archivoactual);
                }
                move_uploaded_file($file['tmp_name'],  './imagenproductos/' . $file['name']);
            }
        }

        $consultaarchivoactual;

        $consultaarchivo = "  UPDATE `productos` SET `nombrearchivo`='$file[name]' WHERE idproducto = '$id' ";
        echo $query = mysqli_query($link, $consultaarchivo) or die($consultaarchivo);
    }
}
