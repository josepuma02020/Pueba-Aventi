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
        session_start();
        include_once('./layouts/menu.php');
        include_once('./conexion.php');
        $cedula = $_GET['cc'];
        $consultaperfil = "select * from usuarios where cedula='$cedula'";
        $query = mysqli_query($link, $consultaperfil) or die($consultaperfil);
        $filas = mysqli_fetch_array($query);

        ?>
    </header>
    <main style="max-width:90% ;" class=" container container-md">
        <div class="tabla-registros">
            <div class="titulo-tabla">
                <h2>Perfil de usuario</h2>
            </div>
            <div class="formularioperfil">
                <div style="width: 28%;">
                    <?php
                    if ($filas['nombrearchivo'] == '') {
                        $nombrearchivo = "sinfoto.jpg";
                    } else {
                        $nombrearchivo = "$filas[nombrearchivo]";
                    }
                    ?> <img src="./usuarios/fotosdeperfil/<?php echo $nombrearchivo; ?>" class="img-fluid" alt="Foto de perfil" style="width: 300px ;height:300px">
                    <div class="form-group completo">
                        <label for="cedulan">Actualizar foto de perfil:</label>
                        <input accept="image/gif,image/jpg,image/png" value="<?php echo $cedula; ?>" style="text-align:center" class=" form-control " id="fotoperfil" name="fotoperfil" type="file">
                    </div>
                </div>
                <div style="width: 68%;">

                    <div class="form-row formulario">
                        <div class="form-group mediano-grande">
                            <label for="cedula">Cedula:</label>
                            <input disabled value="<?php echo $cedula; ?>" style="text-align:center" class=" form-control " id="cedulaa" name="cedulaa" type="text">

                        </div>
                        <div class="form-group mediano-grande">
                            <label for="nombre">Nombre:</label>
                            <input value="<?php echo $filas['nombre']; ?>" style="text-align:center" class=" form-control " id="nombre" name="nombre" type="text">
                        </div>
                    </div>
                    <div class="form-row formulario">
                        <div class="form-group mediano-grande">
                            <label for="correo">Correo:</label>
                            <input value="<?php echo $filas['correo']; ?>" style="text-align:center" class=" form-control " id="correo" name="correo" type="text">
                        </div>
                        <div class="form-group mediano-grande">
                            <label for="telefono">Telefono:</label>
                            <input value="<?php echo $filas['telefono']; ?>" style="text-align:center" class=" form-control " id="telefono" name="telefono" type="text">
                        </div>
                    </div>
                    <div class="form-row formulario">
                        <div class="form-group mediano-grande">
                            <label for="cedulan">Rol:</label>
                            <select style="text-align: center;" id="rol" name="rol" value="<?php echo $filas['rol']; ?>" class="form-control col-md-8 ">
                                <?php
                                switch ($filas['rol']) {
                                    case 1:
                                ?>

                                        <option selected value="1">Gerente</option>
                                        <option value="2">Supervisor</option>
                                        <option value="3">Comprador</option>
                                    <?php
                                        break;
                                    case 2:
                                    ?>

                                        <option value="1">Gerente</option>
                                        <option selected value="2">Supervisor</option>
                                        <option value="3">Comprador</option>
                                    <?php
                                        break;
                                    case 3:
                                    ?>

                                        <option value="1">Gerente</option>
                                        <option value="2">Supervisor</option>
                                        <option selected value="3">Comprador</option>
                                <?php
                                        break;
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group mediano-grande">
                            <label for="usuario">Usuario:</label>
                            <input value="<?php echo $filas['usuario']; ?>" style="text-align:center" class=" form-control " id="usuarioe" name="usuarioe" type="text">
                        </div>
                    </div>
                    <div class="form-row formulario">
                        <div class="form-group mediano-grande">
                            <label for="clave">Clave:</label>
                            <input style="text-align:center" class="form-control " id="clave" name="clave" type="password">
                        </div>
                        <div class="form-group mediano-grande">
                            <label for="confirmarclave">Confirmar Clave:</label>
                            <input style="text-align:center" class="form-control " id="confirmarclave" name="confirmarclave" type="password">
                        </div>
                    </div>
                    <div class="form-row formulario">
                        <div class="form-group mediano-grande">
                            <button type="button" title="Editar tipo de documento" id="editarperfil" class="btn btn-success">
                                Editar usuario
                            </button>
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

        $('#editarperfil').click(function() {
            a = 0;
            confirmarclave = $('#confirmarclave').val();
            clave = $('#clave').val();
            nombre = $('#nombre').val();
            correo = $('#correo').val();
            telefono = $('#telefono').val();
            rol = $('#rol').val();
            cedulan = $('#cedulaa').val();
            usuario = $('#usuarioe').val();
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
            if (usuario == '') {
                a = 1;
                alertify.alert('ATENCION!!', 'Favor llenar el campo de usuario. ', function() {
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

            if (a == 0) {
                cadenau = "nombre=" + nombre + "&correo=" + correo + "&rol=" + rol + "&usuario=" + usuario + "&clave=" + clave + "&telefono=" + telefono + "&cedulan=" + cedulan;
                $.ajax({
                    type: "POST",
                    url: "usuarios/editarusuario.php",
                    data: cadenau,
                    success: function(r) {
                        if (r == 1) {
                            // console.log(r);
                            // debugger;


                        } else {
                            // console.log(r);
                            // debugger;
                        }
                    }
                });

            }
            iddoc = cedulan;
            fotoperfil = $('#fotoperfil').val();
            filesize = $('#fotoperfil')[0].files[0].size;
            if (filesize > 55000000000000) {
                a = 1;
                alertify.alert('ATENCION!!', 'El soporte es demasiado pesado. ', function() {
                    alertify.success('Ok');
                });
            }
            if (a == 0) {
                soporte = $('#fotoperfil').prop('files')[0];
                datosForm = new FormData;
                datosForm.append("soporte", soporte);
                ruta = 'usuarios/subirfotodeperfil.php?iddoc=' + iddoc;
                $.ajax({
                    type: "POST",
                    url: ruta,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: datosForm,
                    success: function(r) {
                        if (r == 1) {
                            console.log(r);
                            debugger;
                            setTimeout(function() {
                                //window.location.reload();
                            }, 1500);
                            alertify.success('Operación exitosa. ');
                        } else {
                            console.log(r);
                            debugger;
                        }
                    }
                });

            }

        });
    });
</script>