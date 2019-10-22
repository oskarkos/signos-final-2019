<section id="carrusel-signos">

    <!---- Frase ---->
    <div class="padre-texto">
        <div class="texto">
            <h2><strong> Creamos y <span style="color: #29ABE2"> producimos</span> contenido animado para niños <br> y sitios turísticos
            en formatos <span style="color: #29ABE2"> innovadores.</span></strong></h2>
            <p>Dreams producer</p></div>
    </div>
    <!---- FinFrase ---->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="false">
        <ol class="carousel-indicators">
        <?php

            $slide = new Slide();
            $slide -> numeroDeSlidesController(); 

        ?>
        </ol>
        <div class="carousel-inner">
        <?php

            $slide = new Slide();
            $slide -> selecionarSlideController(); 

        ?>
        </div>
        <span class="scroll_please" style="display: block;">Scroll</span>
    </div>
</section>