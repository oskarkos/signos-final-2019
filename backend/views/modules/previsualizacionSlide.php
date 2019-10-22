<div class="row seccion">
    <div class="col-12 text-center aviso-imagenes">
        <label class="lnr lnr-chevron-down"><font> Previsualizacion</font></label>
    </div>            
</div>
<section id="carrusel">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="false">
        <ol class="carousel-indicators" id="indicadores">
            
            <?php

            $slide = new GestorSlide();
            $slide -> numeroDeSlidesController(); 

            ?>

        </ol>
        <div class="carousel-inner">
            <?php

            $slide = new GestorSlide();
            $slide -> selecionarSlideController(); 

            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
</section>