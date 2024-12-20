<?php

// ESSE É ARQUIVO DE ROTAS DO SISTEMA

session_start(); // Sempre inicializar no topo

include 'controller/Home.php';
include 'controller/UsuarioController.php';
include 'controller/ProjetoController.php';

// Inicializa o controlador de usuário
$usuario = new UsuarioController();
$campanha = new ProjetoController();


// Função para lidar com GET
// Função para lidar com GET
function handleGet($action) {
    global $usuario; // Para acessar o controlador de usuário

    switch ($action) {
        case 'login':
            Home::login();
            break;
        case 'cadastro':
            Home::cadastrar();
            break;
        case 'ver-projeto':
            Home::verProjeto();
            break;
        case 'apoiar-Projeto':
            Home::apoiarProjeto();
            break;
        case 'meus-projetos':
            Home::projetos();
            break;
        case 'logout': // Novo caso para logout
            $usuario->logout();
            break;
        case 'home':
            Home::index();
            break;
        case 'criarProjeto':
            Home::cadastrarProjeto();
            break;
        default:
            Home::index();
            break;
    }
}


// Função para lidar com POST
function handlePost($action, $usuario, $campanha) {
    
    switch ($action) {
        case 'cadastrar':
            $usuario->cadastrar();
            break;
        case 'login':
            $usuario->login();
            break;
        case 'campanha':
            $campanha->criarCampanha();
            break;
        default:
            Home::index();
            break;
    }
}

// Determina o método da requisição
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    handleGet($_GET['action']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    handlePost($_POST['action'], $usuario, $campanha);
} else {
    Home::index();
}
