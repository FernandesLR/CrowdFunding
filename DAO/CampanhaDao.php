<?php
require_once __DIR__ . '/../Conexao/Conexao.php';
require_once __DIR__ . '/../model/Campanha.php';

class CampanhaDAO {
    public function inserirCampanha($campanha) {
        try {
            $conexao = Conexao::conectar();
    
            // SQL para inserir dados da campanha, incluindo imagem (URL)
            $sql = "INSERT INTO campanhas (donatario_id, titulo, descricao, meta_financeira, data_fim, status, img, recompensas, pix) 
                    VALUES (:donatario_id, :titulo, :descricao, :meta_financeira, :data_fim, :status, :imagem, :recompensas, :pix)";
    
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':donatario_id', $campanha->getDonatarioId());
            $stmt->bindValue(':titulo', $campanha->getTitulo());
            $stmt->bindValue(':descricao', $campanha->getDescricao());
            $stmt->bindValue(':meta_financeira', $campanha->getMetaFinanceira());
            $stmt->bindValue(':data_fim', $campanha->getDataFim());
            $stmt->bindValue(':status', $campanha->getStatus());
            $stmt->bindValue(':imagem', $campanha->getImagem(), PDO::PARAM_STR);  // Inserção da URL da imagem
            $stmt->bindValue(':recompensas', $campanha->getRecompensa());
            $stmt->bindValue(':pix', $campanha->getPix());

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir campanha: " . $e->getMessage();
        }
    }
    

    


    // Método para buscar campanhas por ID
    public function buscarCampanhaPorId($id, $idDonatario = false) {
        $conexao = Conexao::conectar();
        if($idDonatario){
            $sql = "SELECT * FROM campanhas WHERE donatario_id = :id";
        }else{
            $sql = "SELECT * FROM campanhas WHERE id = :id";
        }
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
            $campanha->setImagem($resultado['img']);
            $campanha->setRecompensa($resultado['recompensas']);
            $campanha->setPix($resultado['pix']);

            return $campanha;
        }

        return null;
    }

    // Método para listar todas as campanhas
    public function listarCampanhas() {
        try {
            $conexao = Conexao::conectar();
            
            $sql = "SELECT * FROM campanhas WHERE status = 'ativa'";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            
            $campanhas = [];
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $campanha = new Campanha();
                $campanha->setId($row['id']);
                $campanha->setTitulo($row['titulo']);
                $campanha->setDescricao($row['descricao']);
                $campanha->setImagem($row['img']); // Se você tiver um campo imagem no banco
                $campanha->setMetaFinanceira($row['meta_financeira']); // Exemplo de arrecadado, se existir
                $campanha->setMetaFinanceira($row['meta_financeira']);
                $campanha->setDataFim($row['data_fim']);
                $campanha->setStatus($row['status']);
                
                $campanhas[] = $campanha; // Adiciona o objeto à lista
            }
            
            return $campanhas; // Retorna a lista de objetos Campanha
        } catch (PDOException $e) {
            echo "Erro ao listar campanhas: " . $e->getMessage();
            return [];
        }
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



    public static function buscarCampanhasAtivas() {
        // Conexão com o banco de dados
        $conexao = Conexao::conectar();
        
        // Consulta SQL para obter campanhas ativas
        $sql = "SELECT id, titulo, img FROM campanhas WHERE status = 'ativa' LIMIT 5"; // Ajuste o limite conforme necessário
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        
        // Retorna os resultados como um array de objetos
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
