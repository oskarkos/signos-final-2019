<?php

require_once "../../models/gestorSlide.php";
require_once "../../controllers/gestorSlide.php";

class Ajax{
    #SUBIR LA IMAGEN DEL SLIDE
    #------------------------------------------------------------------------------
    public $nombreImagen;
    public $imagenTemporal;
 
    public function gestorSlideAjax(){
        
        $datos = ["nombreImagen"=>$this->nombreImagen,
                  "imagenTemporal"=>$this->imagenTemporal
        ];
        
        $respuesta = GestorSlide::mostrarImagenController($datos);
 
        echo $respuesta;
    }
    #ELIMINAR ITEM SLIDE
    #------------------------------------------------------------------------------

    public $idSlide;
    public $rutaSlide;

    public function eliminarSlideAjax(){
        $datos = [
            'idSlide'=> $this->idSlide,
            'rutaSlide'=> $this->rutaSlide
        ];

        $respuesta = GestorSlide::eliminarSlideController($datos);

        echo $respuesta;
    }
     #ACTUALIZAR ITEM SLIDE
    #------------------------------------------------------------------------------

    public $actualizarOrdenSlide;
    public $actualizarOrdenItem;

    public function actualziarOrdenAjax(){
        $datos = [
            'ordenSlide'=> $this->actualizarOrdenSlide,
            'ordenItem'=> $this->actualizarOrdenItem
        ];

        $respuesta = GestorSlide::actualizarOrdenController($datos);

        echo $respuesta;

    }
}



#OBJETOS
#-----------------------------------------------------------
if(isset($_FILES["imagen"]["name"])){
    $a = new Ajax();
    $a -> nombreImagen = $_FILES["imagen"]["name"];
    $a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a -> gestorSlideAjax();
}

if(isset($_POST["idSlide"])){
    $b = new Ajax();
    $b -> idSlide = $_POST["idSlide"];
    $b -> rutaSlide = $_POST["rutaSlide"];
    $b -> eliminarSlideAjax();
}
if(isset($_POST["actualizarOrdenSlide"])){
    $d = new Ajax();
    $d -> actualizarOrdenSlide = $_POST["actualizarOrdenSlide"];
    $d -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
    $d -> actualziarOrdenAjax();
}