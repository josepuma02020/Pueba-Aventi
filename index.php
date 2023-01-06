<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/home/desktop.css">
    <link rel="stylesheet" type="text/css" href="./librerias/alertify/css/alertify.css" />
    <link rel="stylesheet" type="text/css" href="./librerias/alertify/css/themes/default.css" />
    <title>Home</title>
</head>

<body>
    <header>
        <?php
        session_start();
        include_once('./layouts/menu.php');
        include_once('./conexion.php');
        ?>
    </header>
    <main>
        <section class="seccion-menu">
            <h4>Productos</h4>
            <hr>
            <div class="opciones">
                <?php
                $consultausuarios = "select* from productos ";
                $query = mysqli_query($link, $consultausuarios) or die($consultausuarios);
                while ($filas = mysqli_fetch_array($query)) {
                ?>
                    <div class="producto">
                        <!-- <img src="./productos/imagenproductos/<?php echo $filas['nombrearchivo']; ?>" class="img-fluid " alt="Foto de producto" style="width: 180px ;height:180px"> -->
                        <hr>
                        <div class="form-producto">
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
                                            $('#disponibles').val(dato['disponibilidad']);
                                        }
                                    });
                                }
                            </script>
                            <button onclick="detallesproducto(<?php echo $filas['idproducto'] ?>)" id="agregaracarrito" class="btn btn-success" data-toggle="modal" data-target="#formulariocarrito">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <div class="modal fade" id="formulariocarrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar producto a carrito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row formulario">
                                <div class="form-group mediano-grande">
                                    <label for="producto">Producto:</label>
                                    <input style="text-align:center" class=" form-control " id="idproducto" name="idproducto" type="hidden">
                                    <input disabled style="text-align:center" class=" form-control " id="producto" name="producto" type="text">
                                </div>
                                <div class="form-group mediano-grande">
                                    <label for="precio">Precio:</label>
                                    <input disabled style="text-align:center" class=" form-control " id="precio" name="precio" type="number">
                                </div>
                            </div>
                            <div class="form-row formulario">
                                <div class="form-group mediano-grande">
                                    <label for="disponibles">Disponibles:</label>
                                    <input disabled style="text-align:center" class="form-control " id="disponibles" name="disponibles" type="number">
                                </div>
                                <div class="form-group mediano-grande">
                                    <label for="cantidad">Cantidad:</label>
                                    <input style="text-align:center" class="form-control " id="cantidad" name="cantidad" type="number">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                        <div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="agregarproducto" class="btn btn-primary">Añadir</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./librerias/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script type="text/javascript" src="./librerias/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#agregarproducto').click(function() {
            idproducto = $('#idproducto').val();
            a = 0;
            cantidad = $('#cantidad').val();
            if (cantidad < 1) {
                a = 1;
                alertify.alert('ATENCION!!', 'La cantidad debe ser mayor a 0', function() {
                    alertify.success('Ok');
                });
            }
            if (a == 0) {
                cadenau = "cantidad=" + cantidad + "&idproducto=" + idproducto;
                $.ajax({
                    type: "POST",
                    url: "productos/registrarcarrito.php",
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
    });
</script>