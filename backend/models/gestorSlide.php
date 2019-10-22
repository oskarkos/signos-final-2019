<?php

require_once "conexion.php";

class GestorSlideModel{
    public function subirImagenSlideModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruta) VALUES (:ruta)");
		
		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}

    public function mostrarImagenSlideModel($datos, $tabla){
		
		$conn = Conexion::conectar();
		$stmt = $conn->prepare("SELECT ruta FROM $tabla WHERE ruta=:ruta");

		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
		
		$stmt ->execute();

		return $stmt->fetch();

		$stmt->close();

    }
    
    public function mostrarImagenVistaModel($tabla){

		$conn = Conexion::conectar();
		$stmt = $conn->prepare("SELECT id, ruta FROM $tabla ORDER BY orden ASC");

		$stmt ->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	public function eliminarSlideModel($datosModel, $tabla){

		$conn = Conexion::conectar();
		$stmt = $conn->prepare("DELETE FROM $tabla WHERE id=:id");

		$stmt -> bindParam(":id", $datosModel["idSlide"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}

	public function actualizarOrdenModel($datosModel, $tabla){

		$conn = Conexion::conectar();
		$stmt = $conn->prepare("UPDATE $tabla SET orden=:orden WHERE id=:id");

		$stmt -> bindParam(":orden", $datosModel["ordenItem"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datosModel["ordenSlide"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}
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