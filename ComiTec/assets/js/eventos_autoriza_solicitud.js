$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);

    // Obtener un parámetro específico
    const idSolicitud = urlParams.get('idSolicitud');
    console.log(idSolicitud); // Imprime "valor1"

    llenaInfoSolicitud(idSolicitud);
    $("#btnRegresarAdminPrincipal").on("click", regresarAdminPrincipal);
    $("#btnAutorizar").on("click", autorizarSolicitud);
    $("#btnRechazar").on("click", rechazarSolicitud);
});

function autorizarSolicitud(){
    const urlParams = new URLSearchParams(window.location.search);
    const idSolicitud = urlParams.get('idSolicitud');

    var datos = {
        opcion: '14',
        idSolicitud: idSolicitud,
        estatus: '3'
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {

            if (response['mensaje']) {
                alert("Solicitud autorizada");
                location.href = 'index.php';
            } else {
                alert("No se pudo enviar la solicitud, intente más tarde");
            }

        },

        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

function rechazarSolicitud(){
    const urlParams = new URLSearchParams(window.location.search);
    const idSolicitud = urlParams.get('idSolicitud');

    var datos = {
        opcion: '14',
        idSolicitud: idSolicitud,
        estatus: '2'
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {

            if (response['mensaje']) {
                alert("Solicitud rechazada");
                location.href = 'index.php';
            } else {
                alert("No se pudo enviar la solicitud, intente más tarde");
            }

        },

        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

function regresarAdminPrincipal() {
    location.href = 'index.php';
}

function llenaInfoSolicitud(idSolicitud) {
    var datos = {
        opcion: '6',
        idSolicitud: idSolicitud
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {
            //var motivoSolicitud = response['motivoAcademico'];
            console.log(response);
            $("#txtNumControl").val(response['numeroControl']);
            $("#txtNombreCompleto").val(response['nombre']);
            $("#txtCorreo").val(response['CorreoAlumno']);
            $("#txtCarrera").val(response['nombreCarrera']);
            $("#txtSemestre").val(response['semestre']);
            $("#txtMotivo").val(response['motivoAcademico']);
            $("#txtEstatus").val(response['nombreStatus']);

            if(response['nombreStatus'] == 'Aceptada' || response['nombreStatus'] == 'Rechazada'){
                $('#btnAutorizar').prop('disabled', true);
                $('#btnRechazar').prop('disabled', true);
            }
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}