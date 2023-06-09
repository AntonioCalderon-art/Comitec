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
    <script src="assets/js/eventos_principall_alumno.js"></script>
</head>

<body>
    <input type="hidden" id="txtNoControl" value="<?php echo $NoControl ?>">
    <nav class="navbar backgroundNav" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="principal_alumno.html"><img src="assets/img/logo.png" width="50" height="50"> ComiTec</a>
            <div>
                <a class="lblUsuario" id="lblUsuarioLogueado"><?php echo $nombre ?></a>
                <button id="btnCerrarSesion" type="button" class="btn btn-danger">Cerrar sesión</button>
            </div>

        </div>
    </nav>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div id="CardAutorizados" class="sizeCard card cifras text-bg-success">
                    <div class="card-body">
                        <h5 class="card-title">AUTORIZADOS</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div id="CardPendientes" class="sizeCard card cifras text-bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">PENDIENTES</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div id="CardRechazados" class="sizeCard card cifras text-bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">RECHAZADOS</h5>
                    </div>
                </div>
            </div>
        </div>

        <div style="padding-left: 3%;">
            <div class="escalaNuevaSolicitud" id="divNuevaSolicitud">
                <img src="assets/img/solicitud_nueva.png" width="70px">
                <label style="text-align: center;">Nueva solicitud</label>
            </div>
        </div>

        <div style="padding-top: 20px;">
            <p id="lblTipoSolicitud" style="text-align: left;" class="fs-2">Historial de solicitudes</p>
        </div>

        <div class="container text-center">
            <div id="historialSolicitudes"></div>
            <!--<div class="row">
                <div class="col">
                    <div class="card paddingCard cifras">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_documento.png" width="30px><h6 class=" card-title">Solicitud de
                            Antonio</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card paddingCard cifras">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_documento.png" width="30px><h6 class=" card-title">Solicitud de
                            Jaime</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card paddingCard cifras">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_documento.png" width="30px><h6 class=" card-title">Solicitud de
                            Paloma</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card paddingCard cifras">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_documento.png" width="30px><h6 class=" card-title">Solicitud de
                            José</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card paddingCard cifras">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_documento.png" width="30px><h6 class=" card-title">Prueba</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card paddingCard cifras">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_documento.png" width="30px><h6 class=" card-title">Prueba</h6>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>

</body>

</html>
