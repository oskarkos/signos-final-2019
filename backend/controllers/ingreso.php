<?php
class Ingreso{
    public function ingresoController(){
        if(isset($_POST["usuarioIngreso"])){
            if(preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]*$/', $_POST["passIngreso"])){
                
                #$encriptar = crypt($_POST["passIngreso"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datosController = [
                    'usuario' => $_POST["usuarioIngreso"],
                    'password' => $_POST["passIngreso"]
                ];
                $respuesta = IngresoModels::ingresoModel($datosController, "usuarios");

                $intentos = $respuesta["intentos"];
                $usuarioActual = $_POST["usuarioIngreso"];
                $maximoIntentos = 2;

                if($intentos < $maximoIntentos){
                    if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passIngreso"]){
                        $intentos = 0;

                        $datosController = ['usuarioActual'=> $usuarioActual,
                                            'actualizarIntentos'=> $intentos
                        ];

                        $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");
                        
                        $_SESSION["validar"] = true;
                        $_SESSION["usuario"] = $usuarioActual;

                        echo "<script>window.location = '?action=menuInicio'</script>";
                        
                    }else{

                        ++$intentos;
                        $datosController = ['usuarioActual'=> $usuarioActual,
                                            'actualizarIntentos'=> $intentos
                        ];

                        $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");


                        echo '<div class="alert alert-danger">
                        <strong>Error al ingresar!</strong> Intente de nuevo.
                    </div>';
                    }
                }else{
                    $intentos = 0;

                    $datosController = ['usuarioActual'=> $usuarioActual,
                                        'actualizarIntentos'=> $intentos
                    ];

                    $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

                    echo '<div class="alert alert-warning">
                    <strong>Ha fallado 3 veces!</strong> Resulva el captcha para continuar.
                  </div>';
                }
            }
        }
    }
}