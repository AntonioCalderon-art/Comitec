$(document).ready(function () {
    $("#lblUsuarioLogueado").html(usuarioLogueado);
    $("#btnCerrarSesion").on("click", cerrarSesion);
    $("#CardAutorizados").on("click", poneLblAutorizados);
    $("#CardPendientes").on("click", poneLblPendientes);
    $("#CardRechazados").on("click", poneLblRechazados);
    $("#divNuevaSolicitud").on("click", redireccionNuevaSolicitud);
    $("#btnEnviarSolicitud").on("click", enviarSolicitud);
    $("#btnRegresarAlumno").on("click", regresarAlumnoPrincipal);
    $("#btnRegresarAlumno").on("click", consultaSolicitudesAlumno(19170736));
});

function regresarAlumnoPrincipal() {
    location.href = 'principal_alumno.html';
}

function poneLblAutorizados() {
    $("#lblTipoSolicitud").html("Solicitudes autorizadas");
}

function poneLblPendientes() {
    $("#lblTipoSolicitud").html("Solicitudes pendientes");
}

function poneLblRechazados() {
    $("#lblTipoSolicitud").html("Solicitudes rechazadas");
}

function redireccionNuevaSolicitud() {
    location.href = 'agendar_cita.html';
}

function cerrarSesion() {
    location.href = 'login.html';
}

function consultaSolicitudesAlumno(matricula) {
    var datos = {
        opcion: '2',
        matricula: matricula
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {
            // Maneja la respuesta del servidor aquí
           // response['motivoAcademico']

            var motivoSolicitud = JSON.parse(response['motivoAcademico']);
        
            // Recorrer el arreglo en JavaScript
            for (var i = 0; i < motivoSolicitud.length; i++) {
            <div class="row">
                <div class="col">
                    <div class="card paddingCard cifras">
                        <div class="card-body leftCard">
                            <img src="assets/img/icono_documento.png" width="30px">div></img>
                        </div>
                    </div>
                </div>
            </div>
            }
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}