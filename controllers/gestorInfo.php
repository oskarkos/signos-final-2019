<?php

class Info{
    public function seleccionarInfoController(){
        
        $respuesta = InfoModel::seleccionarInfoModel("info");
        
        foreach($respuesta as $row =>$item){
            echo '<div class="card cardabout">
                    <img src="'.$item["link"].'" class="img-fluid" alt="">
                    <h3>'.$item["titulo"].'</h3>
                    <p>'.$item["contenido"].'</p>
                </div>';
        }
    }
}