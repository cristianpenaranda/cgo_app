<?php
if (isset($_SESSION["usuario"])) {
    $user = unserialize($_SESSION['usuario']);
} else {
    header("Location:errorpage");
}
?>

<div id="vista_inicio">
    <h1>Inicio</h1>   
</div>