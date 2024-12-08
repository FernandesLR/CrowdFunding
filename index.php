<?php

include 'controller/Home.php';
include 'controller/UsuarioController.php';
$usuario = new UsuarioController();

// Verifica o parâmetro 'action' da URL
if (isset($_GET['action'])) {
    
    switch ($_GET['action']) {
        case 'login':
            Home::login();
            break;
        case 'cadastro':
            Home::cadastrar();
            break;
        case 'ver-projeto':
            // Redireciona para a página de visualizar projeto
            Home::verProjeto();
            break;
        case 'apoiar-Projeto':
            // Redireciona para a página de apoio ao projeto
            Home::apoiarProjeto();
            break;
        case 'meus-projetos':
            Home::projetos();
            break;
        default:
            // Página inicial
            Home::index();
            break;
    }
} else {
    // Se não houver ação, exibe a página inicial
    Home::index();
}


if (isset($_POST['action'])) {
    
    switch ($_POST['action']) {
        /*
        case 'login':
            Home::login();
            break;*/
        case 'cadastrar':
            $usuario->cadastrar();
            break;

        default:
            break;
    }
}





?>
