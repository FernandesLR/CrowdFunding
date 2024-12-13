<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo!</title>
    <link rel="stylesheet" href="/estilos/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body{
          margin: 0;
          padding: 0;
          height: 100vh;
          width: 100vw;
          font-family: Arial, Helvetica, sans-serif;
        }



        header{
            padding: 0.4rem;
            display: flex;
            width: 100%;
            border-bottom: 2px solid gray;
            justify-content: space-around;
            background-color: black;
            color: white;
            position: relative;
            height: auto; /* Ajuste se necessário */
            padding: 0.5rem 1rem;
            z-index: 10;
            
        }


        header span{
            display: flex;
            font-weight: bolder;
        }

        header button{
            height: 2rem;
            width: 8rem;
            border-radius: 6px;
            border: none;
            align-self: center;
            background-color: transparent;
            color: white;
            cursor: pointer;
        }

        .btnLogin{
            background-color: rgb(219, 2, 2);
            color: white;
        }

        header input{
            width: 40%;
            border-radius: 6px;
        }

        .projetosWrapper h2{
            padding-left: 20%;
        }
        .projetosWrapper{
            margin-top: 5%;
        }
        .cardWrapper {
            display: flex; /* Define Flexbox */
            flex-direction: row; /* Itens lado a lado (horizontalmente) */
            flex-wrap: wrap; /* Permite quebra de linha se necessário */
            width: 50%;
            margin: auto;
            gap: 2rem; /* Espaço entre os itens */
            margin-top: 10%; /* Espaçamento superior */
        }

        .footer-content {
          margin-top: 2%;
          background-color: #000;
          color: #fff;
          padding: 2%;
        }

        .footer-content h3, .footer-content h4 {
          margin: 0 0 10px 0;
        }

        .footer-content a {
          color: #ff5a5f;
          text-decoration: none;
          display: block;
          margin: 5px 0;
          
        }


    </style>
</head>
<body>
<?php
    include_once 'DAO/CampanhaDao.php';  // Inclua a classe DAO
    
    // Verifica se o ID foi passado pela URL
    if (isset($_SESSION['usuario_id'])) {
        $id = $_SESSION['usuario_id'];  // Obtém o ID do usuário
        $campanhaDAO = new CampanhaDAO();
        $campanha = $campanhaDAO->buscarCampanhaPorId($id, true); // Verifique a implementação do método
    }
?>
<header style="position: relative;">
    <span>
        <a href="index.php?action=home" style="text-decoration: none; color:#fff; display:flex;">
            <p>Geek</p>
            <p>Hunters</p>
        </a>
    </span>

    <input type="text" placeholder="Buscar projetos">

    <?php
        // Verifica se o usuário está logado
        $login = isset($_SESSION['usuario_id']);
        
        // Verifica se é donatário
        $isDonatario = $login && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'donatario';
        
        if ($isDonatario) {
            // Exibe o botão "Criar Projeto" apenas para donatários
            echo '
            <a href="index.php?acao=criarProjeto">
                <button>Criar Projeto</button>
            </a>
            ';
        }
    ?>

        <?php
        echo $login ? 
        '
        <div class="dropdown" style="position: relative;">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#userMenu" aria-expanded="false" aria-controls="userMenu">
                Meu Menu
            </button>
            <div class="collapse" id="userMenu" style="position: absolute; top: 100%; right: 0; width: 200px; z-index: 1000;">
                <div class="card card-body" style="text-decoration: none">
                    <a href="index.php?action=perfil">Meu Perfil</a>
                    <a href="index.php?action=meus-projetos">Meus Projetos</a>
                    <a href="index.php?action=logout">Sair</a>
                </div>
            </div>
        </div>
        ' :
        ' 
        <a href="index.php?action=Usuario">
            <button class="btnLogin">Login</button>
        </a>
        ';
        ?>
</header>

