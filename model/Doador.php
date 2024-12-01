<?php

class Doador
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function criar($usuarioId, $cpf, $dataNascimento)
    {
        $stmt = $this->db->prepare("
            INSERT INTO doadores (usuario_id, cpf, data_nascimento)
            VALUES (:usuario_id, :cpf, :data_nascimento)
        ");
        $stmt->bindParam(':usuario_id', $usuarioId);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_nascimento', $dataNascimento);

        return $stmt->execute();
    }

    public function encontrarPorUsuarioId($usuarioId)
    {
        $stmt = $this->db->prepare("SELECT * FROM doadores WHERE usuario_id = :usuario_id");
        $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
