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
                        <a>
                    </ul>
                    <img src="'.$item["link"].'" class="img-fluid" alt="">
                    <h3>'.$item["titulo"].'</h3>
                    <p>'.$item["contenido"].'</p>
                </div>';
        }
    }

    public function editarInfoController(){

        if(isset($_POST["contenidoEditarInfo"])){

            $datosController = [
                'idInfo' => $_POST["idInfo"],
                'tituloInfo' => $_POST["editarTituloInfo"],
                'contenidoInfo' => $_POST["contenidoEditarInfo"],
                'linkInfo' => $_POST["editarLinkInfo"],
            ];
            
            $respuesta = GestorInfoModel::editarInfoModel($datosController, "info");

            if($respuesta == "ok"){
                echo '<script type="text/javascript">
                
                swal({
                    title: "OK!",
                    text: "La Inofrmacion se actualizado correctamente!",
                    type: "success",
                    confirmButtonText:"Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = "info";
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
                        window.location = "info";
                }
            });

            </script>';

        }
    }

    public function actualizarOrdenInfoController($datos){
        GestorInfoModel::actualizarOrdenInfoModel($datos, "info");
    }

}