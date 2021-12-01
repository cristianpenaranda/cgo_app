<?php

class negocio{

	//GENERA LA PLANTILLA
	public function generarPlantilla(){
		include 'vista/plantilla.php';
	}

	//GENERA ENLACE DE LA BARRA DE NAVEGACION
	public function generarEnlace($enlace){
        if($this->validarPestañas($enlace)){
           return "vista/modulos/pestanas/".$enlace.".php";
       }else{
           return "vista/modulos/pestanas/errorpage.php";
       }
   } 

	//OBTIENE A PESTAÑA DEL MENU
    private function validarPestañas($pestaña){
        $exito=false;
        $pestañas=array("login","inicio","errorpage","salir");
        if(in_array($pestaña, $pestañas)){
            $exito=true;
        }
        return $exito;
    }
  
    //BUSCA ADMINISTRADOR PARA LOGUEAR
    public function buscarAdministradorNegocio($usuario, $clave){
        return consultas::buscarAdministradorCONSULTA($usuario, $clave);
    }
    //SERVICIO PARA REGISTRAR TERMINAL 
    public function servicioRegistroTerminalNegocio($terminal, $regional){
        return serviciosBD::servicioRegistroTerminalCONSULTA($terminal, $regional);
    }
    //SERVICIO PARA CONSULTAR TERMINAL 
    public function servicioConsultarTerminalNegocio($terminal){
        return serviciosBD::servicioConsultarTerminalCONSULTA($terminal);
    }
}