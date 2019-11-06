<?php

require_once "conexion.php";

class GestorReelModel{

    public function mostrarReelModel($tabla){
        
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("SELECT id, link FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
    }   

    public function editarReelModel($datosModel, $tabla){
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("UPDATE $tabla SET link=:link WHERE id=:id");
  
        $stmt -> bindParam(":id", $datosModel["idReel"], PDO::PARAM_INT);
        $stmt -> bindParam(":link", $datosModel["linkReel"], PDO::PARAM_STR);
        
  
        if($stmt->execute()){
          return "ok";
        }
        else{
          return "error";
        }
        $stmt->close();
    }

}