<?php
require_once "model/usuario.php"

class UsuarioController{

    public function cadastrar(){
        include '../view/login&&cadastro.php'
    }

    public function mostrarHome(){
        include '../view/homePage.php';
    }
}
?>
