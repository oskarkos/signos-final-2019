<?php

class Conexion{
    public function conectar(){
        $link = new PDO(
            "mysql:host=localhost;
            dbname=cmsfinal",
            "root",
            "12345");
        
        return $link;
    }
}