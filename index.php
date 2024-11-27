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
            Home::register();
            break;
        case 'register':
            // Redireciona para a página de cadastro
            Home::register();
            break;
        case 'view_project':
            // Redireciona para a página de visualizar projeto
            Home::viewProject();
            break;
        case 'support_project':
            // Redireciona para a página de apoio ao projeto
            Home::supportProject();
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
