<?php
session_start();
if ($_SESSION['usuario']) {
    include('../conexion.php');
    foreach ($_FILES as $file) {
        // $extension = pathinfo($file['name']['full_path'], PATHINFO_EXTENSION);
        $consultaarchivoactual = "SELECT MAX(idproducto) 'id',nombrearchivo FROM `productos`";
        $query = mysqli_query($link, $consultaarchivoactual) or die($consultaarchivoactual);
        $fila = mysqli_fetch_array($query);
        if (isset($fila)) {
            $id = $fila['id'];
            $archivoactual = $fila['nombrearchivo'];
            if ($archivoactual != '') {
                unlink('./imagenproductos/' . $archivoactual);
            }
        }


        move_uploaded_file($file['tmp_name'],  './imagenproductos/' . $file['name']);
        $consultaarchivo = "  UPDATE `productos` SET `nombrearchivo`='$file[name]' WHERE idproducto = '$id' ";
        echo $query = mysqli_query($link, $consultaarchivo) or die($consultaarchivo);
    }
}
