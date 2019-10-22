<?php
    if(!$_SESSION["validar"]){
        echo "<script>window.location = 'ingreso'</script>";
        exit();
    }

    include "views/modules/menu.php";
?>
<!-- Panel de edicion -->
<div class="container">
    <div class="row seccion">
        <div class="col-12 text-center aviso-imagenes">
            <label class="lnr lnr-chevron-down"><font> Arrastra aquí tu imagen (tamaño recomendado: 1920px * 1080px, No mas de 2MB)</font></label>
        </div>
    </div>
    <div class="row seccion-editar">
        <div class="container contenido" >
            <div class="row no-gutters" id="milista">     
            <?php
                $slide = new GestorSlide();
                $slide -> mostrarImagenVistaController();
            ?>
            </div>
        </div>
    </div>
    <button id="ordenarSlide" type="button" class="btn btn-outline-primary btn-sm btn-block azulito" >Ordenar Imagenes</button>
    <button id="guardarSlide" type="button" class="btn btn-outline-primary btn-sm btn-block azulitoG" style="display:none" >Guardar Orden de Imagenes</button>
</div>

<?php

    include "views/modules/previsualizacionSlide.php";

?>

