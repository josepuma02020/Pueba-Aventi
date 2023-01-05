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
        <SCRIPT src="librerias/alertify/alertify.js"></script>
        <title>Usuarios</title>
    </head>

    <body>
        <header>
            <?php
            include_once('./layouts/menu.php');
            include_once('./conexion.php');
            ?>
        </header>
        <main style="max-width:90% ;" class=" container container-md">
            <div class="tabla-registros">
                <div class="titulo-tabla">
                    <h2>Usuarios</h2>
                </div>
                <section class="parametros">
                    <span class="btn btn-primary boton-parametro" data-toggle="modal" data-target="#nuevacuenta">
                        <b> Registrar nuevo usuario</b>
                    </span>
                </section>
                <div class="modal fade" id="nuevacuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="form-row formulario">
                                        <div class="form-group mediano-grande">
                                            <label for="cedulan">Cedula:</label>
                                            <input style="text-align:center" class=" form-control " id="cedulan" name="cedulan" type="text">
                                        </div>
                                        <div class="form-group mediano-grande">
                                            <label for="nombren">Nombre:</label>
                                            <input style="text-align:center" class=" form-control " id="nombren" name="nombren" type="text">
                                        </div>

                                    </div>
                                    <div class="form-row formulario">
                                        <div class="form-group mediano-grande">
                                            <label for="correon">Correo:</label>
                                            <input style="text-align:center" class="form-control " id="correon" name="correon" type="email">
                                        </div>
                                        <div class="form-group mediano-grande">

                                            <label for="telefonon">Telefono:</label>
                                            <input style="text-align:center" class=" form-control " id="telefonon" name="telefonon" type="text">
                                        </div>

                                    </div>
                                    <div class="form-row formulario">
                                        <div class="form-group mediano-grande">
                                            <label for="usuario">Usuario:</label>
                                            <input style="text-align:center" class="form-control " id="usuarion" name="usuarion" type="text">
                                        </div>
                                        <div class="form-group mediano-grande">
                                            <label for="roln">Rol:</label>
                                            <select style="text-align: center;" id="roln" name="roln" class="form-control col-md-8 ">
                                                <option value="0">Seleccionar</option>
                                                <option value="1">Gerente</option>
                                                <option value="2">Supervisor</option>
                                                <option value="3">Comprador</option>
                                            </select>
                                        </div>
                                        <div class="form-row formulario">
                                            <div class="form-group mediano-grande">
                                                <label for="claven">Clave:</label>
                                                <input style="text-align:center" class="form-control " id="claven" name="claven" type="password">
                                            </div>
                                            <div class="form-group mediano-grande">
                                                <label for="confirmarclaven">Confirmar Clave:</label>
                                                <input style="text-align:center" class="form-control " id="confirmarclaven" name="confirmarclaven" type="password">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="registrar" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="usuarios" class="table table-striped  table-responsive-lg usuarios ">
                    <thead>
                        <tr>
                            <th> Cedula</th>
                            <th> Nombre</th>
                            <th> Correo</th>
                            <th> Teléfono</th>
                            <th> Usuario </th>
                            <th> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consultausuarios = "select* from usuarios ";
                        $query = mysqli_query($link, $consultausuarios) or die($consultausuarios);
                        while ($filas = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td> <?php echo $filas['cedula'] ?> </td>
                                <td> <?php echo $filas['nombre'] ?> </td>
                                <td> <?php echo $filas['correo'] ?> </td>
                                <td> <?php echo $filas['telefono'] ?> </td>
                                <td> <?php echo $filas['usuario'] ?> </td>
                                <td>
                                    <input disabled style="text-align:center" class=" form-control " id="cedulau" name="cedulau" type="hidden" value="<?php echo $filas['cedula'] ?>">
                                    <button type="button" title="Editar tipo de documento" id="detallesusuario" class="btn btn-primary" data-toggle="modal" data-target="#editarusuario">
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
                <div class="modal fade" id="editarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="form-row formulario">
                                        <div class="form-group mediano-grande">
                                            <label for="cedulan">Cedula:</label>
                                            <input disabled style="text-align:center" class=" form-control " id="cedula" name="cedula" type="text">
                                        </div>
                                        <div class="form-group mediano-grande">
                                            <label for="nombren">Nombre:</label>
                                            <input style="text-align:center" class=" form-control " id="nombre" name="nombre" type="text">
                                        </div>

                                    </div>
                                    <div class="form-row formulario">
                                        <div class="form-group mediano-grande">
                                            <label for="correon">Correo:</label>
                                            <input style="text-align:center" class="form-control " id="correo" name="correo" type="email">
                                        </div>
                                        <div class="form-group mediano-grande">

                                            <label for="telefonon">Telefono:</label>
                                            <input style="text-align:center" class=" form-control " id="telefono" name="telefono" type="text">
                                        </div>

                                    </div>
                                    <div class="form-row formulario">
                                        <div class="form-group mediano-grande">
                                            <label for="usuario">Usuario:</label>
                                            <input style="text-align:center" class="form-control " id="usuario" name="usuario" type="text">
                                        </div>
                                        <div class="form-group mediano-grande">
                                            <label for="roln">Rol:</label>
                                            <select style="text-align: center;" id="rol" name="rol" class="form-control col-md-8 ">
                                                <option value="0">Seleccionar</option>
                                                <option value="1">Gerente</option>
                                                <option value="2">Supervisor</option>
                                                <option value="3">Comprador</option>
                                            </select>
                                        </div>
                                        <div class="form-row formulario">
                                            <div class="form-group mediano-grande">
                                                <label for="claven">Nueva clave:</label>
                                                <input style="text-align:center" class="form-control " id="clave" name="clave" type="password">
                                            </div>
                                            <div class="form-group mediano-grande">
                                                <label for="confirmarclaven">Confirmar lave:</label>
                                                <input style="text-align:center" class="form-control " id="confirmarclave" name="confirmarclave" type="password">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="guardarusuario" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
        </footer>
    </body>

    </HTML>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./librerias/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="./librerias/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#guardarusuario').click(function() {
                a = 0;
                confirmarclave = $('#confirmarclave').val();
                nombre = $('#nombre').val();
                correo = $('#correo').val();
                telefono = $('#telefono').val();
                rol = $('#rol').val();
                cedulan = $('#cedula').val();
                usuario = $('#usuario').val();
                clave = $('#clave').val();
                if (clave != confirmarclave) {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Las claves no coinciden. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (nombre == '') {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Favor llenar el campo de nombre. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (telefono == '' || telefono < 9999) {
                    a = 1;
                    alertify.alert('ATENCION!!', 'El campo de telefono es obligatorio y debe tener mas de 5 digitos. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (correo == '') {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Favor llenar el campo de correo. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (rol == 0) {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Favor escoger un rol para el nuevo usuario. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (usuario == '') {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Favor llenar el campo de usuario. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (a == 0) {
                    cadenau = "nombre=" + nombre + "&correo=" + correo + "&rol=" + rol + "&usuario=" + usuario + "&clave=" + clave + "&telefono=" + telefono + "&cedulan=" + cedulan;
                    $.ajax({
                        type: "POST",
                        url: "usuarios/editarusuario.php",
                        data: cadenau,
                        success: function(r) {
                            if (r == 1) {
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                // console.log(r);
                                // debugger;
                            }
                        }
                    });

                }

            });
            $('#registrar').click(function() {
                a = 0;
                confirmarclave = $('#confirmarclaven').val();
                nombre = $('#nombren').val();
                correo = $('#correon').val();
                telefono = $('#telefonon').val();
                rol = $('#roln').val();
                cedulan = $('#cedulan').val();
                usuario = $('#usuarion').val();
                clave = $('#claven').val();
                if (clave != confirmarclave) {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Las claves no coinciden. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (nombre == '') {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Favor llenar el campo de nombre. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (telefono == '' || telefono < 9999) {
                    a = 1;
                    alertify.alert('ATENCION!!', 'El campo de telefono es obligatorio y debe tener mas de 5 digitos. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (correo == '') {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Favor llenar el campo de correo. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (rol == 0) {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Favor escoger un rol para el nuevo usuario. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (usuario == '') {
                    a = 1;
                    alertify.alert('ATENCION!!', 'Favor llenar el campo de usuario. ', function() {
                        alertify.success('Ok');
                    });
                }
                if (a == 0) {
                    cadenau = "nombre=" + nombre + "&correo=" + correo + "&rol=" + rol + "&usuario=" + usuario + "&clave=" + clave + "&telefono=" + telefono + "&cedulan=" + cedulan;
                    $.ajax({
                        type: "POST",
                        url: "usuarios/registrarusuario.php",
                        data: cadenau,
                        success: function(r) {
                            if (r == 1) {
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                // console.log(r);
                                // debugger;
                            }
                        }
                    });

                }

            });
            $('#detallesusuario').click(function() {
                cedulau = $('#cedulau').val();
                $('#cedula').val(cedulau);
                $.ajax({
                    type: "POST",
                    data: "cedula=" + cedulau,
                    url: "usuarios/obetnerdatosusuario.php",
                    success: function(r) {
                        dato = jQuery.parseJSON(r);
                        $('#nombre').val(dato['nombre']);
                        $('#correo').val(dato['correo']);
                        $('#rol').val(dato['rol']);
                        $('#telefono').val(dato['telefono']);
                        $('#usuario').val(dato['usuario']);
                    }
                });


            });
        });
    </script>