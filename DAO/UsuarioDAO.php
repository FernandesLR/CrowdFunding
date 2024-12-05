<?php
include '/../Conexao.php';

class UsuarioDAO{

    public function cadastrar($usuario){
        $cnx = Conexao::conectar();

        try{
            $sql = "INSERT INTO ";
            $stmt = $cnx->prepare($sql);
            //$stmt->bindParam(':campanha_id', $usuario->, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            error_log("Erro ao consultar doações por campanha: " . $e->getMessage());
            return false;
        }

        

    }
}


?>