$(document).ready(function () {
    recuperarInformacionSolicitud();
    $("#btnRegresarAlumnoPrincipal").on("click", regresarAlumnoPrincipal);
    $("#btnEnviarSolicitud").on("click", prepararSolicitudEnviar);    
});

function regresarAlumnoPrincipal() {
    location.href = 'principal_alumno.php';
}

function recuperarInformacionSolicitud() {
    var numeroControl = $('#idNumeroControl').val();
    llenaInfoSolicitud(numeroControl)
}

function prepararSolicitudEnviar() {
    enviarSolicitud();
}

function enviarSolicitud() {

    var datos = {
        opcion: '8',
        numeroControl: $('#iNumeroControl').val(),
        movitoSolicitudPersonal: $('#iMotivoSolicitudPersonal').val(),
        movitoSolicitudAcademico: $('#iMotivoSolicitudAcademico').val(),
        estatus: '1'
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {

            if (response['mensaje']) {
                alert("Solicitud enviada correctamente");
                location.href = 'principal_alumno.php';
            } else {
                alert("No se pudo enviar la solicitud, intente más tarde");
            }

        },

        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });

}

function llenaInfoSolicitud(numeroControl) {

    var datos = {
        opcion: '7',
        numeroControl: numeroControl
    };

    $.ajax({
        url: 'assets/php/funciones.php',
        type: 'GET',
        data: datos, // Parámetros a enviar al archivo PHP
        dataType: 'json',

        success: function (response) {

            $("#iNumeroControl").val(response['numeroControl']);
            $("#iNombreCompleto").val(response['nombre']);
            $("#iCorreoInstitucional").val(response['CorreoAlumno']);
            $("#iCarrera").val(response['nombreCarrera']);
            $("#iSemestre").val(response['semestre']);

        },

        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });

}
