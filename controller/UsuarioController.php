<?php
require_once 'UserDAO.php'; // Inclui o DAO de usuário (onde o acesso ao banco de dados será feito)
require_once 'DoadorDAO.php'; // DAO para doador
require_once 'DonatarioDAO.php'; // DAO para donatário
require_once 'Usuario.php';

class UsuarioController {

    // Método de cadastro de usuário
    public function cadastrar($postData) {
        // Recebe os dados do formulário
        $email = $postData['email'];
        $password = $postData['password'];
        $cpfCnpj = $postData['cpf_cnpj'];
        $tipoUsuario = $postData['tipoUsuario'];

        // Criptografa a senha
        $senhaHash = password_hash($password, PASSWORD_DEFAULT);

        // Cria um novo usuário
        $usuario = new Usuario();
        $usuario->setEmail($email);
        $usuario->setSenha($senhaHash);
        $usuario->setTipoUsuario($tipoUsuario);

        // Insere o usuário no banco de dados
        $userDAO = new UsuarioDAO();
        $userDAO->cadastrar($usuario);

        // Caso o tipo de usuário seja doador ou donatário, criamos o registro adicional
        if ($tipoUsuario == 'doador') {
            $doador = new Doador();
            $doador->setEmail($usuario->getEmail()); // Definir o e-mail do doador
            $doador->setSenha($usuario->getSenha()); // Definir a senha do doador
            $doador->setTipoUsuario($usuario->getTipoUsuario()); // Definir tipo de usuário (doador)
            $doador->setCpf($cpfCnpj); // Definir o CPF do doador

            $doadorDAO = new DoadorDAO();
            $doadorDAO->inserirDoador($doador); // Chamada para inserir o doador no banco de dados
        } else if ($tipoUsuario == 'donatario') {
            $donatario = new Donatario();
            $donatario->setUsuarioId($usuario->getCod()); // Definir o ID do usuário
            $donatario->setCpfCnpj($cpfCnpj); // Definir o CPF ou CNPJ do donatário
            $donatario->setTipoDocumento('cpf'); // Tipo de documento, aqui configuramos como 'cpf', mas pode ser 'cnpj' dependendo da situação

            $donatarioDAO = new DonatarioDAO();
            $donatarioDAO->inserirDonatario($donatario); // Chamada para inserir o donatário no banco de dados
        }


        // Redireciona após o cadastro
        header("Location: index.php?action=login");
    }

    // Método de login
    public function login($postData) {
        // Recebe os dados de login
        $email = $postData['email'];
        $password = $postData['password'];

        // Verifica o usuário no banco de dados
        $userDAO = new UsuarioDAO();
        $usuario = $userDAO->login($email);

        if ($usuario && password_verify($password, $usuario['senha'])) {
            // Login bem-sucedido, redireciona para a área do usuário
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

            if ($usuario['tipo_usuario'] == 'doador') {
                header("Location: doador_dashboard.php");
            } else {
                header("Location: donatario_dashboard.php");
            }
        } else {
            // Falha no login
            echo "Email ou senha inválidos!";
        }
    }

}
