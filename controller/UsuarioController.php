<?php
require_once "model/usuario.php";
require_once 'Usuario.php';


class UsuarioController
{
    private $usuarioModel;

    public function listarUsuarios()
    {
        $usuarios = $this->usuarioModel->listarTodos();
        header('Content-Type: application/json');
        echo json_encode($usuarios);
    }

    public function exibirUsuario($id)
    {
        $usuario = $this->usuarioModel->encontrarPorId($id);
        if ($usuario) {
            header('Content-Type: application/json');
            echo json_encode($usuario);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Usuário não encontrado']);
        }
    }

    public function criarUsuario($dados)
    {
        if (isset($dados['nome'], $dados['email'], $dados['senha'], $dados['tipo_usuario'])) {
            $sucesso = $this->usuarioModel->criar(
                $dados['nome'],
                $dados['email'],
                $dados['senha'],
                $dados['tipo_usuario']
            );

            if ($sucesso) {
                http_response_code(201);
                echo json_encode(['message' => 'Usuário criado com sucesso']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Erro ao criar usuário']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Dados inválidos']);
        }
    }
}

?>
