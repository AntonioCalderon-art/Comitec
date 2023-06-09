<?php
session_start();

if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']) {
    $nombre       =  $_SESSION['nombre'];
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
    <script src="assets/js/eventos_agendar_cita.js"></script>
</head>

<body>
    <input type="hidden" id="idNumeroControl" value="<?php echo $NoControl ?>">
    <nav class="navbar backgroundNav" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="principal_alumno.php"><img src="assets/img/logo.png" width="50" height="50"> ComiTec</a>
            <div>
                <a class="lblUsuario"><?php echo $nombre ?></a>
                <button id="btnCerrarSesion" type="button" class="btn btn-danger">Cerrar sesión</button>
            </div>

        </div>
    </nav>

    <div class="container text-center">
        <div class="col loginCentro">
            
            <div style="text-align: left; padding-top: 30px">
                <button id="btnRegresarAlumno" style="text-align: left;" type="button" class="btn btn-danger">Regresar</button>
            </div>
            

            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="margin: 20px; width: 800px; ">
                <div class="card-body ">
                    <h5 class="card-title">Solicitud para comité</h5>
                    <form>
                        <div class="row g-3">
                            <div class="col-auto" style="padding-top: 20px;">
                                <input disabled type="text" class="form-control" placeholder="Número de control" id="iNumeroControl">
                            </div>
                            <div class="col-auto" style="padding-top: 20px;">
                                <input disabled type="text" style="padding-right: 317px;" class="form-control pr-3" placeholder="Nombre completo" id="iNombreCompleto">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group" style="padding-top: 20px;">
                                <input disabled type="text" class="form-control" placeholder="Correo institucional" id="iCorreoInstitucional">
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-auto" style="padding-top: 20px;">
                                <input disabled type="text" style="padding-right: 200px;" class="form-control pr-3" placeholder="Carrera" id="iCarrera">
                            </div>
                            <div class="col-auto" style="padding-top: 20px; text-align: left;">
                                <input disabled type="text" style="width: 50%;" maxlength="2" class="form-control pr-3" placeholder="Semestre" id="iSemestre">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9" style="padding-top: 20px;">
                                <input type="text" class="form-control pr-3" placeholder="Motivo de solicitud personal" id="iMotivoSolicitudPersonal">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9" style="padding-top: 20px;">
                                <input type="text" class="form-control pr-3" placeholder="Motivo de solicitud academico" id="iMotivoSolicitudAcademico">
                            </div>
                        </div>

                        <div id="espacioModal"></div>
                        
                        <div class="row g-2">
                            <div class="col-auto" style="padding-top: 20px; text-align: left;">
                                <label style="color: #5d5a63;">Adjuntar archivos físicos</label>
                                <input class="form-control" type="file" id="iArchivo">
                            </div>
                        </div>
                    </form>

                    <div style="margin: 30px;">
                        <button id="btnEnviarSolicitud" type="button" class="btn btn-primary" style="padding-left: 250px; padding-right: 250px;">Enviar solicitud</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
