<?php

class Doador
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO('mysql:host=localhost;dbname=sua_base', 'usuario', 'senha');
    }

    public function criar($usuario_id, $cpf, $data_nascimento)
    {
        $query = "INSERT INTO doadores (usuario_id, cpf, data_nascimento) VALUES (:usuario_id, :cpf, :data_nascimento)";
        $stmt = $this->conexao->prepare($query);

        return $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':cpf' => $cpf,
            ':data_nascimento' => $data_nascimento,
        ]);
    }
}
