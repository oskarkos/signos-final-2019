<div id="header" class="container-fluid">
    <nav class="navbar navbar-expand-lg container-fluid">
        <a class="navbar-brand logo" href="#header"><img src="views/img/Logos/LogoSignosMenu.png" alt="Signos Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon menu-icon"><i class="fas fa-align-justify"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" data-scroll href="#works">Works</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-scroll href="#aboutus">About Us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-scroll href="#contact">Contact</a>
            </li>
            <?php
                $reel = new ReelMenu();
                $reel -> seleccionarReelMenuController();
            ?>
        </ul>
        </div>
    </nav>
</div>