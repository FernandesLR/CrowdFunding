<?php



// Captura o texto da consulta
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($query)) {
    echo json_encode([]);
    exit;
}

try {
    $conexao = Conexao::conectar();
    $sql = "SELECT id, titulo FROM campanhas WHERE titulo LIKE :query LIMIT 10";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':query', '%' . $query . '%');
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultados);
} catch (Exception $e) {
    echo json_encode([]);
    error_log($e->getMessage());
}

?>