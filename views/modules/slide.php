<section id="carrusel-signos">

    <!---- Frase ---->
    <div class="padre-texto">
        <div class="texto">
            <h2> Somos una <strong><span style="color: #29ABE2"> productora</span></strong> de contenido, especializada en animación 3D, <strong><span style="color: #29ABE2"> captura de movimiento</span></strong> y producción de <strong><span style="color: #29ABE2">experiencias </span></strong>inmersivas interactivas…</h2></div>
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