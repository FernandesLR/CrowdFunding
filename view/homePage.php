<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo!</title>
    <link rel="stylesheet" href="./estilos/homepage.css">
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

        #carouselExampleAutoplaying {
          z-index: 1;
          position: relative;
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

        .search-container {
            position: relative;
            width: 50%;

        }

        #searchInput {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 0 0 5px 5px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item:hover {
            background: #f0f0f0;
        }

        .carousel-item {
            position: relative;
            margin-bottom: 10%;
        }
        

        .slide-image {
            max-width: 100%;
            height: auto;
            opacity: 0.5; /* Leve transparência na imagem */
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .carousel-caption h2 {
            font-size: 2rem; /* Ajuste o tamanho do título conforme necessário */
            font-weight: bold;
        }

        .carousel-caption button {
            margin-top: 1rem;
        }

        .carousel-item .image-container::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Camada escura sobre a imagem */
            z-index: 1;
        }

        .carousel-caption {
            z-index: 2; /* Garantir que o texto e o botão fiquem acima da camada escura */
        }

        

        .projetosWrapper h2{
            padding-left: 20%;
        }
        .projetosWrapper{
            margin-top: 30%;
        }
        @media(max-width: 1500px){
            .projetosWrapper{
                margin-top: 46%;
            }
        }
        @media(max-width: 900px) {
            .projetosWrapper{
                margin-top: 70%;
            }
            
        }
        .cardWrapper {
            display: flex; /* Define Flexbox */
            flex-direction: row; /* Itens lado a lado (horizontalmente) */
            flex-wrap: wrap; /* Permite quebra de linha se necessário */
            width: 60%;
            margin: auto;
            gap: 2rem; /* Espaço entre os itens */
            margin-top: 2%; /* Espaçamento superior */
        }

        .footer-content {
          margin-top: 2%;
          background-color: #000;
          color: #fff;
          padding: 2%;
          text-align: center;
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
<header style="position: relative;">
    <span>
        <a href="#" style="text-decoration: none; color:#fff; display:flex;">
            <p>Geek</p>
            <p>Hunters</p>
        </a>
    </span>

    <div class="search-container">
        <input 
            type="text" 
            id="searchInput" 
            placeholder="Buscar projetos..." 
            autocomplete="off">
        <div id="suggestions" class="suggestions"></div>
    </div>

    <?php
    // Verifica se o usuário está logado
    $login = isset($_SESSION['usuario_id']);
    
    // Verifica se é donatário
    $isDonatario = $login && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'donatario';

    if ($isDonatario) {
        // Exibe o botão "Criar Projeto" apenas para donatários
        echo '
        <a href="index.php?action=criarProjeto">
            <button>Criar Projeto</button>
        </a>';
    }
    ?>

    <?php
    if ($login) {
        // Menu de usuário logado
        echo '
        <div class="dropdown" style="position: relative;">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#userMenu" aria-expanded="false" aria-controls="userMenu">
                Meu Menu
            </button>
            <div class="collapse" id="userMenu" style="position: absolute; top: 100%; right: 0; width: 200px; z-index: 1000;">
                <div class="card card-body">
                    <a href="index.php?action=perfil">Meu Perfil</a>
                    <a href="index.php?action=meus-projetos">Meus Projetos</a>
                    <a href="index.php?action=logout">Sair</a>
                </div>
            </div>
        </div>';
    } else {
        // Botão de login para visitantes
        echo '
        <a href="index.php?action=login">
            <button class="btnLogin">Login</button>
        </a>';
    }
    ?>
</header>


<section id="carrossel" style="min-height: 40vh; max-height: 40vh; margin-bottom: 20%;">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="border-bottom: 2px solid rgb(143, 143, 143); background-color: rgba(0, 0, 0, 0.781);">
        <div class="carousel-inner">
            <?php
            include_once 'DAO/CampanhaDao.php';  // Inclua a DAO corretamente
            
            // Busca as campanhas ativas
            $campanhas = CampanhaDAO::buscarCampanhasAtivas();
            $ativa = true; // Variável para garantir que apenas o primeiro slide tenha a classe "active"
            foreach ($campanhas as $campanha): 
                $imagem = $campanha->img ? $campanha->img : 'assets/img.jfif'; // Imagem padrão se não houver imagem no banco
                $titulo = $campanha->titulo;
                $id = $campanha->id;
            ?>
                <!-- Slide -->
                <div class="carousel-item <?php echo $ativa ? 'active' : ''; ?>">
                    <img src="<?php echo $imagem; ?>" class="d-block w-100 slide-image" alt="Imagem da campanha" style="justify-self: center; max-width: 60%; height: 600px; min-height: 600px; object-fit: cover; background-color: transparent;">
                    <div class="carousel-caption custom-caption">
                        <h2><?php echo $titulo; ?></h2>
                        <a href="index.php?action=ver-projeto&id=<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger">Conhecer Projeto</button>
                        </a>
                    </div>
                </div>
                <?php $ativa = false; // Garantir que o primeiro slide será ativo ?>
            <?php endforeach; ?>
        </div>

        <!-- Botões de navegação -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>








      <section class="projetosWrapper">
        <h2>Projetos em destaque</h2>

        <div class="cardWrapper">
              <?php
              
              $campanhaDAO = new CampanhaDAO();
              $campanhas = $campanhaDAO->listarCampanhas();
              // Iterar sobre todas as campanhas e gerar os cards
              foreach ($campanhas as $campanha) {
                  // Acessando as propriedades do objeto corretamente com os métodos get
                  $titulo = $campanha->getTitulo(); // Usando o método getTitulo()
                  $descricao = $campanha->getDescricao(); // Usando o método getDescricao()
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