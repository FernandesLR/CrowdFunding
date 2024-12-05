<?php
include '/../Conexao.php';

class UsuarioDAO {

    // Método para cadastrar um novo usuário
    public function cadastrar($usuario) {
        $cnx = Conexao::conectar();

        try {
            // Definindo a query de inserção
            $sql = "INSERT INTO usuarios (email, senha, tipo_usuario) VALUES (:email, :senha, :tipo_usuario)";
            $stmt = $cnx->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':email', $usuario->getEmail());
            $stmt->bindParam(':senha', $usuario->getSenha());
            $stmt->bindParam(':tipo_usuario', $usuario->getTipoUsuario());

            // Executa a query
            $stmt->execute();

            // Retorna o ID do usuário recém-criado
            return $cnx->lastInsertId(); // Retorna o ID inserido no banco de dados
        } catch (PDOException $e) {
            error_log("Erro ao cadastrar usuário: " . $e->getMessage());
            return false; // Retorna false em caso de erro
        }
    }

    // Método para realizar login de um usuário
    public function login($usuario) {
        $conn = Conexao::conectar();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        try {
            // Consulta para buscar o usuário pelo email
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Verifica se o usuário foi encontrado
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                // Login bem-sucedido
                return $usuario; // Retorna o usuário encontrado
            } else {
                // Credenciais inválidas
                return null; // Retorna null se não encontrar ou senha inválida
            }
        } catch (PDOException $e) {
            error_log("Erro ao fazer login: " . $e->getMessage());
            throw new Exception("Erro ao fazer login: " . $e->getMessage()); // Lança exceção para ser tratada
        }
    }
}
?>
