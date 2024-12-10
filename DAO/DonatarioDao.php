<?php
require_once __DIR__ . '/../Conexao/Conexao.php';

class DonatarioDAO {

    // Método para inserir um novo donatário
    public function inserirDonatario($donatario, $usuarioId) {
        $cnx = Conexao::conectar();

        // Verificar se o ID foi encontrado
        if ($usuarioId != null) {
            try {
                // Inserção do donatário na tabela 'donatarios'
                $sql = "INSERT INTO donatarios (usuario_id, cpf_cnpj) VALUES (:usuario_id, :cpf_cnpj);";
                $stmt = $cnx->prepare($sql);

                // Obtendo os valores do objeto donatário
                $cpfCnpj = $donatario->getCpfCnpj();  // CPF ou CNPJ do donatário

                // Vinculando os parâmetros
                $stmt->bindValue(':usuario_id', $usuarioId);
                $stmt->bindValue(':cpf_cnpj', $cpfCnpj);

                // Executando a inserção
                $stmt->execute();
            } catch (PDOException $e) {
                // Log de erro
                echo "Erro ao inserir donatário: " . $e->getMessage();
            }
        } else {
            // Log para erro caso o usuário não seja encontrado
            echo "Erro: Usuário com o CPF/CNPJ '{$donatario->getCpfCnpj()}' não encontrado.";
        }
    }

    // Método para buscar o ID do usuário baseado no CPF/CNPJ do donatário
    public function getUsuarioIdByCpfCnpj($cpfCnpj) {
        $cnx = Conexao::conectar();
        try {
            // Consulta para buscar o ID do usuário baseado no CPF/CNPJ
            $sql = "
                SELECT u.id
                FROM usuarios u
                INNER JOIN donatarios d ON u.id = d.usuario_id
                WHERE d.cpf_cnpj = :cpf_cnpj
            ";
            $stmt = $cnx->prepare($sql);
            $stmt->bindParam(':cpf_cnpj', $cpfCnpj, PDO::PARAM_STR);
            $stmt->execute();
    
            // Verificando o retorno
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['id'];
            } else {
                // Caso não encontre
                echo "Nenhum usuário encontrado para o CPF/CNPJ '{$cpfCnpj}'.";
                return null;
            }
        } catch (PDOException $e) {
            // Erro ao tentar buscar o usuário
            error_log("Erro ao buscar usuário por CPF/CNPJ: " . $e->getMessage());
            return null;
        }
    }
}
?>
