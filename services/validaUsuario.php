<?php
    function validda($email, $senha) {
        // Verificar se o email contém apenas os domínios gmail.com ou hotmail.com
        if (!str_contains($email, '@gmail.com') && !str_contains($email, '@hotmail.com')) {
            return false; // Rejeitar qualquer outro domínio
        }

        // Verificar se a senha tem 8 ou mais caracteres
        if (strlen($senha) < 8) {
            return false; // Rejeitar senha muito curta
        }

        return true; // A validação passou
    }

?>
