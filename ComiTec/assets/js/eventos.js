$(document).ready(function () {
    $("#CardRevisados").on("click", poneLblRevisados);
    $("#CardRegresados").on("click", poneLblRegresados);
    $("#CardSinRevisar").on("click", poneLblSinRevisar);
    $("#CardPorFirmar").on("click", poneLblPorFirmar);
    $("#btnIngresar").on("click", iniciarSesion);
    $("#btnCerrarSesion").on("click", cerrarSesion);
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

function iniciarSesion() {
    location.href ='index.html';
}

function cerrarSesion() {
    location.href ='login.html';
}
