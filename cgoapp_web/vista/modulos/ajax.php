<?php
require_once '../../modelo/sql/consultas.php';
require_once '../../modelo/sql/serviciosBD.php';

require_once '../../controlador/controlador.php';

require_once '../../modelo/negocio.php';
require_once '../../modelo/conexion.php';

class Ajax {

    private $controlador;

    public function __construct() {
        $this->controlador = new controlador();
    }

    ///////////////////*****SERVICIOS APP MOVIL******///////////////////
    //SERVICIO PARA REGISTRAR TERMINAL 
    public function servicioRegistroTerminalAjax($terminal, $regional){
        $resp = "";
        try {
            $consulta = $this->controlador->servicioConsultaTerminalControlador($terminal);
            if (!$consulta) {
                $registro = $this->controlador->servicioRegistroTerminalControlador($terminal, $regional);
                if($registro){
                    echo json_encode(array("servicioRegistroTerminal" => "true"));
                } else {
                    echo json_encode(array("servicioRegistroTerminal" => "No se pudo registrar"));
                }                
            } else {
                echo json_encode(array("servicioRegistroTerminal" => $resp));
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
    }
    //METODO PARA LOGUEARSE EN LA APLICACION
    public function LoguearUsuarioAjax($usuario, $clave) {
        $exito = false;
        try {
            $exito = $this->controlador->buscarAdministradorControlador($usuario, $clave);
            if ($exito) {
                session_start();
                $usuario = $usuario;
                $_SESSION["usuario"] = serialize($usuario);
                echo json_encode(array("exito" => true));
            } else {
                echo json_encode(array("exito" => false, "error" => "Revise su Usuario y contraseña"));
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
    }

    //ENCRIPTAR UNA CONTRASEÑA
    private static function encriptar($string) {
        $output = FALSE;
        $key = hash('sha256', '$CRISTIAN@2018sv');
        $iv = substr(hash('sha256', '1151190'), 0, 16);
        $output = openssl_encrypt($string, 'AES-256-CBC', $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    //DESENCRIPTAR UNA CONTRASEÑA
    private static function desencriptar($string) {
        $key = hash('sha256', '$CRISTIAN@2018sv');
        $iv = substr(hash('sha256', '1151190'), 0, 16);
        $output = openssl_decrypt(base64_decode($string), 'AES-256-CBC', $key, 0, $iv);
        return $output;
    }

    public function prueba($prueba){
        $response = array(); 
        $response['error'] = false; 
        $response['message'] = $prueba;
        echo json_encode($response);
    }
    
}

//   SE CREA UNA INSTANCIA DE LA CALSE AJAX PARA PODER ACCEDER A LOS METODOS QUE CONTIENE
$ajax = new Ajax();

//   SI ESTA VARIABLE ES DIFERENTE DE NULL SE DEBE INGRESAR EL USUARIO
$loguear = isset($_POST["ingresarUsuario"], $_POST["ingresarClave"]);
$servicioRegistroTerminal = isset($_POST["terminal"], $_POST["regional"]);
$prueba = isset($_POST["prueba"]);

if ($loguear) {
    $ajax->LoguearUsuarioAjax($_POST["ingresarUsuario"], $_POST["ingresarClave"]);
}else if ($servicioRegistroTerminal) {
    $ajax->servicioRegistroTerminalAjax($_POST["terminal"], $_POST["regional"]);
}else if ($prueba) {
    $ajax->prueba($_POST["prueba"]);
}