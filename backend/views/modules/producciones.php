<?php
    if(!$_SESSION["validar"]){
        echo "<script>window.location = '?action=ingreso'</script>";
        exit();
    }

    include "views/modules/menu.php";
?>

<!-- Articulos Maquetacion -->
<div class="container">
    <div class="row">
        <div class="col-auto mr-auto">
            <button type="button" id="btn-agregar-articulo" class="btn btn-success mb-3 mt-3"><i class="fas fa-plus"></i>   Nueva Producción</button>
        </div>
        <!----<div class="col-auto">
             <button type="button" id="btn-ordenar-articulos" class="btn btn-danger mb-3 mt-3"><i class="fas fa-sort"></i>   Ordenar Producciones</button>
            <button type="button" id="btn-guardar-articulos" class="btn btn-primary mb-3 mt-3" style="display:none"><i class="fas fa-check"></i>   Guardar Orden Producciones</button> 
        </div>--->
    </div>     
</div>

    

<div class="container editar-articulo pt-3 mb-3" id="agregarArticulos" style="display:none">
    <form method="POST" enctype="multipart/form-data">
        <div class="padre-centrar" id="imagenArt">
            <div class="form-group">
                <input type="file" name="imagen" class="form-control-file" id="subirFoto" required>
            </div> 
        </div>
        <div class="padre-centrar">
            <label for=""> Tamaño recomenado 1920px x 1080px - Peso maximo permitido 2MB</label> 
        </div>
        <div class="form-group imagen-seleccion">
        </div>
        <div class="form-group">
            <input name="tituloProduccion" type="text" class="form-control" id="" placeholder="Título de la Producción" required>
        </div>
        <div class="form-group">
            <input name="linkProduccion" type="text" class="form-control" id="" placeholder="Link de la Producción" required>
        </div>
        <div class="padre-centrar">
            <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-save"></i>   Guardar</button>
        </div>             
    </form>
    <?php
        $crearProduccion = new GestorProducciones();
        $crearProduccion -> guardarProduccionesController();
    ?>
</div>

<section class="divisionpro mb-3">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h1 id="nupro"> Previsualización Producciones</h1>    
            </div>
        </div>
    </div>
</section>

<div class="container-fluid producciones" id="works">
    <div class="row">
        <?php
            $mostrarProduccion = new GestorProducciones();
            $mostrarProduccion -> mostrarProduccionesController();
            $mostrarProduccion -> borrarArticuloController();
        ?>
    </div>
</div>


<section id="editarArticulo" >
    <?php
        $editarProduccion = new GestorProducciones();
        $editarProduccion -> editarProduccionesController();
    ?>
</section>
