<?php

class serviciosBD{

    //SERVICIO PARA CONSULTAR TERMINAL 
    static function servicioConsultaTerminalCONSULTA($terminal){
        $conexion = Conexion::crearConexion();
        $resp = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("SELECT * FROM terminales WHERE terminal=?");
            $stm->bindParam(1, $terminal, PDO::PARAM_STR);
            $stm->execute();
            $row = $stm->rowCount();
            if ($row>0) {
                $resp=true;
            }
        } catch (Exception $ex) {
            throw new Exception("Error al buscar el terminal en bd");
        }
        return $resp;
    }

    //SERVICIO PARA REGISTRAR TERMINAL 
    static function servicioRegistroTerminalCONSULTA($terminal,$regional){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO  terminales(terminal,regional) VALUES (?,?)");
            $stm->bindParam(1, $terminal, PDO::PARAM_STR);
            $stm->bindParam(2, $regional, PDO::PARAM_STR);
            $resp = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar el terminal en bd");
        }
        return $resp;
    }
}