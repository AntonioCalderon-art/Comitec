<?php
session_start();

if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']) {
    $nombre =  $_SESSION['nombre'];
    $NoControl =  $_SESSION['NoControl'];
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
    <script src="assets/js/eventos_autoriza_solicitud.js"></script>
</head>

<body>
    <input type="hidden" id="txtNoControl" value="<?php echo $NoControl ?>">
    <nav class="navbar backgroundNav" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.png" width="50" height="50"> ComiTec</a>
            <div>
                <a class="lblUsuario" id="txtNombre"><?php echo $nombre ?></a>
                <button type="button" class="btn btn-danger">Cerrar sesión</button>
            </div>

        </div>
    </nav>

    <div class="container text-center">
        <div class="row" style="margin: 50px;">
            <!--<div class="col">
                <label>Vista rápida</label>
                <img src="assets/img/solicitud_comite_estudiante.png" width="300px" style="text-align: left;">
            </div>-->
            <div class="col">

                <div class="container text-center">
                    <div class="col loginCentro"  style="max-height: 500px;">

                    <div style="text-align: left; padding-top: 30px">
                        <button id="btnRegresarAdminPrincipal" style="text-align: left;" type="button" class="btn btn-danger">Regresar</button>
                    </div>

                        <div class="card shadow-lg p-3 bg-body-tertiary rounded" style="width: 600px; ">
                            <div class="card-body ">
                                <h5 class="card-title">Solicitud para comité</h5>
            
                                <form>
                                    <div class="row g-3">
                                        <div class="col-auto" style="padding-top: 20px;">
                                            <input disabled type="text" id="txtNumControl" class="form-control" placeholder="Número de control">
                                        </div>
                                        <div class="col-auto" style="padding-top: 20px;">
                                            <input disabled id="txtNombreCompleto" type="text" style="padding-right: 317px;" class="form-control pr-3"
                                                placeholder="Nombre completo">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group" style="padding-top: 20px;">
                                            <input disabled id="txtCorreo" type="text" class="form-control" placeholder="Correo institucional">
                                        </div>
                                    </div>
            
                                    <div class="row g-2">
                                        <div class="col-auto" style="padding-top: 20px;">
                                            <input disabled type="text" id="txtCarrera" style="padding-right: 200px;" class="form-control pr-3" placeholder="Carrera">
                                        </div>
                                        <div class="col-auto" style="padding-top: 20px; text-align: left;">
                                            <input disabled type="text" id="txtSemestre" style="width: 50%;" maxlength="2" class="form-control pr-3" placeholder="Semestre">
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-auto" style="padding-top: 20px;">
                                            <input disabled id="txtMotivo" type="text" style="padding-right: 317px;" class="form-control pr-3"
                                                placeholder="Motivo de solicitud">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group" style="padding-top: 20px;">
                                        <input disabled type="text" class="form-control" style="height: 40px;" placeholder="Descargar archivos">
                                        <span class="input-group-text" style="height: 40px;">
                                            <button type="button" class="btn btn-light">
                                                <img src="assets/img/icono_descargar.png" width="25px">
                                            </button>
                                        </span>
                                      </div>

                                      <div class="col-auto" style="padding-top: 20px;">
                                        <textarea name="" id="" cols="300" rows="10" style="width: 300px;" placeholder="Comentarios..."></textarea>
                                    </div>
                                </form>
            
                                <div style="margin: 30px;">
                                    <button type="button" id="btnAutorizar" class="btn btn-success">Autorizar</button>
                                    <button type="button" id="btnRechazar" class="btn btn-danger">Rechazar</button>
                                </div>
                                <div class="col-auto" style="padding-top: 20px;">
                                    <input disabled id="txtEstatus" type="text" style="padding-right: 317px;" class="form-control pr-3"
                                        placeholder="Estatus">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>