<?php

require_once __DIR__ . '/../Conexao/Conexao.php';


class DoacaoDAO 
{
    private $conexao = Conexao::conectar();


    public function cadastrar($campanhaId, $doadorId, $valor)
    {
        try {
            $sql = "INSERT INTO doacoes (campanha_id, doador_id, valor, data_doacao) 
                    VALUES (:campanha_id, :doador_id, :valor, NOW())";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':campanha_id', $campanhaId, PDO::PARAM_INT);
            $stmt->bindParam(':doador_id', $doadorId, PDO::PARAM_INT);
            $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao cadastrar doação: " . $e->getMessage());
            return false;
        }
    }

    public function consultarPorDoador($doadorId)
    {
        try {
            $sql = "SELECT d.id, d.valor, d.data_doacao, c.titulo AS campanha_titulo
                    FROM doacoes d
                    INNER JOIN campanhas c ON d.campanha_id = c.id
                    WHERE d.doador_id = :doador_id
                    ORDER BY d.data_doacao DESC";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':doador_id', $doadorId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao consultar doações: " . $e->getMessage());
            return false;
        }
    }


    public function consultarPorCampanha($campanhaId)
    {
        try {
            $sql = "SELECT d.id, d.valor, d.data_doacao, u.nome AS doador_nome
                    FROM doacoes d
                    INNER JOIN usuarios u ON d.doador_id = u.id
                    WHERE d.campanha_id = :campanha_id
                    ORDER BY d.data_doacao DESC";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':campanha_id', $campanhaId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao consultar doações por campanha: " . $e->getMessage());
            return false;
        }
    }
}

?>
