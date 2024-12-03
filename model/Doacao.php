<?php

class Doacao
{
    private $id;
    private $usuario_id;
    private $campanha_id;
    private $valor;
    private $data_doacao;

    // Getter e Setter para $id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter e Setter para $usuario_id
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    // Getter e Setter para $campanha_id
    public function getCampanhaId()
    {
        return $this->campanha_id;
    }

    public function setCampanhaId($campanha_id)
    {
        $this->campanha_id = $campanha_id;
    }

    // Getter e Setter para $valor
    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    // Getter e Setter para $data_doacao
    public function getDataDoacao()
    {
        return $this->data_doacao;
    }

    public function setDataDoacao($data_doacao)
    {
        $this->data_doacao = $data_doacao;
    }
}

?>
