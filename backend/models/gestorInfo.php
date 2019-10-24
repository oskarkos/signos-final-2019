<?php

require_once "conexion.php";

class GestorInfoModel{

    public function mostrarInfoModel($tabla){
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("SELECT id, titulo, link, contenido FROM $tabla ORDER BY orden ASC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
    }

    public function editarInfoModel($datosModel, $tabla){
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("UPDATE $tabla SET titulo=:titulo, link=:link, contenido=:contenido WHERE id=:id");
  
        $stmt -> bindParam(":id", $datosModel["idInfo"], PDO::PARAM_INT);
        $stmt -> bindParam(":titulo", $datosModel["tituloInfo"], PDO::PARAM_STR);
        $stmt -> bindParam(":link", $datosModel["linkInfo"], PDO::PARAM_STR);
        $stmt -> bindParam(":contenido", $datosModel["contenidoInfo"], PDO::PARAM_STR);
        
  
        if($stmt->execute()){
          return "ok";
        }
        else{
          return "error";
        }
        $stmt->close();
    }

    public function borrarInfoModel($datosModel, $tabla){
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
    public function actualizarOrdenInfoModel($datosModel, $tabla){

		$conn = Conexion::conectar();
		$stmt = $conn->prepare("UPDATE $tabla SET orden=:orden WHERE id=:id");

		$stmt -> bindParam(":orden", $datosModel["ordenItem"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datosModel["ordenInfo"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}

}