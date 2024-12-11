<?php

class Campanha {
    private $id;
    private $donatarioId;
    private $titulo;
    private $descricao;
    private $metaFinanceira;
    private $dataInicio;
    private $dataFim;
    private $status;
    private $imagem;

    // Getters e setters para os outros atributos...

    
    // Getters e Setters
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getDonatarioId() {
        return $this->donatarioId;
    }
    
    public function setDonatarioId($donatarioId) {
        $this->donatarioId = $donatarioId;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }
    
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    public function getDescricao() {
        return $this->descricao;
    }
    
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    public function getMetaFinanceira() {
        return $this->metaFinanceira;
    }
    
    public function setMetaFinanceira($metaFinanceira) {
        $this->metaFinanceira = $metaFinanceira;
    }
    
    public function getDataInicio() {
        return $this->dataInicio;
    }
    
    public function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }
    
    public function getDataFim() {
        return $this->dataFim;
    }
    
    public function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
    }
    
    public function getStatus() {
        return $this->status;
    }
    
    public function setStatus($status) {
        $validStatuses = ['ativa', 'finalizada', 'cancelada'];
        if (in_array($status, $validStatuses)) {
            $this->status = $status;
        } else {
            throw new InvalidArgumentException("Status inválido");
        }
    }
    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    
    
    public function getImagem() {
        return $this->imagem;
    }
}

?>
