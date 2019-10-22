<?php

require_once "backend/models/conexion.php";

class InfoModel{

    public function seleccionarInfoModel($tabla){
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("SELECT * FROM $tabla ORDER BY orden ASC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
    }

}