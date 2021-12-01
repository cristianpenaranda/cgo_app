$(document).ready(function () {
  if ($("#vista_login").is(":visible")) {
    $("#footer").hide();
    $("#header").hide();

    //INICIO DE SESION
    $("#FormLogin").validate({
      rules: {
        ingresarUsuario: { required: true },
        ingresarClave: { required: true },
      },
      messages: {
        ingresarUsuario: {
          required: "<span style='color:red'> ✘ </span>"
        },
        ingresarClave: "<span style='color:red'> ✘ </span>",
      },
      submitHandler: function (form) {
        var datos = {
          ingresarUsuario: $("#ingresarUsuario").val(),
          ingresarClave: $("#ingresarClave").val(),
        };
        $.ajax({
          url: "vista/modulos/ajax.php",
          method: "post",
          data: datos,
          dataType: "json",
          beforeSend: function () {
            respuestaInfoEspera("Espera un momento por favor.");
          },
          success: function (respuesta) {
            if (respuesta["exito"]) {
              ingresoExitoso("Bienvenido a CGOAPP WEB","");
            } else {
              respuestaError(
                "Error al Iniciar",
                "Revisa el usuario y la contraseña"
              );
            }
          },
          error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
          },
        });
      },
    });

    if ($("#vista_inicio").is(":visible")) {
      $("#footer").show();
      $("#header").show();
    }
  }

  if ($("#vista_error").is(":visible")) {
    $("#footer").hide();
    $("#header").hide();
  }
});
