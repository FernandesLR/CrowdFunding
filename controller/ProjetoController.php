<?php
require_once __DIR__ . '/../DAO/CampanhaDAO.php';
require_once __DIR__ . '/../model/Campanha.php';
require_once __DIR__ . '/../Conexao/Conexao.php';

class ProjetoController {

    // Método para criar uma nova campanha
    public function criarCampanha() {
        // Verifica se o usuário está logado e se é um donatário
        if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo_usuario'] !== 'donatario') {
            header('Location: index.php?action=login');
            exit();
        }

        // Recebe os dados do formulário
        $titulo = $_POST['titulo'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $metaFinanceira = $_POST['meta_financeira'] ?? 0;
        $dataFim = $_POST['data_fim'] ?? null;
        $urlImagem = $_POST['url_imagem'] ?? '';  // URL da imagem fornecida pelo usuário
        $donatarioId = $_SESSION['usuario_id'];
        $recompensa = $_POST['recompensa'] ?? '';
        $pix = $_POST['pix'];

        // Cria um objeto Campanha
        $campanha = new Campanha();
        $campanha->setDonatarioId($donatarioId);
        $campanha->setTitulo($titulo);
        $campanha->setDescricao($descricao);
        $campanha->setMetaFinanceira($metaFinanceira);
        $campanha->setDataFim($dataFim);
        $campanha->setStatus('ativa');
        $campanha->setImagem($urlImagem);
        $campanha->setArrecadado(0);
        $campanha->setRecompensa($recompensa);
        $campanha->setPix($pix);


        // Insere a campanha no banco de dados
        try {
            $campanhaDAO = new CampanhaDAO();
            $campanhaDAO->inserirCampanha($campanha);

            echo "<script>alert('Campanha criada com sucesso!'); window.location.href = 'index.php?action=meus-projetos';</script>";
        } catch (PDOException $e) {
            echo "Erro ao criar campanha: " . $e->getMessage();
        }
    }

    // Método para listar campanhas
    public function listarCampanhas($donatarioId) {
        try {
            $campanhaDAO = new CampanhaDAO();
            return $campanhaDAO->buscarCampanhaPorId($donatarioId);
        } catch (PDOException $e) {
            echo "Erro ao listar campanhas: " . $e->getMessage();
            return [];
        }
    }

    
    // Método para finalizar uma campanha
    public function finalizarCampanha($campanhaId) {
        try {
            $campanhaDAO = new CampanhaDAO();
            $campanhaDAO->atualizarCampanha($campanhaId, 'finalizada');
            echo "<script>alert('Campanha finalizada com sucesso!'); window.location.href = 'index.php?action=meus-projetos';</script>";
        } catch (PDOException $e) {
            echo "Erro ao finalizar campanha: " . $e->getMessage();
        }
    }

    // Método para cancelar uma campanha
    public function cancelarCampanha($campanhaId) {
        try {
            $campanhaDAO = new CampanhaDAO();
            $campanhaDAO->atualizarCampanha($campanhaId, 'cancelada');
            echo "<script>alert('Campanha cancelada com sucesso!'); window.location.href = 'index.php?action=meus-projetos';</script>";
        } catch (PDOException $e) {
            echo "Erro ao cancelar campanha: " . $e->getMessage();
        }
    }
    
}

?>
