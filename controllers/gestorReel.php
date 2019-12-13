<?php

class Reel{

    public function seleccionarReelController(){

        $respuesta = ReelModel::seleccionarReelModel("reel");

        foreach($respuesta as $row => $item){
            echo '<div class="reel" id="'.$item["id"].'">
                    <button type="button" class="btn btn-primary boton-reel" data-toggle="modal" data-target="#movie-'.$item["id"].'">
                        <img  class="logosignos" src="views/img/Logos/signos_studio_eye.gif" alt=""> PLAY Reel   <i class="fas fa-play"></i>
                    </button>
                </div>
                
                <div id="movie-'.$item["id"].'" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
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