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
            <div>
                <a class="lblUsuario"><?php echo $nombre ?></a>
                <button type="button" class="btn btn-danger">Cerrar sesión</button>
            </div>

        </div>
    </nav>

    <div class="container text-center">
        <div class="row" style="margin: 50px;">
            <div class="col">
                <img src="assets/img/solicitud_comite.png" width="75%">
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-body">
                        <h5 class="card-title">Datos de solicitud</h5>
                        <div style="text-align: left; padding-left: 50px; padding-top: 30px;">
                            <label style="text-align: left;"><b>Alumno: </b>José Antonio Calderón Gómez</label>
                            <label style="text-align: left;"><b>Motivo: </b>Excentar todas las materias.</label>
                            <label style="text-align: left;"><b>Fecha de solicitud: </b>09/05/2023</label>
                        </div>

                        <div style="margin: 30px;">
                            <button type="button" class="btn btn-success">Autorizar</button>
                            <button type="button" class="btn btn-danger">Rechazar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>