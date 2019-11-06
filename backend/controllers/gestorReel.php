<?php

class GestorReel{

    public function mostrarReelController(){

        $respuesta = GestorReelModel::mostrarReelModel("reel");

        foreach($respuesta as $row => $item){
            echo '<div class="reel" id="'.$item["id"].'">
                    <button type="button" class="btn btn-primary boton-reel" data-toggle="modal" data-target="#movie-'.$item["id"].'">
                        <img  class="logosignos" src="views/images/Logo/logo_ojo.png" alt=""> PLAY Reel   <i class="fas fa-play"></i>
                        <input type="hidden" value="'.$item["link"].'">
                    </button>
                    <button type="button" id="btn-cambiar-reel" class="btn btn-success mb-3 mt-3"><i class="fas fa-edit"></i>   Cambiar reel</button>
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

    public function editarReelController(){

        if(isset($_POST["idReel"])){

            $datosController = [
                'idReel' => $_POST["idReel"],
                'linkReel' => $_POST["editarLinkReel"],
            ];
            
            $respuesta = GestorReelModel::editarReelModel($datosController, "reel");

            if($respuesta == "ok"){
                echo '<script type="text/javascript">
                
                swal({
                    title: "OK!",
                    text: "El Reel se ha actualizado satisfactoriamente!",
                    type: "success",
                    confirmButtonText:"Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = "?action=reel";
                    }
                });

				</script>';
            }else{
                echo $respuesta;
            }

        }

    }
}