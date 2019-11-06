<?php

class Producciones{
    public function seleccionarProduccionesController(){
        
        $respuesta = ProduccionesModel::seleccionarProduccionesModel("producciones");
        
        foreach($respuesta as $row => $item){
            if($item["color"] == "Blanco"){
                echo '<div class="col-lg-4 col-md-6 col-sm-12 contenedor mover-pro" id="'.$item["id"].'">
                    <button type="button" class="btn btn-primary boton-card" data-toggle="modal" data-target="#movie-'.$item["id"].'">
                    <img src="backend/'.$item["ruta"].'" class="img-fluid imagen-pro" alt="Responsive image" alt="">
                    <input type="hidden" value="'.$item["link"].'">
                    <div class="centrado">'.$item["titulo"].'</div>
                    </button>                     
                </div>
                
            <div id="movie-'.$item["id"].'" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content"> 
                        <div class="embed-responsive embed-responsive-4by3 z-depth-1-half"> 
                            <iframe id="'.$item["id"].'screen" src="" frameborder="0" allowfullscreen></iframe>
                        </div> 
                    </div> 
                </div> 
            </div>
            
            <script>
                $("#'.$item["id"].'").click(function(){ var theLink = "'.$item["link"].'?rel=0&color=white&autoplay=1"; document.getElementById("'.$item["id"].'screen").src = theLink; }); 
    
                $("#movie-'.$item["id"].'").on("hidden.bs.modal", function (e) { $("#movie-'.$item["id"].' iframe").attr("src", ""); });
            </script>';
            }else{
                echo '<div class="col-lg-4 col-md-6 col-sm-12 contenedor mover-pro" id="'.$item["id"].'">
                    <button type="button" class="btn btn-primary boton-card" data-toggle="modal" data-target="#movie-'.$item["id"].'">
                    <img src="backend/'.$item["ruta"].'" class="img-fluid imagen-pro" alt="Responsive image" alt="">
                    <input type="hidden" value="'.$item["link"].'">
                    <div class="centrado" style="color:black; border: 2px solid black">'.$item["titulo"].'</div>
                    </button>                      
                </div>
                
            <div id="movie-'.$item["id"].'" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content"> 
                        <div class="embed-responsive embed-responsive-4by3 z-depth-1-half"> 
                            <iframe id="'.$item["id"].'screen" src="" frameborder="0" allowfullscreen></iframe>
                        </div> 
                    </div> 
                </div> 
            </div>
            
            <script>
                $("#'.$item["id"].'").click(function(){ var theLink = "'.$item["link"].'?rel=0&color=white&autoplay=1"; document.getElementById("'.$item["id"].'screen").src = theLink; }); 
    
                $("#movie-'.$item["id"].'").on("hidden.bs.modal", function (e) { $("#movie-'.$item["id"].' iframe").attr("src", ""); });
            </script>';
            }
        }
    }
}