<HTML>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./librerias/alertify/css/alertify.css" />
    <link rel="stylesheet" type="text/css" href="./librerias/alertify/css/themes/default.css" />
    <link type="text/css" href="./librerias/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel=" Stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="./css/configuracion/desktop.css">
    <SCRIPT src="librerias/alertify/alertify.js">

    </script>
    <title>Productos</title>
</head>

<body>
    <header>
        <?php
        session_start();
        if ($_SESSION['rol'] == 3) {
            header('Location: ' . "./index.php");
        }
        include_once('./layouts/menu.php');
        include_once('./conexion.php');
        ?>
    </header>
    <main style="max-width:90% ;" class=" container container-md">
        <div class="tabla-registros">
            <div class="titulo-tabla">
                <h2>Productos</h2>
            </div>
            <section class="parametros">
                <span class="btn btn-primary boton-parametro" data-toggle="modal" data-target="#nuevacuenta">
                    <b> Registrar producto</b>
                </span>
            </section>
            <div class="modal fade" id="nuevacuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="form-row formulario">
                                    <div class="form-group mediano-grande">
                                        <label for="producton">producto:</label>
                                        <input style="text-align:center" class=" form-control " id="producton" name="producton" type="text">
                                    </div>
                                    <div class="form-group mediano-grande">
                                        <label for="precion">precio:</label>
                                        <input style="text-align:center" class=" form-control " id="precion" name="precion" type="number">
                                    </div>

                                </div>
                                <div class="form-row formulario">
                                    <div class="form-group mediano-grande">
                                        <label for="disponibilidadn">Disponibilidad:</label>
                                        <input style="text-align:center" class="form-control " id="disponibilidadn" name="disponibilidadn" type="number">
                                    </div>
                                    <div class="form-group mediano-grande">

                                        <label for="imagenn">Imagen:</label>
                                        <input style="text-align:center" class=" form-control " id="imagenn" name="imagenn" type="file">
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <div></div>
                            <div> <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="registrarproducto" class="btn btn-primary">Registrar</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <table id="usuarios" class="table table-striped  table-responsive-lg usuarios ">
                <thead>
                    <tr>
                        <th> Producto </th>
                        <th> Precio </th>
                        <th> Disponibilidad </th>
                        <th> Imagen </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consultausuarios = "select* from productos ";
                    $query = mysqli_query($link, $consultausuarios) or die($consultausuarios);
                    while ($filas = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td> <?php echo $filas['producto'] ?> </td>
                            <td> <?php echo '$' . number_format($filas['precio']) ?> </td>
                            <td> <?php echo $filas['disponibilidad'] ?> </td>
                            <td>
                                <img src="./productos/imagenproductos/<?php echo $filas['nombrearchivo']; ?>" class="img-fluid" alt="Foto de producto" style="width: 70x ;height:70px">
                            </td>
                            <td>
                                <script>
                                    function detallesproducto(id) {
                                        productou = $('#productou').val();
                                        $('#idproducto').val(id);
                                        $.ajax({
                                            type: "POST",
                                            data: "id=" + id,
                                            url: "productos/obtenerdatosproducto.php",
                                            success: function(r) {
                                                dato = jQuery.parseJSON(r);
                                                $('#producto').val(dato['producto']);
                                                $('#idproducto').val(id);
                                                $('#precio').val(dato['precio']);
                                                $('#pruebaid').val(id);
                                                $('#disponibilidad').val(dato['disponibilidad']);
                                                document.getElementById("fotoproducto").src = "./productos/imagenproductos/" + dato['nombrearchivo'];
                                            }
                                        });
                                    }
                                </script>

                                <button onclick="detallesproducto(<?php echo $filas['idproducto'] ?>)" type="button" title="Editar tipo de documento" id="detallesproducto" class="btn btn-primary" data-toggle="modal" data-target="#editarproducto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                                <button onclick="detallesproducto(<?php echo $filas['idproducto'] ?>)" type="button" title="Eliminar producto" id="eliminarproducto" name="eliminarproducto" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="modal fade" id="editarproducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="form-row formulario">
                                    <div class="form-group mediano-grande">
                                        <label for="producto">producto:</label>
                                        <input style="text-align:center" class=" form-control " id="idproducto" name="idproducto" type="hidden">
                                        <input style="text-align:center" class=" form-control " id="producto" name="producto" type="text">
                                    </div>
                                    <div class="form-group mediano-grande">
                                        <label for="precio">precio:</label>
                                        <input style="text-align:center" class=" form-control " id="precio" name="precio" type="number">
                                    </div>

                                </div>
                                <div class="form-row formulario">
                                    <div class="form-group mediano-grande">
                                        <label for="disponibilidad">Disponibilidad:</label>
                                        <input style="text-align:center" class="form-control " id="disponibilidad" name="disponibilidad" type="number">
                                    </div>
                                    <div class="form-group mediano-grande">

                                        <label for="imagen">Imagen:</label>
                                        <input style="text-align:center" class=" form-control " id="imagen" name="imagen" type="file">
                                    </div>

                                </div>
                                <div class="form-row formulario">
                                    <img src="./productos/imagenproductos/<?php echo $filas['nombrearchivo']; ?>" id="fotoproducto" name="fotoproducto" class="img-fluid" alt="Foto de producto" style="width: 200x ;height:200px">

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">

                            <div> <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="guardarproducto" class="btn btn-primary">Editar</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <input style="text-align:center" class=" form-control " id="pruebaid" name="pruebaid" type="text">
    </footer>
</body>

</HTML>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./librerias/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#guardarproducto').click(function() {
            a = 0;
            idproducto = $('#idproducto').val();
            imagen = $('#imagen').val();
            disponibilidad = $('#disponibilidad').val();
            producto = $('#producto').val();
            precio = $('#precio').val();
            if (producto == '') {
                a = 1;
                alertify.alert('ATENCION!!', 'Favor llenar el campo de nombre. ', function() {
                    alertify.success('Ok');
                });
            }
            if (precio < 1000) {
                a = 1;
                alertify.alert('ATENCION!!', 'El precio del producto debe ser mayo a $1.000.', function() {
                    alertify.success('Ok');
                });
            }
            if (disponibilidad < 1) {
                a = 1;
                alertify.alert('ATENCION!!', 'Debe de haber minimo un producto disponible.', function() {
                    alertify.success('Ok');
                });
            }
            if (imagen != "") {
                fotoproducto = $('#imagen').val();
                filesize = $('#imagen')[0].files[0].size;
                if (filesize > 55000000000000) {
                    a = 1;
                    alertify.alert('ATENCION!!', 'La imagen del producto es demasiado pesada. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (a == 0) {
                    soporte = $('#imagen').prop('files')[0];
                    datosForm = new FormData;
                    datosForm.append("soporte", soporte);
                    ruta = 'productos/subirimagendeproducto.php?id=' + idproducto;
                    $.ajax({
                        type: "POST",
                        url: ruta,
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: datosForm,
                        success: function(r) {
                            if (r == 1) {
                                // console.log(r);
                                // debugger;
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1500);
                                alertify.success('Operación exitosa. ');
                            } else {
                                // console.log(r);
                                // debugger;
                            }
                        }
                    });

                };
            }
            if (a == 0) {
                cadenau = "precio=" + precio + "&idproducto=" + idproducto + "&producto=" + producto + "&precio=" + precio + "&imagen=" + imagen + "&disponibilidad=" + disponibilidad;
                $.ajax({
                    type: "POST",
                    url: "productos/editarproducto.php",
                    data: cadenau,
                    success: function(r) {
                        if (r == 1) {
                            setTimeout(function() {
                                window.location.reload();
                            }, 1500);
                        } else {
                            // console.log(r);
                            // debugger;
                        }
                    }
                });

            }

        });
        $('#registrarproducto').click(function() {
            a = 0;
            imagen = $('#imagenn').val();
            disponibilidad = $('#disponibilidadn').val();
            producto = $('#producton').val();
            precio = $('#precion').val();
            if (producto == '') {
                a = 1;
                alertify.alert('ATENCION!!', 'Favor llenar el campo de nombre. ', function() {
                    alertify.success('Ok');
                });
            }
            if (precio < 1000) {
                a = 1;
                alertify.alert('ATENCION!!', 'El precio del producto debe ser mayo a $1.000.', function() {
                    alertify.success('Ok');
                });
            }
            if (disponibilidad < 1) {
                a = 1;
                alertify.alert('ATENCION!!', 'Debe de haber minimo un producto disponible.', function() {
                    alertify.success('Ok');
                });
            }
            if (a == 0) {
                cadenau = "precio=" + precio + "&producto=" + producto + "&precio=" + precio + "&imagen=" + imagen + "&disponibilidad=" + disponibilidad;
                $.ajax({
                    type: "POST",
                    url: "productos/registrarproducto.php",
                    data: cadenau,
                    success: function(r) {
                        if (r == 1) {

                        } else {
                            // console.log(r);
                            // debugger;
                        }
                    }
                });
                fotoproducto = $('#imagenn').val();
                filesize = $('#imagenn')[0].files[0].size;
                if (filesize > 55000000000000) {
                    a = 1;
                    alertify.alert('ATENCION!!', 'La imagen del producto es demasiado pesada. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (a == 0) {
                    soporte = $('#imagenn').prop('files')[0];
                    datosForm = new FormData;
                    datosForm.append("soporte", soporte);
                    ruta = 'productos/subirimagendeproducto.php';
                    $.ajax({
                        type: "POST",
                        url: ruta,
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: datosForm,
                        success: function(r) {
                            if (r == 1) {
                                // console.log(r);
                                // debugger;
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1500);
                                alertify.success('Operación exitosa. ');
                            } else {
                                // console.log(r);
                                // debugger;
                            }
                        }
                    });

                }
            }

        });
        $('#eliminarproducto').click(function() {
            productou = $('#pruebaid').val();
            debugger;
            console.log(productou);
            alertify.confirm('Confirmación', 'Esta seguro que desea eliminar el usuario ' + productou + '?', function() {
                cadenau = "id=" + productou;
                $.ajax({
                    type: "POST",
                    url: "productos/eliminarproducto.php",
                    data: cadenau,
                    success: function(r) {
                        if (r == 1) {
                            console.log(r);
                            debugger;
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                            alertify.warning('Producto eliminado');
                        } else {
                            console.log(r);
                            debugger;
                        }
                    }
                });

            }, function() {
                alertify.error('Cancelado');
            });

        });
    });
</script>
<script type="text/javascript" src="./librerias/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>