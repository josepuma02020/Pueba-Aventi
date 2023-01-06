<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav/desktop.css">
    <script src="./css/bootstrap/js/bootstrap.js"></script>
    <?php

    if (isset($_SESSION['usuario'])) {
        $sesionactiva = 'si';
    } else {
        $sesionactiva = 'no';
    }

    ?>
</head>

<body>
    <header>

    </header>
    <main>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a style="color: blue;" class="navbar-brand" href="../Tesoreria/home.php">Aventi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ">


                        <li class="nav-item">
                            <?php
                            if ($sesionactiva == 'si') {
                                if ($_SESSION['rol'] != 3) {
                            ?>
                        <li class="nav-item">
                            <a id="registrarusuario" class="nav-link" href="./productos.php">Productos</a>
                        </li>
                    <?php
                                }
                                if ($_SESSION['rol'] == 1) {
                    ?>
                        <li class="nav-item">
                            <a id="registrarusuario" class="nav-link" href="./usuarios.php">Usuarios</a>
                        </li>
                    <?php
                                }
                    ?>
                    <a class="nav-link" href="usuarios/cerrarsesion.php">Salir</a>
                <?php
                            }
                ?>

                </li>
                    </ul>
                </div>
            </div>
            <div style="width:7%" class="end-nav">
                <?php
                if ($sesionactiva == 'no') {
                ?>
                    <button id="iniciarsesion" style="border-color:black;padding:0.5rem;text-align:center" type="button" class="btn  nav-link" data-toggle="modal" data-target="#login">Iniciar Sesion</button>
                <?php
                } else {
                ?>
                    <a href="./perfil.php?cc=<?php echo   $_SESSION['cedula']; ?>"><?php echo   $_SESSION['nombre']; ?>
                    </a>
                <?php
                }
                ?>
                <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="./usuarios/login.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Inicio de sesión</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row formulario">
                                        <div class="form-group grande">
                                            <label for="usuario">Usuario:</label>
                                            <input style="text-align:center" class=" form-control " id="usuario" name="usuario" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row formulario">
                                        <div class="form-group grande">
                                            <label for="clave">Clave:</label>
                                            <input style="text-align:center" class=" form-control " id="clave" name="clave" type="password">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer footer-login">
                                    <div>
                                        <a href="">
                                            <p>Recuperar contraseña</p>
                                        </a>
                                    </div>
                                    <div>
                                        <button type="button " class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button submit" id="iniciarsesion" class="btn btn-primary">Iniciar sesión</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </nav>
    </main>
    <footer></footer>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

    });
</script>