<?php
require_once __DIR__ . '/../DAO/UsuarioDAO.php'; 
require_once __DIR__ . '/../DAO/DoadorDAO.php'; 
require_once __DIR__ . '/../DAO/DonatarioDAO.php'; 
require_once __DIR__ . '/../model/Usuario.php'; 
require_once __DIR__ . '/../model/Doador.php';
require_once __DIR__ . '/../model/Donatario.php';
require_once __DIR__ . '/../Conexao/Conexao.php'; 
require_once __DIR__ . '/../services/validaUsuario.php';


class UsuarioController {

    // Método de cadastro de usuário
    public function cadastrar() {
        // Recebe os dados do formulário
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpfCnpj = $_POST['cpf_cnpj'];
        $tipoUsuario = $_POST['tipoUsuario'];

        
        

        // Criptografa a senha
        $senhaHash = password_hash($password, PASSWORD_DEFAULT);

        // Cria um novo usuário
        $usuario = new Usuario();
        $usuario->setEmail($email);
        $usuario->setSenha($senhaHash);
        $usuario->setTipoUsuario($tipoUsuario);

        

        // Insere o usuário no banco de dados
        $userDAO = new UsuarioDAO();
        $id = $userDAO->cadastrar($usuario);

        // Caso o tipo de usuário seja doador ou donatário, criamos o registro adicional
        
        if ($tipoUsuario == 'doador') {
            $doador = new Doador();
            $doador->setUsuarioId($usuario->getCod()); // Supondo que o método getId() retorna o ID do usuário cadastrado
            $doador->setCpf($cpfCnpj);
        
            $doadorDAO = new DoadorDAO();
            $doadorDAO->inserirDoador($doador, $id);
        
        }else if ($tipoUsuario == 'donatario') {
            // Criar instância de Donatario
            $donatario = new Donatario();
            $donatario->setUsuarioId($id); // Obtendo o ID do usuário
            $donatario->setCpfCnpj($cpfCnpj); // Setando CPF ou CNPJ
        
            // Inserir o donatário no banco
            $donatarioDAO = new DonatarioDAO();
            $donatarioDAO->inserirDonatario($donatario, $id); // Passa o ID do usuário ao DAO
        }

        // Redireciona após o cadastro
        header("Location: index.php");

        exit();
    }
    

    // Método de login
    public function login() {
        // Recebe os dados do formulário
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Consulta no banco de dados
        $userDAO = new UsuarioDAO();
        $usuario = $userDAO->login($email, $password);
    
        if ($usuario) {
            // Inicializa a sessão e define as variáveis
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
    
            // Redireciona para a página inicial
            header("Location: index.php?action=home");
            exit();
        } else {
            // Redireciona com mensagem de erro
            header("Location: index.php?action=login&error=invalid_credentials");
            exit();
        }
    }

    public function logout() {
        session_start(); // Inicia a sessão
        session_unset(); // Remove todas as variáveis de sessão
        session_destroy(); // Destroi a sessão
        
        // Redireciona para a página inicial ou de login
        header("Location: index.php?action=login");
        exit();
    }
    
    
    
    
    
    
    
        
    
    

}
