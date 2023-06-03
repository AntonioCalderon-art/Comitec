$(document).ready(function () {
    var noControl = $('#txtNoControl').val();
    var nombre = $('#lblUsuarioLogueado').text();
    consultaSolicitudesAdmin(noControl);
    $("#lblUsuarioLogueado").html(nombre);
    $("#btnCerrarSesion").on("click", cerrarSesion);
    $("#CardAutorizados").on("click", poneLblAutorizados);
    $("#CardPendientes").on("click", poneLblPendientes);
    $("#CardRechazados").on("click", poneLblRechazados);
    $("#divNuevaSolicitud").on("click", redireccionNuevaSolicitud);
    $("#btnEnviarSolicitud").on("click", enviarSolicitud);
    $("#btnRegresarAlumno").on("click", regresarAlumnoPrincipal);
});


function pantallaSolicitudAdmin(idSolicitud) {
    location.href = 'autoriza_solicitud_llena.php?idSolicitud=' + idSolicitud;
}

function regresarAlumnoPrincipal() {
    location.href = 'principal_alumno.html';
}

function poneLblAutorizados() {
    $("#lblTipoSolicitud").html("Solicitudes autorizadas");
    consultaSolicitudesAutorizadasAdmin();
}

function poneLblPendientes() {
    $("#lblTipoSolicitud").html("Solicitudes pendientes");
    consultaSolicitudesPendientesAdmin();
}

function poneLblRechazados() {
    $("#lblTipoSolicitud").html("Solicitudes rechazadas");
    consultaSolicitudesRechazadasAdmin();
}


// function cerrarSesion() {
//     location.href = 'login.html';
// }

function cerrarSesion() {
    var datos = {
        opcion: "cerrarSesion",
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {
            console.log(response)
            // Maneja la respuesta del servidor aquí
            if (response['mensaje'] == true) {
                location.href = 'login.php';
            } else {
                alert("Error al cerrar sesión");
            }

        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });

}

function consultaSolicitudesAdmin(matricula) {
    var datos = {
        opcion: '10',
        matricula: matricula
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos,
        dataType: 'json',

        success: function (response) {
            var motivoSolicitud = response['motivoAcademico'];
            var idSolicitud = response['solicitudID'];
            // Recorrer el arreglo en JavaScript
            var historialSolicitudes = "";
            for (var i = 0; i < motivoSolicitud.length; i++) {
                historialSolicitudes = historialSolicitudes + '<div class="row">'
                    + '<div class="col">'
                    + '<div id="cardSolicitudAlumno' + i + '" onclick="pantallaSolicitudAdmin(' + idSolicitud[i] + ')" class="card paddingCard cifras">'
                    + '<div class="card-body leftCard">'
                    + '<img src="assets/img/icono_documento.png" width="30px">' + motivoSolicitud[i]
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }
            $("#historialSolicitudesAdmin").html(historialSolicitudes);
            
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}

function consultaSolicitudesAutorizadasAdmin() {
    var datos = {
        opcion: '12'
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {
            var motivoSolicitud = response['motivoAcademico'];
            var idSolicitud = response['solicitudID'];
            // Recorrer el arreglo en JavaScript
            var historialSolicitudes = "";
            for (var i = 0; i < motivoSolicitud.length; i++) {
                historialSolicitudes = historialSolicitudes + '<div class="row">'
                    + '<div class="col">'
                    + '<div id="cardSolicitudAlumno' + i + '" onclick="pantallaSolicitudAdmin(' + idSolicitud[i] + ')" class="card paddingCard cifras">'
                    + '<div class="card-body leftCard">'
                    + '<img src="assets/img/icono_documento.png" width="30px">' + motivoSolicitud[i]
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }
            $("#historialSolicitudesAdmin").html(historialSolicitudes);
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}

function consultaSolicitudesRechazadasAdmin() {
    var datos = {
        opcion: '13'
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {
            var motivoSolicitud = response['motivoAcademico'];
            var idSolicitud = response['solicitudID'];
            // Recorrer el arreglo en JavaScript
            var historialSolicitudes = "";
            for (var i = 0; i < motivoSolicitud.length; i++) {
                historialSolicitudes = historialSolicitudes + '<div class="row">'
                    + '<div class="col">'
                    + '<div id="cardSolicitudAlumno' + i + '" onclick="pantallaSolicitudAdmin(' + idSolicitud[i] + ')" class="card paddingCard cifras">'
                    + '<div class="card-body leftCard">'
                    + '<img src="assets/img/icono_documento.png" width="30px">' + motivoSolicitud[i]
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }
            $("#historialSolicitudesAdmin").html(historialSolicitudes);
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}

function consultaSolicitudesPendientesAdmin() {
    var datos = {
        opcion: '11'
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {
            var motivoSolicitud = response['motivoAcademico'];
            var idSolicitud = response['solicitudID'];
            // Recorrer el arreglo en JavaScript
            var historialSolicitudes = "";
            for (var i = 0; i < motivoSolicitud.length; i++) {
                historialSolicitudes = historialSolicitudes + '<div class="row">'
                    + '<div class="col">'
                    + '<div id="cardSolicitudAlumno' + i + '" onclick="pantallaSolicitudAdmin(' + idSolicitud[i] + ')" class="card paddingCard cifras">'
                    + '<div class="card-body leftCard">'
                    + '<img src="assets/img/icono_documento.png" width="30px">' + motivoSolicitud[i]
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }
            $("#historialSolicitudesAdmin").html(historialSolicitudes);
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}