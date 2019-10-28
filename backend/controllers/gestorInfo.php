<?php

class GestorInfo{

    public function mostrarInfoController(){
        $respuesta = GestorInfoModel::mostrarInfoModel("info");

        foreach($respuesta as $row => $item){
            echo '<div class="card cardabout" id="'.$item["id"].'">
                    <ul class="iconos-edit">
                        <li class="editarli"><i class="fas fa-edit"></i></li>
                        <a href="index.php?action=info&idBorrarInfo='.$item["id"].'">
                            <li class="eliminarli"><i class="fas fa-times"></i></li>
                        </a>
                    </ul>
                    <img src="'.$item["link"].'" class="img-fluid" alt="">
                    <h3>'.utf8_encode($item["titulo"]).'</h3>
                    <p>'.utf8_encode($item["contenido"]).'</p>
                </div>';
        }
    }

    public function editarInfoController(){

        if(isset($_POST["idInfo"])){

            $datosController = [
                'idInfo' => $_POST["idInfo"],
                'tituloInfo' => utf8_decode($_POST["editarTituloInfo"]),
                'contenidoInfo' => utf8_decode($_POST["contenidoEditarInfo"]),
                'linkInfo' => $_POST["editarLinkInfo"],
            ];
            
            $respuesta = GestorInfoModel::editarInfoModel($datosController, "info");

            if($respuesta == "ok"){
                echo '<script type="text/javascript">
                
                swal({
                    title: "OK!",
                    text: "La Informacion se actualizado correctamente!",
                    type: "success",
                    confirmButtonText:"Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = "?action=info";
                    }
                });

				</script>';
            }else{
                echo $respuesta;
            }

        }

    }

    public function borrarArticuloController(){

        if(isset($_GET["idBorrarInfo"])){

            $datosController = $_GET["idBorrarInfo"];
            $respuesta = GestorInfoModel::borrarInfoModel($datosController, "info");
            
            echo '<script type="text/javascript">
                
            swal({
                title: "OK!",
                text: "Se ha borrado correctamente la Información!",
                type: "success",
                confirmButtonText:"Cerrar",
                closeOnConfirm: false
                },
                function(isConfirm){
                    if(isConfirm){
                        window.location = "?action=info";
                }
            });

            </script>';

        }
    }

    public function actualizarOrdenInfoController($datos){
        GestorInfoModel::actualizarOrdenInfoModel($datos, "info");
    }

}