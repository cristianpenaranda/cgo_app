<?php

class controlador{
    private $negocio;
	
    public function __construct(){
	$this->negocio = new negocio();
    }

    public function generarPlantilla(){
	return negocio::generarPlantilla();
    }

    //CARGA ARCHIVO DEL ENLACE
    public function generarVista(){
	$enlace = filter_input(INPUT_GET, "ubicacion");
	if($enlace){
        	$enlace = $this->negocio->generarEnlace($enlace);
	}else {
		$enlace = $this->negocio->generarEnlace("login");
	}
      	include_once $enlace;
    }
    
    //BUSCA EL ADMINISTRADOR PARA LOGUEAR
    public function buscarAdministradorControlador($usuario, $clave){
        return $this->negocio->buscarAdministradorNegocio($usuario, $clave);
    }
    //SERVICIO PARA REGISTRAR TERMINAL 
    public function servicioRegistroTerminalControlador($terminal, $regional){
        return $this->negocio->servicioRegistroTerminalNegocio($terminal, $regional);
    } 
    //SERVICIO PARA CONSULTAR TERMINAL 
    public function servicioConsultarTerminalControlador($terminal){
        return $this->negocio->servicioConsultarTerminalNegocio($terminal);
    } 
}