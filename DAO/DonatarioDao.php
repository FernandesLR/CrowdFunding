<?php
include '/../Conexao.php'; // Inclui a classe de conexão com o banco de dados

class DonatarioDAO {
    
    // Função para inserir um novo donatário no banco de dados
    public function inserirDonatario(Donatario $donatario) {
        // Conecta ao banco de dados
        $cnx = Conexao::conectar();
        
        try {
            // SQL para inserir um novo donatário
            $sql = "INSERT INTO donatarios (usuario_id, cpf_cnpj, tipo_documento) 
                    VALUES (:usuario_id, :cpf_cnpj, :tipo_documento)";
            
            // Prepara a consulta
            $stmt = $cnx->prepare($sql);
            
            // Vincula os parâmetros à consulta
            $stmt->bindParam(':usuario_id', $donatario->getUsuarioId(), PDO::PARAM_INT);
            $stmt->bindParam(':cpf_cnpj', $donatario->getCpfCnpj(), PDO::PARAM_STR);
            $stmt->bindParam(':tipo_documento', $donatario->getTipoDocumento(), PDO::PARAM_STR);
            
            // Executa a consulta
            $stmt->execute();
            
            // Retorna verdadeiro se a inserção for bem-sucedida
            return true;
        } catch (PDOException $e) {
            // Caso ocorra um erro, exibe a mensagem de erro
            error_log("Erro ao inserir donatário: " . $e->getMessage());
            return false;
        }
    }

    // Função para buscar um donatário por ID (caso necessário)
    public function buscarDonatarioPorId($id) {
        $cnx = Conexao::conectar();
        
        try {
            // SQL para buscar o donatário pelo ID
            $sql = "SELECT * FROM donatarios WHERE usuario_id = :usuario_id";
            
            // Prepara a consulta
            $stmt = $cnx->prepare($sql);
            
            // Vincula o parâmetro à consulta
            $stmt->bindParam(':usuario_id', $id, PDO::PARAM_INT);
            
            // Executa a consulta
            $stmt->execute();
            
            // Retorna o resultado como um array associativo
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Caso ocorra um erro, exibe a mensagem de erro
            error_log("Erro ao buscar donatário por ID: " . $e->getMessage());
            return null;
        }
    }
}
?>
