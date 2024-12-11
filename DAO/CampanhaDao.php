<?php
require_once __DIR__ . '/../Conexao/Conexao.php';
require_once __DIR__ . '/../model/Campanha.php';

class CampanhaDAO {
    public function inserirCampanha($campanha) {
        try {
            $conexao = Conexao::conectar();
    
            // SQL para inserir dados da campanha, incluindo imagem (URL)
            $sql = "INSERT INTO campanhas (donatario_id, titulo, descricao, meta_financeira, data_fim, status, img) 
                    VALUES (:donatario_id, :titulo, :descricao, :meta_financeira, :data_fim, :status, :imagem)";
    
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':donatario_id', $campanha->getDonatarioId());
            $stmt->bindValue(':titulo', $campanha->getTitulo());
            $stmt->bindValue(':descricao', $campanha->getDescricao());
            $stmt->bindValue(':meta_financeira', $campanha->getMetaFinanceira());
            $stmt->bindValue(':data_fim', $campanha->getDataFim());
            $stmt->bindValue(':status', $campanha->getStatus());
            $stmt->bindValue(':imagem', $campanha->getImagem(), PDO::PARAM_STR);  // Inserção da URL da imagem
    
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir campanha: " . $e->getMessage();
        }
    }
    

    


    // Método para buscar campanhas por ID
    public function buscarCampanhaPorId($id) {
        $conexao = Conexao::conectar();

        $sql = "SELECT * FROM campanhas WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $campanha = new Campanha();
            $campanha->setId($resultado['id']);
            $campanha->setDonatarioId($resultado['donatario_id']);
            $campanha->setTitulo($resultado['titulo']);
            $campanha->setDescricao($resultado['descricao']);
            $campanha->setMetaFinanceira($resultado['meta_financeira']);
            $campanha->setDataInicio($resultado['data_inicio']);
            $campanha->setDataFim($resultado['data_fim']);
            $campanha->setStatus($resultado['status']);

            return $campanha;
        }

        return null;
    }

    // Método para listar todas as campanhas
    public function listarCampanhas() {
        $conexao = Conexao::conectar();

        $sql = "SELECT * FROM campanhas";
        $stmt = $conexao->query($sql);

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $campanhas = [];
        foreach ($resultados as $resultado) {
            $campanha = new Campanha();
            $campanha->setId($resultado['id']);
            $campanha->setDonatarioId($resultado['donatario_id']);
            $campanha->setTitulo($resultado['titulo']);
            $campanha->setDescricao($resultado['descricao']);
            $campanha->setMetaFinanceira($resultado['meta_financeira']);
            $campanha->setDataInicio($resultado['data_inicio']);
            $campanha->setDataFim($resultado['data_fim']);
            $campanha->setStatus($resultado['status']);

            $campanhas[] = $campanha;
        }

        return $campanhas;
    }

    // Método para atualizar uma campanha
    public function atualizarCampanha($campanhaId, $novoStatus) {
        $conexao = Conexao::conectar();
    
        // Atualiza apenas o status da campanha com o id especificado
        $sql = "UPDATE campanhas SET 
                status = :status
                WHERE id = :id";
    
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':status', $novoStatus);
        $stmt->bindValue(':id', $campanhaId);
    
        // Executa a query
        $stmt->execute();
    }
    

    // Método para excluir uma campanha
    public function excluirCampanha($id) {
        $conexao = Conexao::conectar();

        $sql = "DELETE FROM campanhas WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }
}
?>
