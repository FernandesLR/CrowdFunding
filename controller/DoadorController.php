<?php

require_once '/model/Doador.php';

class DoadorController
{
    private $doadorModel;

    public function criarDoador()
    {
        // Captura os dados enviados via POST
        $dados = $_POST;

        // Validação inicial para garantir que os campos obrigatórios estão presentes
        if (isset($dados['usuario_id'], $dados['cpf'], $dados['data_nascimento'])) {
            // Realiza a criação do doador no modelo
            try {
                $sucesso = $this->doadorModel->criar(
                    $dados['usuario_id'],
                    $dados['cpf'],
                    $dados['data_nascimento']
                );

                if ($sucesso) {
                    // Retorno de sucesso
                    http_response_code(201);
                    echo json_encode(['message' => 'Doador criado com sucesso']);
                } else {
                    // Retorno de erro genérico
                    http_response_code(500);
                    echo json_encode(['message' => 'Erro ao criar doador']);
                }
            } catch (Exception $e) {
                // Tratamento de exceções
                http_response_code(500);
                echo json_encode(['message' => 'Erro interno do servidor', 'error' => $e->getMessage()]);
            }
        } else {
            // Retorno de erro de validação
            http_response_code(400);
            echo json_encode(['message' => 'Dados inválidos: informe usuario_id, cpf e data_nascimento']);
        }
    }
}
