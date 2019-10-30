<?php

class GestorProducciones{

    public function mostrarImagenController($datos){

        list($ancho, $alto) = getimagesize($datos);

        if($ancho < 1280 || $alto <720){
            echo 0;
        }else{
            $fecha = date("Y-m-d-H-i-s");

            $ruta = "../../views/images/productos/temp/produccion".$fecha.".jpg";

            $origen = imagecreatefromjpeg($datos);

            imagejpeg($origen, $ruta);

            echo $ruta;

        }
    }

    public function guardarProduccionesController(){

        if(isset($_POST["tituloProduccion"])){
            
            $imagen = $_FILES["imagen"]["tmp_name"];
            echo $imagen;
            
            $borrar = glob("views/images/productos/temp/*");

            foreach($borrar as $file){
                unlink($file);
            }

            $fecha = date("Y-m-d-H-i-s");
            $ruta = "views/images/productos/produccion".$fecha.".jpg";

            $origen = imagecreatefromjpeg($imagen);

            imagejpeg($origen, $ruta);

            $datosController = [
                'titulo' => $_POST["tituloProduccion"],
                'ruta' => $ruta,
                'link' => $_POST["linkProduccion"],
                'color' => $_POST["colorProduccion"]
            ];

            $respuesta = GestorProduccionesModel::guardarProduccionesModel($datosController, "producciones");
            if($respuesta == "ok"){
                echo '<script type="text/javascript">
                
                swal({
                    title: "OK!",
                    text: "La produccion se ha publicado correctamente!",
                    type: "success",
                    confirmButtonText:"Aceptar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = "?action=producciones";
                    }
                });
                
				</script>';
            }else{
                echo $respuesta;
            }
        }
    }
    public function mostrarProduccionesController(){

        $respuesta = GestorProduccionesModel::mostrarProduccionesModel("producciones");

        foreach($respuesta as $row => $item){
            if($item["color"] == "Blanco"){
                echo '<div class="col-lg-4 col-md-6 col-sm-12 contenedor mover-pro" id="'.$item["id"].'">
                    <button type="button" class="btn btn-primary boton-card" data-toggle="modal" data-target="#movie-'.$item["id"].'">
                    <img src="'.$item["ruta"].'" class="img-fluid imagen-pro" alt="Responsive image" alt="">
                    <input type="hidden" value="'.$item["link"].'">
                    <input type="hidden" class="colorLetra" value="'.$item["color"].'">
                    <div class="centrado">'.$item["titulo"].'</div>
                    </button>
                    <ul class="pade-centrar">
                        <li class="editar-icon"><span><i class="fas fa-edit"></i></span></li>    
                        <a href="index.php?action=producciones&idBorrar='.$item["id"].'&rutaImg='.$item["ruta"].'">
                            <li class="eliminar-icon"><span><i class="fas fa-times"></i></span></li>
                        </a>
                    </ul>                      
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
                $("#'.$item["id"].'").click(function(){ var theLink = "'.$item["link"].'?rel=0&color=white"; document.getElementById("'.$item["id"].'screen").src = theLink; }); 
    
                $("#movie-'.$item["id"].'").on("hidden.bs.modal", function (e) { $("#movie-'.$item["id"].' iframe").attr("src", ""); });
            </script>';
            }else{
                echo '<div class="col-lg-4 col-md-6 col-sm-12 contenedor mover-pro" id="'.$item["id"].'">
                    <button type="button" class="btn btn-primary boton-card" data-toggle="modal" data-target="#movie-'.$item["id"].'">
                    <img src="'.$item["ruta"].'" class="img-fluid imagen-pro" alt="Responsive image" alt="">
                    <input type="hidden" value="'.$item["link"].'">
                    <input type="hidden" class="colorLetra" value="'.$item["color"].'">
                    <div class="centrado" style="color:black; border: 2px solid black">'.$item["titulo"].'</div>
                    </button>
                    <ul class="pade-centrar">
                        <li class="editar-icon"><span><i class="fas fa-edit"></i></span></li>    
                        <a href="index.php?action=producciones&idBorrar='.$item["id"].'&rutaImg='.$item["ruta"].'">
                            <li class="eliminar-icon"><span><i class="fas fa-times"></i></span></li>
                        </a>
                    </ul>                      
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
                $("#'.$item["id"].'").click(function(){ var theLink = "'.$item["link"].'?rel=0&color=white"; document.getElementById("'.$item["id"].'screen").src = theLink; }); 
    
                $("#movie-'.$item["id"].'").on("hidden.bs.modal", function (e) { $("#movie-'.$item["id"].' iframe").attr("src", ""); });
            </script>';
            }
        }
    }
    public function borrarArticuloController(){

        if(isset($_GET["idBorrar"])){

            unlink($_GET["rutaImg"]);

            $datosController = $_GET["idBorrar"];
            $respuesta = GestorProduccionesModel::borrarProduccionesModel($datosController, "producciones");
            
            echo '<script type="text/javascript">
                
            swal({
                title: "OK!",
                text: "Se ha borrado correctamente la produccion!",
                type: "success",
                confirmButtonText:"Cerrar",
                closeOnConfirm: false
                },
                function(isConfirm){
                    if(isConfirm){
                        window.location = "?action=producciones";
                }
            });

            </script>';

        }
    }

    public function editarProduccionesController(){

        $ruta = "";

        if(isset($_POST["editarTitulo"])){

            if(isset($_FILES["editarImagen"]["tmp_name"])){
                $imagen = $_FILES["editarImagen"]["tmp_name"];
                
                $fecha = date("Y-m-d-H-i-s");
                $ruta = "views/images/productos/produccion".$fecha.".jpg";

                $origen = imagecreatefromjpeg($imagen);

                imagejpeg($origen, $ruta);

                $borrar = glob("views/images/productos/temp/*");

                foreach($borrar as $file){
                    unlink($file);
                }
            }

            if($ruta == ""){
                $ruta = $_POST["fotoAntigua"];
            }else{
                unlink($_POST["fotoAntigua"]);
            }

            $datosController = [
                'id' => $_POST["id"],
                'titulo' => $_POST["editarTitulo"],
                'ruta' => $ruta,
                'link' => $_POST["editarLink"],
                'color' => $_POST["editarColor"]
            ];
            
            $respuesta = GestorProduccionesModel::editarProduccionesModel($datosController, "producciones");

            if($respuesta == "ok"){
                echo '<script type="text/javascript">
                
                swal({
                    title: "OK!",
                    text: "La produccion se actualizado correctamente!",
                    type: "success",
                    confirmButtonText:"Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = "?action=producciones";
                    }
                });

				</script>';
            }else{
                echo $respuesta;
            }

        }

    }
}