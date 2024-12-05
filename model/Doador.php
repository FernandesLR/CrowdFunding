<?php

class Doador extends Usuario {
    private $cpf; // CPF do doador

    // Setter para CPF do doador
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    // Getter para CPF do doador
    public function getCpf() {
        return $this->cpf;
    }
}

?>
