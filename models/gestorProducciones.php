<?php

require_once "backend/models/conexion.php";

class ProduccionesModel{

    public function seleccionarProduccionesModel($tabla){

        $conn = Conexion::conectar();
            $stmt = $conn->prepare("SELECT id, titulo, ruta, link, color FROM $tabla ORDER BY id ASC");
    
            $stmt->execute();
    
            return $stmt->fetchAll();
    
            $stmt->close();

    }
}