<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="views/css/MenuEstilos.css">
    <link rel="stylesheet" href="views/css/CarruselEstilos.css">
    <link rel="stylesheet" href="views/css/CardEstilos.css">
    <link rel="stylesheet" href="views/css/BotonReelEstilos.css">
    <link rel="stylesheet" href="views/css/Footer.css">
    <link rel="stylesheet" href="views/css/AboutUs.css">
    <link rel="stylesheet" href="views/css/TeamEstilos.css">
    <link rel="stylesheet" href="views/css/ContactoEstilos.css">
    <link rel="shortcut icon" type="image/png" href="views/img/Logos/logo_ojo.png"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="views/js/smooth-scroll.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <script>
    var scroll = new SmoothScroll('a[href*="#"]', {
      speed: 1000,
      offset: 66.28
    });
    </script>
    <title>Signos Studio</title>
  </head>


  <body>
    <!---- Barra de navegacion ---->
      <?php include "modules/cabezote.php"; ?>
    <!---- FIN Barra de navegacion ---->

    <!---- Carrusel ---->
      <?php include "modules/slide.php"; ?>
    <!---- Fin del carrusel ---->

    <!---- Boton Reel  ---->
      <?php include "modules/botonreel.php"; ?>
    <!---- Fin Boton Reel ---->
                   
    <!---- Cards Producciones ---->
      <?php include "modules/producciones.php"; ?>
    <!-- Fin Producciones -->

    <!-- About Us  -->
      <?php include "modules/aboutus.php"; ?>
    <!-- Fin About Us  -->

    <!-- Team  -->
      <?php include "modules/team.php"; ?>
    <!-- Fin Team  -->

    <!-- Contact  -->
      <?php include "modules/contact.php"; ?>
    <!-- Fin Contact  -->

    <!-- Footer  -->
      <?php include "modules/footer.php"; ?>
    <!-- footer  -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

         <!-- Optional JavaScript -->
    <script src="views/js/videos.js"></script>
    <script src="views/js/efectos.js"></script>

  </body>
</html>