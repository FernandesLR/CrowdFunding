<?php
include './config.env';

class Conexao{

    public function conectar(){
        $dsn = dsn;
        $user = user;
        $pass = pass;
        $db = new PDO($dsn, $user, $pass)
    }
}
?>