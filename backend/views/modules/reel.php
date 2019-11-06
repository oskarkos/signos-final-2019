<?php
    if(!$_SESSION["validar"]){
        echo "<script>window.location = '?action=ingreso'</script>";
        exit();
    }

    include "views/modules/menu.php";
?>

<?php
    $mostrarReel = new GestorReel();
    $mostrarReel -> mostrarReelController();
?>


<section id="editarReel" >
    <?php
        $editarReel = new GestorReel();
        $editarReel -> editarReelController();
    ?>
</section>
