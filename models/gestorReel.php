<?php

require_once "backend/models/conexion.php";

class ReelModel{

    public function seleccionarReelModel($tabla){
        
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("SELECT id, link FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
    }   
}