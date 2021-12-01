<?php

//incluir archivos externos
require_once './controlador/controlador.php';

require_once './modelo/negocio.php';
require_once './modelo/conexion.php';

require_once './modelo/sql/consultas.php';
require_once './modelo/sql/serviciosBD.php';

//activar almacenamiento en el bufer de la página
ob_start();
$controlador = new controlador();
$controlador->generarPlantilla();