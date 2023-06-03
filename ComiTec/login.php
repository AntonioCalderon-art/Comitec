<?php

session_start();

if (isset($_SESSION['sesion_iniciada'])) {
	header('Location: ./index.php');
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ComiTec</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/estilos.css">
    <script src="assets/js/usuarioLogueado.js"></script>
    <script src="assets/js/eventos.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
</head>

<body class="backgroundNav">
    <nav class="navbar backgroundNav" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.png" width="50" height="50"> ComiTec</a>
            <div>
                <img src="assets/img/logo_tec_culiacan.png" width="50" height="50">
            </div>

        </div>
    </nav>

    <div class="container text-center">
        <div class="col loginCentro">
            <div class="card sizeLogin shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-body ">
                    <h5 class="card-title">Iniciar sesión</h5>

                    <div style="text-align: left; padding-top: 20px;">
                        <input id="txtCorreo" type="email" class="form-control" placeholder="Correo electronico">
                    </div>
                    <div style="text-align: left; padding-top: 10px;">
                        <input  id="txtContrasenia" type="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <div style="text-align: left; padding-top: 10px; width: 140px;">
                        <select id="cboPerfil" class="form-select">
                            <option value="1">Alumno</option>
                            <option value="2">Administrador</option>
                          </select>
                    </div>

                    <div style="margin: 30px;">
                        <button id="btnIngresar" type="button" class="btn btn-secondary" style="padding-left: 100px; padding-right: 100px;">Ingresar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
