<?php

require_once '/model/Doador.php';

class DoadorController
{
    private $doadorModel;

    public function __construct($pdo)
    {
        $this->doadorModel = new Doador($pdo);
    }

    public function criarDoador($dados)
    {
        if (isset($dados['usuario_id'], $dados['cpf'], $dados['data_nascimento'])) {
            $sucesso = $this->doadorModel->criar(
                $dados['usuario_id'],
                $dados['cpf'],
                $dados['data_nascimento']
            );

            if ($sucesso) {
                http_response_code(201);
                echo json_encode(['message' => 'Doador criado com sucesso']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Erro ao criar doador']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Dados inválidos']);
        }
    }
}
