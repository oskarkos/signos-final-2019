<?php

class EnlacesModels{
    public function enlacesModel($enlaces){
        if($enlaces=="menuInicio" ||
        $enlaces=="ingreso" ||
        $enlaces=="edicionSlide" ||
        $enlaces=="producciones" ||
        $enlaces=="info" ||
        $enlaces=="salir"){
            $module="views/modules/".$enlaces.".php";
        }else if("index"){
            $module="views/modules/ingreso.php";
        }else{
            $module="views/modules/ingreso.php";
        }
        return $module;
    }
}