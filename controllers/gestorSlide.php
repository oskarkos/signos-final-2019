<?php

class Slide{

    public function selecionarSlideController(){

        $respuesta = SlideModel::seleccionarSlideModel("slide");

        $indicador = 0;
        
        foreach($respuesta as $row =>$item){
            if($item["orden"]== 1){
                $activo = 'active';
                    echo '<div class="carousel-item '.$activo.'">
                            <img src="backend/'.substr($item["ruta"], 6).'" class="d-block w-100" alt="...">
                         </div>';
            }else{
                echo '<div class="carousel-item">
                <img src="backend/'.substr($item["ruta"], 6).'" class="d-block w-100" alt="...">
             </div>';
            }
        }
    }

    public function numeroDeSlidesController(){

        $respuesta = SlideModel::numeroDeSlidesModel("slide");

        for($i = 0; $i < $respuesta; $i++){
            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
        }

        
    }
}