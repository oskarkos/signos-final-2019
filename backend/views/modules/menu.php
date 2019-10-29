<!------- NavBar ------>

<header>      
    <label id="menu-toggle" for=""><i class="fas fa-bars"></i></label>  
    <div class="ml-auto usuario">
        <i class="fas fa-user-circle"></i>
        <p id="miembro"><?php echo $_SESSION["usuario"]; ?></p>
        <a  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" ><i class="fas fa-angle-down"></i></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-edit icono-peque"></i>  Editar Perfil</a>
          <a class="dropdown-item" href="#"><i class="fas fa-file-alt icono-peque"></i>    Terminos y Condiciones</a>
          <a class="dropdown-item" href="?action=salir"><i class="fas fa-times icono-peque"></i>  Salir</a>
    </div>
</header>

<!------- Side Bar ------>

<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a href="?action=menuInicio"><div class="line"><label class="lnr lnr-home"><font>Home</font></label></div></a>
        <a href="?action=edicionSlide"><div class="line"><label class="lnr lnr-picture"><font>Carrusel</font></label></div></a>
        <a href="?action=producciones"><div class="line"><label class="lnr lnr-file-empty"><font>Producciones</font></label></div></a>
        <a href="?action=info"><div class="line"><label class="lnr lnr-users"><font>About Us</font></label></div></a>
        <a href="../index.php" target="_blank"><div class="line"><label class="lnr lnr-enter-down"><font>Ver Sitio</font></label></div></a>
    </ul>
</div>
<!------- Main Content ------>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron jumbotron-fluid" id="saludo">
                <div class="container">
                    <h1 class="display-4" id="titulo">Sistema de Administracion CMS de signos.com.co</h1>
                    <p class="lead">Aquí podra modificar el contenido del sitio.</p>
                </div>
            </div>
        </div>
    </div>