<!DOCTYPE html>
<html lang="es">
<head>
    <title>CGOAPP WEB</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="./vista/presentacion/img/icono.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">    
    
</head>
<body>
    <div id="contenedor_carga">
	<img id="logo_carga" src="./vista/presentacion/img/favicon.png">
	<div id="carga"></div>
    </div>
    <?php
	session_start();
	include_once 'modulos/header.php';
	$controlador = new controlador();
	$controlador->generarVista();
    ?>

    <!--ARCHIVOS PERSONALES-->
    <link rel="stylesheet" href="vista/presentacion/css/estilos.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="vista/presentacion/js/jquery.min.js"></script>
    <script type="text/javascript" src="vista/presentacion/js/jquery-3.3.1.min.js"></script>
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>    
    <script type="text/javascript" src="vista/presentacion/js/jquery.validate.js"></script>
    <script type="text/javascript" src="vista/presentacion/js/generales.js"></script>
    <script type="text/javascript" src="vista/presentacion/js/alertas.js"></script>
    <script type="text/javascript" src="vista/presentacion/js/login.js"></script>
    <script type="text/javascript" src="vista/presentacion/js/administrador.js"></script>
</body>
</html>