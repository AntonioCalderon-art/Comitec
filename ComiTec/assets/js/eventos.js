$(document).ready(function () {
    $("#CardRevisados").on("click", poneLblRevisados);
    $("#CardRegresados").on("click", poneLblRegresados);
    $("#CardSinRevisar").on("click", poneLblSinRevisar);
    $("#CardPorFirmar").on("click", poneLblPorFirmar);
    $("#btnIngresar").on("click", iniciarSesion);
    $("#btnCerrarSesion").on("click", cerrarSesion);
    $("#CardAutorizados").on("click", poneLblAutorizados);
    $("#CardPendientes").on("click", poneLblPendientes);
    $("#CardRechazados").on("click", poneLblRechazados);
    $("#divNuevaSolicitud").on("click", redireccionNuevaSolicitud);
    $("#btnEnviarSolicitud").on("click", enviarSolicitud);
});

function poneLblRevisados() {
    $("#lblTipoPeticion").html("Solicitudes revisadas");
}

function poneLblRegresados() {
    $("#lblTipoPeticion").html("Solicitudes regresadas");
}

function poneLblSinRevisar() {
    $("#lblTipoPeticion").html("Solicitudes sin revisar");
}

function poneLblPorFirmar() {
    $("#lblTipoPeticion").html("Solicitudes por firmar");
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


function iniciarSesion() {
    var perfil = $("#cboPerfil").val();

    if (perfil == "1") {
        location.href = 'principal_alumno.html';
    } else if (perfil == "2") {
        location.href = 'index.html';
    }else{
        alert("Elige un perfil de usuario válido");
    }
}

function redireccionNuevaSolicitud() {
    location.href = 'agendar_cita.html';
}

function cerrarSesion() {
    location.href = 'login.html';
}

function enviarSolicitud() {
    alert("Solicitud enviada con exito");
    location.href = 'principal_alumno.html';
}
