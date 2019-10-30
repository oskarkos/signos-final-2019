<?php

require_once "conexion.php";

class GestorProduccionesModel{

    public function guardarProduccionesModel($datosModel, $tabla){
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("INSERT INTO $tabla (titulo, link, ruta, color) VALUES (:titulo, :link, :ruta, :color)");

        $stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":link", $datosModel["link"], PDO::PARAM_STR);
        $stmt -> bindParam(":color", $datosModel["color"], PDO::PARAM_STR);    
        
        if($stmt->execute()){

			return "ok";
		}

		else{
			return "error";
		}

		$stmt->close();

    }
    
    public function mostrarProduccionesModel($tabla){
        
            $conn = Conexion::conectar();
            $stmt = $conn->prepare("SELECT id, titulo, ruta, link, color FROM $tabla ORDER BY id ASC");
    
            $stmt->execute();
    
            return $stmt->fetchAll();
    
            $stmt->close();
    }
      public function borrarProduccionesModel($datosModel, $tabla){
          $conn = Conexion::conectar();
          $stmt = $conn->prepare("DELETE FROM $tabla WHERE id=:id");

          $stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);

          if($stmt->execute()){

        return "ok";
      }

      else{
        return "error";
      }

      $stmt->close();
      
    }

    public function editarProduccionesModel($datosModel, $tabla){
      $conn = Conexion::conectar();
      $stmt = $conn->prepare("UPDATE $tabla SET titulo=:titulo, link=:link, ruta=:ruta, color=:color WHERE id=:id");

      $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
      $stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
      $stmt -> bindParam(":link", $datosModel["link"], PDO::PARAM_STR);
      $stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
      $stmt -> bindParam(":color", $datosModel["color"], PDO::PARAM_STR);
      

      if($stmt->execute()){
        return "ok";
      }
      else{
        return "error";
      }
      $stmt->close();
    }
}