<?php

include 'controller/Home.php';

// Verifica o parâmetro 'action' da URL
if (isset($_GET['action'])) {
    
    switch ($_GET['action']) {
        case 'Usuario':
            // Redireciona para a página de login
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
        default:
            // Página inicial
            Home::index();
            break;
    }
} else {
    // Se não houver ação, exibe a página inicial
    Home::index();
}

?>
