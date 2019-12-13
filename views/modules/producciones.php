<div class="container-fluid producciones" id="works">
    <div class="row">
        <?php
            $producciones = new Producciones();
            $producciones -> seleccionarProduccionesController();
        ?>
    </div>
    <div class="d-flex justify-content-center">
        <button id="showmore" type="button" class="btn btn-outline-primary btn-sm azulito" style="display:none">Show More</button>
        <button id="showless" type="button" class="btn btn-outline-primary btn-sm azulito" style="display:none">Show Less</button> 
    </div>
</div
