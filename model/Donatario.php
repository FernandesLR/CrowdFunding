<?php

class Donatario {
    private $usuarioId;
    private $cpfCnpj;

    // Getters e Setters
    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function getCpfCnpj() {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj($cpfCnpj) {
        $this->cpfCnpj = $cpfCnpj;
    }
}
