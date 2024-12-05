<?php


class Doador
{
    private $id;
    private $usuarioId;
    private $cpf;
    private $dataNascimento;

    public function __construct($i, $usuID, $c, $dn)
    {
        $this->id = $i;
        $this->usuarioId = $usuID;
        $this->cpf = $c;
        $this->dataNascimento = $dn;
    }


    
    public function getUsuario(){
        return $this->usuarioId;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    
    public function getDataNasc(){
        return $this->dataNascimento;
    }


}
