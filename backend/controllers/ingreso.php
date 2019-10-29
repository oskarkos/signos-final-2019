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

                $google_url = "https://www.google.com/recaptcha/api/siteverify";
                $str = $_POST['g-recaptcha-response'];
                $secret = '6Lf3678UAAAAAA04RGFfMmyRYBXTVjmt6_TGUoEk';
                $ip = $_SERVER['REMOTE_ADDR'];
                $url = $google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
                
                //INICIAMOS cURL
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_TIMEOUT, 10);
                curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
                $res = curl_exec($curl);
                curl_close($curl);
                
                $resp = json_decode($res, true);
                
                //CHEQUEAMOS EL RESULTADO
                if($resp['success']) {
                //Captcha correcto
                $intentos = 0;
                }

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

                    $datosController = ['usuarioActual'=> $usuarioActual,
                                        'actualizarIntentos'=> $intentos
                    ];

                    $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

                    echo '<div class="alert alert-warning captcha">
                    <strong>Ha fallado 3 veces!</strong> Resuelva el captcha para continuar.
                    <div class="g-recaptcha" data-sitekey="6Lf3678UAAAAAJLRQJgsVND_14VJmrQMlQXwUu0U">
                    </div>
                        </div> 
                    ';  
                }
            }
        }
    }
}