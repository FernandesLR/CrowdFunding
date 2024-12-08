<?php

class Home {
    public static function index() {
        // Incluir a homepage
        include 'view/homePage.php';
    }
    
    public static function login() {
        // Incluir a página de login
        include './view/cadastroElogin.php';
    }
    
    public static function cadastrar() {
        // Incluir a página de cadastro
        include 'view/cadastroElogin.php';
    }
    
    public static function verProjeto() {
        // Incluir a página de visualizar projeto
        include 'view/projeto.php';
    }
    
    public static function apoiarProjeto() {
        // Incluir a página de apoio ao projeto
        include 'view/pagamento.php';
    }

    public static function pergunta(){
        include 'view/pergunta.php';
    }
    public static function projetos(){
        include 'view/projetos.php';
    }
}


?>
