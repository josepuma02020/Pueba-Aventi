<HTML>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./librerias/alertify/css/alertify.css" />
    <link rel="stylesheet" type="text/css" href="./librerias/alertify/css/themes/default.css" />
    <link type="text/css" href="./librerias/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel=" Stylesheet" />
    <link rel="stylesheet" href="./css/configuracion/desktop.css">
    <SCRIPT src="librerias/alertify/alertify.js">
    </script>
    <title>Compras</title>
</head>

<body>
    <header>
        <?php
        session_start();

        include_once('./layouts/menu.php');
        include_once('./conexion.php');
        if ($_SESSION['rol'] == 3) {
            $consultacompras = "SELECT a.*,b.telefono,b.nombre,b.correo,sum(c.precio)'totalvalor' FROM compra a INNER join usuarios b on b.cedula=a.cliente inner join registroscompra c on c.compra=a.idcompra where cliente = $_SESSION[cedula] ";
        } else {
            $consultacompras = "SELECT a.*,b.telefono,b.nombre,b.correo,sum(c.precio)'totalvalor' FROM compra a INNER join usuarios b on b.cedula=a.cliente inner join registroscompra c on c.compra=a.idcompra GROUP by a.idcompra";
        }
        ?>
        <div id="registrosdecompra" class="sidenav mensajes" style="text-align: right;display:none">
            <div>
                <a class="cerrar" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            </div>
            <table id="detallesdecompra" class="table table-striped  table-responsive-lg usuarios ">
                <thead>
                    <tr>
                        <th> Producto </th>
                        <th> Cantidad </th>
                        <th> Precio </th>
                    </tr>
                </thead>
                <tbody id="detallesregistrosdecompra">
                    <tr id="detalles">

                    </tr>
                </tbody>
            </table>
        </div>
    </header>
    <main style="max-width:90% ;" class=" container container-md">
        <div class="tabla-registros">
            <div class="titulo-tabla">
                <h2>Compras</h2>
            </div>
            <table id="compras" class="table table-striped  table-responsive-lg usuarios ">
                <thead>
                    <tr>
                        <th> Cliente </th>
                        <th> Correo </th>
                        <th> Telefono </th>
                        <th> Valor de compra </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($link, $consultacompras) or die($consultacompras);
                    while ($filas = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td> <?php echo $filas['nombre'] ?> </td>
                            <td> <?php echo $filas['correo'] ?> </td>
                            <td> <?php echo $filas['telefono'] ?> </td>
                            <td> <?php echo '$' . number_format($filas['totalvalor']) ?> </td>
                            <td>
                                <script>
                                    function detallescompra(id) {
                                        openMsg();
                                        $('#detalles').remove();

                                        $.ajax({
                                            type: "POST",
                                            data: "id=" + id,
                                            url: "productos/obtenerdatoscompra.php",
                                            success: function(r) {
                                                dato = jQuery.parseJSON(r);
                                                console.log((dato.length));
                                                for (i = 0; i < dato.length; i++) {
                                                    $('#detallesdecompra').append('<tr id="detalles"><td>' + dato[i][3] + '</td><td>' + dato[i][1] + '</td><td>' + dato[i][2] + '</td></tr>');
                                                }
                                            }
                                        });
                                    }
                                </script>
                                <button onclick="detallescompra(<?php echo $filas['idcompra'] ?>)" type="button" title="Editar tipo de documento" id="cargadetalles" class="btn btn-primary" data-toggle="modal" data-target="#editarproducto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </main>
    <footer>
    </footer>
</body>


</HTML>
<script>
    function openMsg() {
        document.getElementById("registrosdecompra").style.display = "block";
    }

    function closeNav() {
        document.getElementById("registrosdecompra").style.display = "none";
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./librerias/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
<script type="text/javascript" src="./librerias/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>