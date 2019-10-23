<?php
    if(!$_SESSION["validar"]){
        echo "<script>window.location = '?action=ingreso'</script>";
        exit();
    }

    include "views/modules/menu.php";
?>

<section id="aboutus">
    <div class="container mt-5 about">
        <h1 class="text-white text-center pb-3">About Us</h1>
        <div class="row">
            <button id="ordenarInfo" type="button" class="btn btn-outline-primary btn-sm btn-block azulito" >Ordenar Info</button>
            <button id="guardarInfo" type="button" class="btn btn-outline-primary btn-sm btn-block azulitoG" style="display:none" >Guardar Orden de Info</button>
        </div>
    
        <div class="card-columns" id="listaInfo">
            <?php
                $mostrarInfo = new GestorInfo();
                $mostrarInfo -> mostrarInfoController();
                $mostrarInfo -> borrarArticuloController();
            ?>
        </div>         
    </div>

</section>

<section id="editarInfoSec">
    <?php
        $editarInfo = new GestorInfo();
        $editarInfo -> editarInfoController();
    ?>
</section>