<?php
class GestorSlide{

    public function mostrarImagenController($datos){
        #getimagesize , obtiene el tamaño del imagen
        list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
        
        if($ancho < 1280 || $alto < 720){
            echo 0;
        }else{
            $fecha = date("Y-m-d-H-i-s");
            
            $ruta = "../../views/images/carrusel/slide".$fecha.".jpg";
            
            $origen = imagecreatefromjpeg($datos["imagenTemporal"]);

            imagejpeg($origen, $ruta);
            
            GestorSlideModel::subirImagenSlideModel($ruta, "slide");
            
            $respuesta = GestorSlideModel::mostrarImagenSlideModel($ruta, "slide");

            $enviarDatos = [
                'ruta' => $respuesta["ruta"]
            ];

            echo json_encode($enviarDatos);
        }
    }
    
    public function mostrarImagenVistaController(){

        $respuesta = GestorSlideModel::mostrarImagenVistaModel("slide");

        foreach($respuesta as $row =>$item){
            echo '<div class="col-md-6 col-lg-4 item zoom-on-hover" id="'.$item["id"].'"><span class="lnr lnr-cross cruz eliminarSlide" ruta="'.$item["ruta"].'"></span><img class="img-fluid" src="'.substr($item["ruta"], 6).'" alt=""></div>';
        }
    }

    public function eliminarSlideController($datos){
        $respuesta = GestorSlideModel::eliminarSlideModel($datos, "slide");

        unlink($datos["rutaSlide"]);

        echo $respuesta;
    }

    public function actualizarOrdenController($datos){
        GestorSlideModel::actualizarOrdenModel($datos, "slide");
        /*$respuesta = GestorSlideModel::seleccionarOrdenModel("slide");
        
        foreach($respuesta as $row =>$item){
            echo '<div class="col-md-6 col-lg-4 item zoom-on-hover" id="'.$item["id"].'"><span class="lnr lnr-cross cruz eliminarSlide" ruta="'.$item["ruta"].'"></span><img class="img-fluid" src="'.substr($item["ruta"], 6).'" alt=""></div>';
        }*/
        
    }
    public function selecionarSlideController(){

        $respuesta = GestorSlideModel::seleccionarSlideModel("slide");

        $indicador = 0;
        
        foreach($respuesta as $row =>$item){
            if($item["orden"]== 1){
                $activo = 'active';
                    echo '<div class="carousel-item '.$activo.'">
                            <img src="'.substr($item["ruta"], 6).'" class="d-block w-100" alt="...">
                         </div>';
            }else{
                echo '<div class="carousel-item">
                <img src="'.substr($item["ruta"], 6).'" class="d-block w-100" alt="...">
             </div>';
            }
        }
    }

    public function numeroDeSlidesController(){

        $respuesta = GestorSlideModel::numeroDeSlidesModel("slide");

        for($i = 0; $i < $respuesta; $i++){
            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
        }

        
    }
    
}