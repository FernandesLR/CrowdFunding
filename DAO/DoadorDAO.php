<?php
include '/../Conexao.php';

class DoadorDAO {

    public function inserirDoador($doador) {
        $cnx = Conexao::conectar();

        try {
            // Prepara a SQL para inserir os dados do doador
            $sql = "INSERT INTO doadores (usuario_id, cpf) VALUES (:usuario_id, :cpf)";
            $stmt = $cnx->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':usuario_id', $doador->getUsuarioId(), PDO::PARAM_INT);
            $stmt->bindParam(':cpf', $doador->getCpf(), PDO::PARAM_STR);

            // Executa a query
            $stmt->execute();

            // Retorna verdadeiro se a inserção for bem-sucedida
            return true;
        } catch (PDOException $e) {
            // Caso ocorra um erro, loga e retorna false
            error_log("Erro ao inserir doador: " . $e->getMessage());
            return false;
        }
    }
}
?>
