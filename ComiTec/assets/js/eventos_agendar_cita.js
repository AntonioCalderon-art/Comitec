$(document).ready(function () {
    $("#btnRegresarAlumnoPrincipal").on("click", regresarAlumnoPrincipal);
});

function regresarAlumnoPrincipal() {
    location.href = 'principal_alumno.php';
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
            $("#txtNumControl").val(+response['numeroControl']);
            $("#txtNombreCompleto").val(response['nombre']);
            $("#txtCorreo").val(response['CorreoAlumno']);
            $("#txtCarrera").val(response['nombreCarrera']);
            $("#txtSemestre").val("Sem: "+response['semestre']);
            $("#txtMotivo").val("Motivo: "+response['motivoAcademico']);
            $("#txtEstatus").val("Estatus: "+response['nombreStatus']);
        },

        error: function (xhr, status, error) {
            // Maneja los errores aquí
            console.log(xhr.responseText);
        }
    });
}