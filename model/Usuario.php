<?php

class Usuario{
    private $cod;
    private $email;
    private $senha;
    private $cpf;
    private $cnpj;


    public function __construct($e, $s, $cp=null, $cn=null) {
        $this->email = $e;
        $this->senha = $s;
        $this->cpf = $cp;
        $this->cnpj = $cn;
    }

    public function getCod(){
        return $this->cod;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
}

?>