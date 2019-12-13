<?php

class Conexion{
    public function conectar(){
        $link = new PDO(
            "mysql:host=localhost;dbname=cmsfinal","root","12345"
        );
        
        return $link;
    }
}

//"mysql:host=mysqlcluster6.registeredsite.com;
//dbname=cms_signos",
//"signos",
//"1075685265Oscar"