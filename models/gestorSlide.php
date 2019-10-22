<?php

require_once "backend/models/conexion.php";

class SlideModel{

    public function seleccionarSlideModel($tabla){

        $conn = Conexion::conectar();
        $stmt = $conn->prepare("SELECT ruta, orden FROM $tabla ORDER BY orden ASC");
        
        $stmt -> execute();

        return $stmt->fetchAll();

        $stmt -> close();

    }
 
    public function numeroDeSlidesModel($tabla){

        $conn = Conexion::conectar();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM $tabla");
        
        $stmt -> execute();
            
        return $stmt -> fetchColumn();

        $stmt -> close();

    }

}