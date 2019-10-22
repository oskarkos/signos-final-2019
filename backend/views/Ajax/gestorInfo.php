<?php

include_once "../../controllers/gestorInfo.php";
require_once "../../models/gestorInfo.php";

class Ajax{
    
     #ACTUALIZAR ITEM SLIDE
    #------------------------------------------------------------------------------

    public $actualizarOrdenInfo;
    public $actualizarOrdenItem;

    public function actualizarOrdenInfoAjax(){
        $datos = [
            'ordenInfo'=> $this->actualizarOrdenInfo,
            'ordenItem'=> $this->actualizarOrdenItem
        ];

        $respuesta = GestorInfo::actualizarOrdenInfoController($datos);

        echo $respuesta;

    }
}

if(isset($_POST["actualizarOrdenInfo"])){
    $d = new Ajax();
    $d -> actualizarOrdenInfo = $_POST["actualizarOrdenInfo"];
    $d -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
    $d -> actualizarOrdenInfoAjax();
}