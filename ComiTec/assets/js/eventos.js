$(document).ready(function () {
    var usuarioLogueado = "";
    var numeroControl = "";
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
    $("#btnRegresarAlumno").on("click", regresarAlumnoPrincipal);
});

function regresarAlumnoPrincipal() {
    location.href = 'principal_alumno.html';
}

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
        consultarUsuario('1');
    } else if (perfil == "2") {
        location.href = 'index.html';
    } else {
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

function consultarUsuario(perfil) {
if(perfil == '1'){
    var user = $("#txtCorreo").val();
    var pass = $("#txtContrasenia").val();
    
        var datos = {
            opcion: '1',
            user: user,
            pass: pass
        };
    
        $.ajax({
            url: 'assets/php/funciones.php',
            type: 'GET',
            data: datos, // Parámetros a enviar al archivo PHP
            dataType: 'json',
    
            success: function (response) {
                // Maneja la respuesta del servidor aquí
                if(response['mensaje'] == true){
                    usuarioLogueado = response['usuarioLogueado'];
                    numeroControl = response['NoControl'];
                    location.href = 'principal_alumno.html?nombre='+usuarioLogueado+'&numeroControl='+numeroControl;
                }else{
                    alert("Usuario o contraseña incorrectos");
                }
                
            },
    
            error: function (xhr, status, error) {
                // Maneja los errores aquí
                console.log(xhr.responseText);
            }
        });
}
}