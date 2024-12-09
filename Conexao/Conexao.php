<?php

class Conexao{

    public static function conectar(){
        $cnx = new PDO('mysql:host=localhost;dbname=dbfunding', 'root', 'admin');

        

        return $cnx;

    }
}

?>