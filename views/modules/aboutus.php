<section id="aboutus">
    <div class="container mt-5 about">
        <h1 class="text-white text-center pb-3">About Us</h1>
        <div class="row">
            <div class="card-columns">
                <?php
                    $Info = new Info();
                    $Info -> seleccionarInfoController();
                ?>
            </div>
        </div>         
    </div>
</section>