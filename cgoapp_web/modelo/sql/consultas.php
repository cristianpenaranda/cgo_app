<?php

class consultas{
    
    //BUSCAR EL ADMINISTRADOR PARA LOGUEAR
    static function buscarAdministradorCONSULTA($usuario, $clave){
        $conexion = Conexion::crearConexion();
        $persona = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select usuario from administradores where usuario=? and clave=?");
            $stm->bindParam(1, $usuario, PDO::PARAM_STR);
            $stm->bindParam(2, $clave, PDO::PARAM_STR);
            $stm->execute();
            $row = $stm->rowCount();
            if ($row>0) {
                $persona=true;
            }
        } catch (Exception $ex) {
            throw new Exception("Error al buscar el administrador en bd");
        }
        return $persona;
    }
}