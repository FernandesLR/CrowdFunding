<?php

class Donatario {
    private $usuario_id;
    private $cpf_cnpj;
    private $tipo_documento;

    // Getters e Setters

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function getCpfCnpj() {
        return $this->cpf_cnpj;
    }

    public function setCpfCnpj($cpf_cnpj) {
        $this->cpf_cnpj = $cpf_cnpj;
    }

    public function getTipoDocumento() {
        return $this->tipo_documento;
    }

    public function setTipoDocumento($tipo_documento) {
        $this->tipo_documento = $tipo_documento;
    }
}

?>
