<?php

class ReelMenu{

    public function seleccionarReelMenuController(){

        $respuesta = ReelModel::seleccionarReelModel("reel");

        foreach($respuesta as $row => $item){
            $ids=$item["id"]+1;
            echo '<li class="nav-item" id="'.$ids.'">
                    <a href="" class="nav-link play-reel" data-toggle="modal"  data-target="#movie-'.$ids.'"> Play Reel<i class="fas fa-play play-logo"></i></a>
                </li>
                
                <div id="movie-'.$ids.'" class="modal fade" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content"> 
                            <div class="embed-responsive embed-responsive-4by3 z-depth-1-half"> 
                                <iframe id="'.$ids.'screen" src="" frameborder="0" allowfullscreen></iframe>
                            </div> 
                        </div> 
                    </div> 
                </div> 
                <script>
                    $("#'.$ids.'").click(function(){ var theLink = "'.$item["link"].'?rel=0&color=white&autoplay=1"; document.getElementById("'.$ids.'screen").src = theLink; }); 
        
                    $("#movie-'.$ids.'").on("hidden.bs.modal", function (e) { $("#movie-'.$ids.' iframe").attr("src", ""); });
                </script>';
        }
    }
}