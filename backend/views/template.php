<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/estilosMenus.css">
    <link rel="stylesheet" href="views/css/estilosEditarImg.css">
    <link rel="stylesheet" href="views/css/estilosInicio.css">
    <link rel="stylesheet" href="views/css/estilos.css">
    <link rel="stylesheet" href="views/css/estilosProducciones.css">
    <link rel="stylesheet" href="views/css/estilosReel.css">
    <link rel="shortcut icon" type="image/png" href="views/images/Logo/logo_ojo.png"/>
    <link rel="stylesheet" href="views/css/estilosAbout.css">
    <link rel="stylesheet" href="views/css/sweetalert.css">
    <title>Signos Administración</title>
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
</head>
<body>
    <div id="wrapper">
    <?php
        $modulos = new Enlaces();
        $modulos -> enlacesController();
    ?>            
    </div>

    <script src="views/js/validarIngreso.js"></script>
    <script src="views/js/gestorSlide.js"></script>
    <script src="views/js/gestorProducciones.js"></script>
    <script src="views/js/gestorInfo.js"></script>
    <script src="views/js/gestorReel.js"></script>
    
    <script>
        $('#menu-toggle').click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("menu-displayed");
        })
    </script>


</body>
</html>