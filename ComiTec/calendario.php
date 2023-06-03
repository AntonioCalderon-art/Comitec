<?php
session_start();

if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']) {
    $nombre =  $_SESSION['nombre'];
    $NoControl    =  $_SESSION['NoControl'];
} else {
    session_destroy();
    header('Location:  ./index.php');
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
    <script src="assets/js/eventos.js"></script>
</head>

<body>
    <nav class="navbar backgroundNav" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.png" width="50" height="50"> ComiTec</a>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Perfil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Solicitudes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Nueva solicitud</a>
                  </li>
                </ul>
                <div style="padding-top: 20px;">
                    <button id="btnCerrarSesion" type="button" class="btn btn-danger">Cerrar sesión</button>
                </div>
              </div>
            <div>
                <a class="lblUsuario"><?php echo $nombre ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
            </div>

        </div>
    </nav>

    <div class="container text-center">
        <div class="row">
            <div class="col-5" style="padding-top: 20px; text-align: left;">
                <p>Empleado > Calendario</p>
            </div>
            <div class="col" style="padding-top: 20px;">
                <p id="lblTipoPeticion" style="text-align: left;" class="fs-2">Calendario</p>
            </div>
        </div>

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="card paddingCard">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_reunion.png" width="30px><h6 class=" card-title"> 09:00 -
                            Revisión comité</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card paddingCard">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_reunion.png" width="30px><h6 class=" card-title"> 12:00 - Toma de
                            decisiones</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card paddingCard">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_reunion.png" width="30px><h6 class=" card-title"> 13:00 - Replica
                            de solicitudes</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card paddingCard">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_reunion.png" width="30px><h6 class=" card-title"> 14:00 - Hora de
                            comida</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>