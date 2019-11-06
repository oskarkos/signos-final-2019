<?php
    if(!$_SESSION["validar"]){
        echo "<script>window.location = '?action=ingreso'</script>";
        exit();
    }

    include "views/modules/menu.php";
?>
<!------------- Scecciones  --------------->
<div class="container">
    <div class="row seccion">
        <div class="col-lg-3 col-md-6 col-xs-12 mt-4 mb-4">
            <a href="?action=reel"><div class="card iconos-principal">
                <img src="views/images/icons/articles.svg" class="card-img img-responsive cube" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center titulos-iconos">Reel</h5>
                </div>
            </div></a>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 mt-4 mb-4">
            <a href="?action=edicionSlide"><div class="card iconos-principal">
                <img src="views/images/icons/slider.svg" class="card-img img-responsive cube" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center titulos-iconos">Slider</h5>
                </div>
            </div></a>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 mt-4 mb-4">
            <a href="?action=producciones"><div class="card iconos-principal">
                <img src="views/images/icons/iamges.svg" class="card-img img-responsive cube" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center titulos-iconos">Produccines</h5>
                </div>
            </div></a>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 mt-4 mb-4">
            <a href="?action=info"><div class="card iconos-principal">
                <img src="views/images/icons/users-group.svg" class="card-img img-responsive cube" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center titulos-iconos">About Us</h5>
                </div>
            </div></a>
        </div>
    </div>
    </div>
    <div class="row seccion">
        
    </div>
</div>