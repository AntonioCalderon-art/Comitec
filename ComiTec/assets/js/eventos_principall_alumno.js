$(document).ready(function () {
    //const urlParams = new URLSearchParams(window.location.search);
    //const nombre = urlParams.get('nombre');
    //const numeroControl = urlParams.get('numeroControl');

    var noControl = $('#txtNoControl').val();
    var nombre = $('#lblUsuarioLogueado').text();
    debugger;
    consultaSolicitudesAlumno(noControl);
    $("#lblUsuarioLogueado").html(nombre);
    $("#btnCerrarSesion").on("click", cerrarSesion);
    $("#CardAutorizados").on("click", poneLblAutorizados);
    $("#CardPendientes").on("click", poneLblPendientes);
    $("#CardRechazados").on("click", poneLblRechazados);
    $("#divNuevaSolicitud").on("click", redireccionNuevaSolicitud);
    $("#btnEnviarSolicitud").on("click", enviarSolicitud);
    $("#btnRegresarAlumno").on("click", regresarAlumnoPrincipal);
});

function pantallaSolicitudAlumno(idSolicitud) {
    location.href = 'solicitud_alumno_llena.html?idSolicitud=' + idSolicitud;
}

function regresarAlumnoPrincipal() {
    location.href = 'principal_alumno.html';
}

function poneLblAutorizados() {
    $("#lblTipoSolicitud").html("Solicitudes autorizadas");
    consultaSolicitudesAutorizadasAlumno(19170736);
}

function poneLblPendientes() {
    $("#lblTipoSolicitud").html("Solicitudes pendientes");
    consultaSolicitudesPendientesAlumno(19170736);
}

function poneLblRechazados() {
    $("#lblTipoSolicitud").html("Solicitudes rechazadas");
    consultaSolicitudesRechazadasAlumno(19170736);
}

function redireccionNuevaSolicitud() {
    location.href = 'agendar_cita.html';
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

            var motivoSolicitud = response['motivoAcademico'];
            var idSolicitud = response['solicitudID'];
            console.log(idSolicitud);

            // Recorrer el arreglo en JavaScript
            var historialSolicitudes = "";
            for (var i = 0; i < motivoSolicitud.length; i++) {
                console.log(motivoSolicitud[i]);
                console.log(idSolicitud[i]);

                historialSolicitudes = historialSolicitudes + '<div class="row">'
                    + '<div class="col">'
                    + '<div id="cardSolicitudAlumno' + i + '" onclick="pantallaSolicitudAlumno(' + idSolicitud[i] + ')" class="card paddingCard cifras">'
                    + '<div class="card-body leftCard">'
                    + '<img src="assets/img/icono_documento.png" width="30px">' + motivoSolicitud[i]
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }
            $("#historialSolicitudes").html(historialSolicitudes);
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}

function consultaSolicitudesAutorizadasAlumno(matricula) {
    var datos = {
        opcion: '3',
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

            var motivoSolicitud = response['motivoAcademico'];
            console.log(motivoSolicitud[0]);
            console.log(motivoSolicitud[1]);

            // Recorrer el arreglo en JavaScript
            var historialSolicitudes = "";
            for (var i = 0; i < motivoSolicitud.length; i++) {
                historialSolicitudes = historialSolicitudes + '<div class="row">'
                    + '<div id="cardSolicitudAlumno" class="col">'
                    + '<div  class="card paddingCard cifras">'
                    + '<div class="card-body leftCard">'
                    + '<img src="assets/img/icono_documento.png" width="30px">' + motivoSolicitud[i]
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }
            $("#historialSolicitudes").html(historialSolicitudes);
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}

function consultaSolicitudesRechazadasAlumno(matricula) {
    var datos = {
        opcion: '4',
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

            var motivoSolicitud = response['motivoAcademico'];
            console.log(motivoSolicitud[0]);
            console.log(motivoSolicitud[1]);

            // Recorrer el arreglo en JavaScript
            var historialSolicitudes = "";
            for (var i = 0; i < motivoSolicitud.length; i++) {
                historialSolicitudes = historialSolicitudes + '<div class="row">'
                    + '<div class="col">'
                    + '<div id="cardSolicitudAlumno" class="card paddingCard cifras">'
                    + '<div class="card-body leftCard">'
                    + '<img src="assets/img/icono_documento.png" width="30px">' + motivoSolicitud[i]
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }
            $("#historialSolicitudes").html(historialSolicitudes);
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}

function consultaSolicitudesPendientesAlumno(matricula) {
    var datos = {
        opcion: '5',
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

            var motivoSolicitud = response['motivoAcademico'];
            console.log(motivoSolicitud[0]);
            console.log(motivoSolicitud[1]);

            // Recorrer el arreglo en JavaScript
            var historialSolicitudes = "";
            for (var i = 0; i < motivoSolicitud.length; i++) {
                historialSolicitudes = historialSolicitudes + '<div class="row">'
                    + '<div class="col">'
                    + '<div id="cardSolicitudAlumno" class="card paddingCard cifras">'
                    + '<div class="card-body leftCard">'
                    + '<img src="assets/img/icono_documento.png" width="30px">' + motivoSolicitud[i]
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }
            $("#historialSolicitudes").html(historialSolicitudes);
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}