<section class="projetosWrapper">
    <h2>Projetos que apoiei</h2>

    <div class="cardWrapper">
          <?php
          
          if ($campanha) {
              // Se campanha for um objeto ou uma lista de campanhas
              if (is_array($campanha)) {
                  foreach ($campanha as $campanhaItem) {
                      // Acessando as propriedades do objeto corretamente com os métodos get
                      $titulo = $campanhaItem->getTitulo(); 
                      $descricao = $campanhaItem->getDescricao(); 
                      $imagem = $campanhaItem->getImagem(); 
                      $percentualArrecadado = ($campanhaItem->getArrecadado() / $campanhaItem->getMetaFinanceira()) * 100;
                      $diasRestantes = (strtotime($campanhaItem->getDataFim()) - time()) / 86400;
                      ?>
                      <a href="index.php?action=ver-projeto&id=<?= $campanhaItem->getId() ?>" style="text-decoration: none;">
                          <div class="card" style="width: 18rem;">
                              <img src="<?= $imagem ?>" class="card-img-top" alt="Imagem da campanha">
                              <div class="card-body">
                                  <h5 class="card-title"><?= $titulo ?></h5>
                                  <p class="card-text"><?= $descricao ?></p>
                                  <div class="progress" role="progressbar" aria-label="Progresso da campanha" aria-valuenow="<?= $percentualArrecadado ?>" aria-valuemin="0" aria-valuemax="100">
                                      <div class="progress-bar" style="width: <?= $percentualArrecadado ?>%"></div>
                                  </div>
                                  <div style="display: flex; justify-content: space-between; padding: 20px 0">
                                      <span><?= round($percentualArrecadado) ?>% Arrecadado</span>
                                      <span>Falta <?= round($diasRestantes) ?> dias!</span>
                                  </div>
                              </div>
                          </div>
                      </a>
                      <?php
                  }
              } else {
                  // Caso o método retorne uma única campanha
                  $titulo = $campanha->getTitulo(); 
                  $descricao = $campanha->getDescricao(); 
                  $imagem = $campanha->getImagem(); 
                  $percentualArrecadado = ($campanha->getArrecadado() / $campanha->getMetaFinanceira()) * 100;
                  $diasRestantes = (strtotime($campanha->getDataFim()) - time()) / 86400;
                  ?>
                  <a href="index.php?action=ver-projeto&id=<?= $campanha->getId() ?>" style="text-decoration: none;">
                      <div class="card" style="width: 18rem;">
                          <img src="<?= $imagem ?>" class="card-img-top" alt="Imagem da campanha">
                          <div class="card-body">
                              <h5 class="card-title"><?= $titulo ?></h5>
                              <p class="card-text"><?= $descricao ?></p>
                              <div class="progress" role="progressbar" aria-label="Progresso da campanha" aria-valuenow="<?= $percentualArrecadado ?>" aria-valuemin="0" aria-valuemax="100">
                                  <div class="progress-bar" style="width: <?= $percentualArrecadado ?>%"></div>
                              </div>
                              <div style="display: flex; justify-content: space-between; padding: 20px 0">
                                  <span><?= round($percentualArrecadado) ?>% Arrecadado</span>
                                  <span>Falta <?= round($diasRestantes) ?> dias!</span>
                              </div>
                          </div>
                      </div>
                  </a>
                  <?php
              }
          }
          ?>
    </div>
</section>

    <hr>


    <section class="projetosWrapper">
    <h2>Recompensa</h2>

    <div class="cardWrapper">
        <?php
        // Obtenha as campanhas do banco de dados
        $campanhas = $campanhaDAO->buscarCampanhaPorId($id);

        // Verifica se o retorno não é null e é um array/objeto
        if (is_array($campanhas) || is_object($campanhas)) {
            foreach ($campanhas as $campanha) {
                // Acessando as propriedades do objeto corretamente com os métodos get
                $titulo = $campanha->getTitulo(); // Usando o método getTitulo()
                $descricao = $campanha->getRecompensa(); // Usando o método getRecompensa()
                
                $imagem = $campanha->getImagem(); // Usando o método getImagem()
                $percentualArrecadado = ($campanha->getArrecadado() / $campanha->getMetaFinanceira()) * 100; // Exemplo de cálculo
                $diasRestantes = (strtotime($campanha->getDataFim()) - time()) / 86400; // Calculando os dias restantes
        ?>
                <a href="index.php?action=ver-projeto&id=<?= $campanha->getId() ?>" style="text-decoration: none;">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $imagem ?>" class="card-img-top" alt="Imagem da campanha">
                        <div class="card-body">
                            <h5 class="card-title"><?= $titulo ?></h5>
                            <p class="card-text"><?= $descricao ?></p>
                            <div class="progress" role="progressbar" aria-label="Progresso da campanha" aria-valuenow="<?= $percentualArrecadado ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: <?= $percentualArrecadado ?>%"></div>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 20px 0">
                                <span><?= round($percentualArrecadado) ?>% Arrecadado</span>
                                <span>Falta <?= round($diasRestantes) ?> dias!</span>
                            </div>
                        </div>
                    </div>
                </a>
        <?php
            }
        } else {
            echo '<p>Nenhuma campanha encontrada.</p>';
        }
        ?>
    </div>
