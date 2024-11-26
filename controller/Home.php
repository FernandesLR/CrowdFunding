<?php

class Home {
    public static function index() {
        // Incluir a homepage
        include 'view/homePage.php';
    }
    
    public static function login() {
        // Incluir a página de login
        include './view/Usuario.php';
    }
    
    public static function register() {
        // Incluir a página de cadastro
        include 'view/registerPage.html';
    }
    
    public static function viewProject() {
        // Incluir a página de visualizar projeto
        include 'view/projectPage.html';
    }
    
    public static function supportProject() {
        // Incluir a página de apoio ao projeto
        include 'view/paymentPage.html';
    }
}

?>
