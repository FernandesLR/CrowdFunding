<?php
require_once __DIR__ . '/../DAO/UsuarioDAO.php'; 
require_once __DIR__ . '/../DAO/DoadorDAO.php'; 
require_once __DIR__ . '/../DAO/DonatarioDAO.php'; 
require_once __DIR__ . '/../model/Usuario.php'; 
require_once __DIR__ . '/../model/Doador.php';
require_once __DIR__ . '/../Conexao/Conexao.php'; 


class UsuarioController {

    // Método de cadastro de usuário
    public function cadastrar() {
        // Recebe os dados do formulário
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpfCnpj = $_POST['cpf_cnpj'];
        $tipoUsuario = $_POST['tipoUsuario'];

        echo "Email = ".$email;
        echo "\nsenha = =".$password;
        echo "\n cpf/cnpj = ".$cpfCnpj;
        echo "    \ntipousuario  = ".$tipoUsuario;
        
        

        // Criptografa a senha
        $senhaHash = password_hash($password, PASSWORD_DEFAULT);

        // Cria um novo usuário
        $usuario = new Usuario();
        $usuario->setEmail($email);
        $usuario->setSenha($senhaHash);
        $usuario->setTipoUsuario($tipoUsuario);

        print_r("Dentro do usuario: ".$usuario->getEmail()."\n\n".$usuario->getSenha());

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
            $donatario = new Donatario();
            $donatario->setUsuarioId($usuario->getCod());
            $donatario->setCpfCnpj($cpfCnpj);
            $donatario->setTipoDocumento('cpf');

            $donatarioDAO = new DonatarioDAO();
            $donatarioDAO->inserirDonatario($donatario);
        }

        // Redireciona após o cadastro


        exit();
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