</section>
<hr>

<section class="projetosWrapper">
    <h2>Projetos que apoiei</h2>

    <div class="cardWrapper">
          <?php
          
          if ($campanha) {
              // Se campanha for um objeto ou uma lista de campanhas
              if (is_array($campanha)) {
                  foreach ($campanha as $campanhaItem) {
                      // Acessando as propriedades do objeto corretamente com os métodos get
                      $titulo = $campanhaItem->getTitulo(); 
                      $descricao = $campanhaItem->getDescricao(); 
                      $imagem = $campanhaItem->getImagem(); 
                      $percentualArrecadado = ($campanhaItem->getArrecadado() / $campanhaItem->getMetaFinanceira()) * 100;
                      $diasRestantes = (strtotime($campanhaItem->getDataFim()) - time()) / 86400;
                      ?>
                      <a href="index.php?action=ver-projeto&id=<?= $campanhaItem->getId() ?>" style="text-decoration: none;">
                          <div class="card" style="width: 18rem;">
                              <img src="<?= $imagem ?>" class="card-img-top" alt="Imagem da campanha">
                              <div class="card-body">
                                  <h5 class="card-title"><?= $titulo ?></h5>
                                  <p class="card-text"><?= $descricao ?></p>
                                  <div class="progress" role="progressbar" aria-label="Progresso da campanha" aria-valuenow="<?= $percentualArrecadado ?>" aria-valuemin="0" aria-valuemax="100">
                                      <div class="progress-bar" style="width: <?= $percentualArrecadado ?>%"></div>
                                  </div>
                                  <div style="display: flex; justify-content: space-between; padding: 20px 0">
                                      <span><?= round($percentualArrecadado) ?>% Arrecadado</span>
                                      <span>Falta <?= round($diasRestantes) ?> dias!</span>
                                  </div>
                              </div>
                          </div>
                      </a>
                      <?php
                  }
              } else {
                  // Caso o método retorne uma única campanha
                  $titulo = $campanha->getTitulo(); 
                  $descricao = $campanha->getDescricao(); 
                  $imagem = $campanha->getImagem(); 
                  $percentualArrecadado = ($campanha->getArrecadado() / $campanha->getMetaFinanceira()) * 100;
                  $diasRestantes = (strtotime($campanha->getDataFim()) - time()) / 86400;
                  ?>
                  <a href="index.php?action=ver-projeto&id=<?= $campanha->getId() ?>" style="text-decoration: none;">
                      <div class="card" style="width: 18rem;">
                          <img src="<?= $imagem ?>" class="card-img-top" alt="Imagem da campanha">
                          <div class="card-body">
                              <h5 class="card-title"><?= $titulo ?></h5>
                              <p class="card-text"><?= $descricao ?></p>
                              <div class="progress" role="progressbar" aria-label="Progresso da campanha" aria-valuenow="<?= $percentualArrecadado ?>" aria-valuemin="0" aria-valuemax="100">
                                  <div class="progress-bar" style="width: <?= $percentualArrecadado ?>%"></div>
                              </div>
                              <div style="display: flex; justify-content: space-between; padding: 20px 0">
                                  <span><?= round($percentualArrecadado) ?>% Arrecadado</span>
                                  <span>Falta <?= round($diasRestantes) ?> dias!</span>
                              </div>
                          </div>
                      </div>
                  </a>
                  <?php
              }
          }
          ?>
    </div>
</section>



      
  <footer>
    <div class="footer-content">
      <div class="info">
        <h3>Start Crowdfunding</h3>
        <p>Fund your cause or project today!</p>
      </div>
      <div class="links">
        <h4>About Us</h4>
        <a href="#">Terms of Service</a>
        <a href="#">Privacy Policy</a>
      </div>
    </div>
  </footer>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
  </html>