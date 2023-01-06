<?php
session_start();
if ($_SESSION['usuario']) {
    include('../conexion.php');
    $iddoc = $_GET['iddoc'];
    foreach ($_FILES as $file) {
        // $extension = pathinfo($file['name']['full_path'], PATHINFO_EXTENSION);
        echo $consultaarchivoactual = "select nombrearchivo from usuarios where cedula = '$iddoc'";
        $query = mysqli_query($link, $consultaarchivoactual) or die($consultaarchivoactual);
        $fila = mysqli_fetch_array($query);
        if (isset($fila)) {
            $archivoactual = $fila['nombrearchivo'];
            unlink('./fotosdeperfil/' . $archivoactual);
        }


        move_uploaded_file($file['tmp_name'],  './fotosdeperfil/' . $file['name']);
        $consultaarchivo = "  UPDATE `usuarios` SET `nombrearchivo`='$file[name]' WHERE cedula = '$iddoc' ";
        echo $query = mysqli_query($link, $consultaarchivo) or die($consultaarchivo);
    }
}
