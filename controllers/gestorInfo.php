<?php

class Info{
    public function seleccionarInfoController(){
        
        $respuesta = InfoModel::seleccionarInfoModel("info");
        
        foreach($respuesta as $row =>$item){
            if(!empty($item["link"])){
                echo '
            <div class="col-xl-4 col-lg-6 col-sm-12 mt-3 mb-3">
                <div class="card cardabout h-100">
                        <img src="'.$item["link"].'" class="img-card" alt="">
                        <h3>'.utf8_encode($item["titulo"]).'</h3>
                        <p>'.utf8_encode($item["contenido"]).'</p>
                    </div>
            </div>';
            }else{
                echo '
                <div class="col-xl-4 col-lg-6 col-sm-12 mt-3 mb-3">
                    <div class="card cardabout h-100">   
                        <h3>'.utf8_encode($item["titulo"]).'</h3>
                        <p>'.utf8_encode($item["contenido"]).'</p>
                    </div>
                </div>';
            }
        }
    }
}