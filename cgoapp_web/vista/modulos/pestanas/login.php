<?php
if (isset($_SESSION["usuario"])) {
    header("Location:inicio");
}
?>
<div id="vista_login">
    <br>
    <div class="col-md-4" style="display: block;margin: auto;">
        <form class="login" id="FormLogin" method="POST" autocomplete="off">
            <img src="./vista/presentacion/img/img_login.png">
            <p class="mt-3">Ingresa tus datos para iniciar sesión</p>
            <div class="col-auto">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                    </div>
                    <input value="cristian.penaranda" type="text" name="ingresarUsuario" class="form-control" placeholder="Usuario" id="ingresarUsuario" required maxlength="20">
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-lock2-fill"></i></span>
                    </div>
                    <input value="*C1090491573" type="password" name="ingresarClave" maxlength="20" class="form-control" placeholder="Contraseña" id="ingresarClave" required>
                </div>

                <div class="input-group mb-3">
                    <button type="submit" class="btn boton_principal mt-3"><i class="bi bi-box-arrow-in-right"></i> Ingresar</button>
                </div>
            </div>
            <br>
        </form>


    </div>
    <br>
</div>
