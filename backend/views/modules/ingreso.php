<nav id="header" class="navbar navbar-expan-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href=""><img src="views/images/Logo/logo1.png" alt="Logo Signos"></a>
        <div class="button-menu">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </div>
</nav>
<div class="loginSection">
    <div class="modal-dialog text-center">
        <div class="align-self-center">
            <div class="modal-content">
                <div class="col-12" id="signosImg">
                    <img src="views/images/Logo/logo_ojo.png" alt="">
                </div>
                <div>
                    <h2 class="textLogin" id="tituloLogin">Bienvenido al sistema de Administración de Contenido de Signos Studio</h1>
                </div>
                <div class="container">
                    <div class="division">
                        <p class="textLogin" id="subtituloLogin">Porfavor ingrese su Usuario y Contraseña<p>
                    </div>
                </div>
                    <form method="POST" id="formIngreso" onsubmit="return validarIngreso()">
                        <div class="container">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2 text-right align-middle" id="logito"><i class="far fa-user"></i></div>
                                    <div class="col"><input type="text" class="form-control" name="usuarioIngreso" id="usuarioIngreso" placeholder="Usuario" require></div>                                
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2 text-right align-middle" id="logito"><i class="fas fa-lock"></i></div>
                                    <div class="col"><input type="password" class="form-control" name="passIngreso" id="passIngreso" placeholder="Contraseña" require></div>                                
                                </div>            
                            </div>
                            <?php
                                $ingreso = new Ingreso();
                                $ingreso -> ingresoController();
                            ?>
                            <div class="container pb-3">
                                <div class="division">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary" value="Enviar"><i class="fas fa-sign-in-alt"></i>   Inicia sesión</button>                    
                            <div class="col-12 pb-3 pt-2">
                                <a href=""></a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>        
</div>