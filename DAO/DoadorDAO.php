<?php
require_once __DIR__ . '/../Conexao/Conexao.php';

class DoadorDAO {

    // Método para inserir um novo doador
    public function inserirDoador($doador, $usuarioId) {
        $cnx = Conexao::conectar();
        
        
        // Verificar se o ID foi encontrado
        if ($usuarioId != null) {
            try {
                // Inserção do doador na tabela 'doadores'
                $sql = "INSERT INTO doadores (usuario_id, cpf) VALUES (:usuario_id, :cpf);";
                $stmt = $cnx->prepare($sql);

                // Obtendo os valores do objeto doador
                $id = $usuarioId;  // ID do usuário
                $cpf = $doador->getCpf();  // CPF do doador

                // Vinculando os parâmetros
                $stmt->bindValue(':usuario_id', $id);
                $stmt->bindValue(':cpf', $cpf);

                // Executando a inserção
                $stmt->execute();
                echo "Doador inserido com sucesso!";
            } catch (PDOException $e) {
                // Log de erro
                echo "Erro ao inserir doador: " . $e->getMessage();
            }
        } else {
            // Log para erro caso o usuário não seja encontrado
            echo "Erro: Usuário com o CPF '{$doador->getCpf()}' não encontrado.";
        }
    }

    // Método para buscar o ID do usuário baseado no CPF do doador
    public function getUsuarioIdByCpf($cpf) {
        $cnx = Conexao::conectar();
        try {
            // Corrigindo a consulta para buscar o ID do usuário baseado no CPF
            $sql = "
                SELECT u.id
                FROM usuarios u
                INNER JOIN doadores d ON u.id = d.usuario_id
                WHERE u.email = :cpf
            ";
            $stmt = $cnx->prepare($sql);
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->execute();
    
            // Verificando o retorno
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['id'];
            } else {
                // Caso não encontre
                echo "Nenhum usuário encontrado para o CPF '{$cpf}'.";
                return null;
            }
        } catch (PDOException $e) {
            // Erro ao tentar buscar o usuário
            error_log("Erro ao buscar usuário por CPF: " . $e->getMessage());
            return null;
        }
    }
    
}
?>
