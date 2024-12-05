<?php

class Usuario {
    private $cod;
    private $email;
    private $senha;
    private $cpf;
    private $cnpj;
    private $tipo_usuario; // Adicionado tipo_usuario

    // Setters
    public function setCod($cod) {
        $this->cod = $cod;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setTipoUsuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    // Getters
    public function getCod() {
        return $this->cod;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getTipoUsuario() {
        return $this->tipo_usuario;
    }
}

?>
