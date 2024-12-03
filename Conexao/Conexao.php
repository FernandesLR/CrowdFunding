<?php

class Conexao{

    public static function conectar(){
        $cnx = new PDO('mysql:host=localhost;dbname=dbfunding', 'usuario', 'senha');

        return $cnx;

    }
}

?>