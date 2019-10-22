<?php

include_once "../../controllers/gestorProducciones.php";
require_once "../../models/gestorProducciones.php";

class Ajax{

    public $imagenTemporal;

    //Subir la imagen dle articulo

    public function gestorProduccionesAjax(){

        $datos = $this->imagenTemporal;

        $respuesta = GestorProducciones::mostrarImagenController($datos);
        echo $respuesta;

    }

    /*public $actualizarOrdenArticulos;
    public $actualizarOrdenItems;

    public function actualizarOrdenAjax(){
        $datos = [
            'ordenArticulos'=> $this->actualizarOrdenArticulos,
            'ordenItem'=> $this->actualizarOrdenItems
        ];

        $respuesta = GestorArticulos::actualizarOrdenController($datos);

        echo $respuesta;

    }*/


}

//Objetos

if(isset($_FILES["imagen"]["tmp_name"])){
    $a = new Ajax();
    $a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a -> gestorProduccionesAjax();
}

/*if(isset($_POST["actualizarOrdenArticulos"])){
    $b = new Ajax();
    $b -> actualizarOrdenArticulos = $_POST["actualizarOrdenArticulos"];
    $b -> actualizarOrdenItems = $_POST["actualizarOrdenItems"];
    $b -> actualizarOrdenAjax();
}*/