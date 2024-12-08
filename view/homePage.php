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

        .carousel-item {
            position: relative;
        }

        .image-container {
            position: relative;
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
    <header style="position: relative;">
        <span>
            <a href="#" style="text-decoration: none; color:#fff; display:flex;">
                <p>Geek</p>
                <p>Hunters</p>
            </a>
        </span>

        <input type="text" placeholder="Buscar projetos">

        <a href="index.php?acao=criarProjeto">
            <button>Criar Projeto</button>
        </a>

        <?php
        $login = false;

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
        <a href="index.php?action=login">
            <button class="btnLogin">Login</button>
        </a>
        ';
        ?>
    </header>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="border-bottom: 2px solid rgb(143, 143, 143); background-color: rgba(0, 0, 0, 0.781);">
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <img src="assets/img.jfif" class="d-block w-100 slide-image" alt="..." style="justify-self: center; max-width: 60%; background-color: transparent">
          <div class="carousel-caption custom-caption">
            <h2>Título Slide 1</h2>
            <a href="index.php?action=ver-projeto">
              <button type="button" class="btn btn-danger">Conhecer Projeto</button>
            </a>
          </div>
        </div>
        <!-- Slide 2 -->

        
        <div class="carousel-item">
          <img src="assets/img2.jfif" class="d-block w-100 slide-image" alt="..." style="justify-self: center; max-width: 60%;">
          <div class="carousel-caption custom-caption">
            <h2>Título Slide 2</h2>
            <a href="index.php?action=ver-projeto">
              <button type="button" class="btn btn-danger">Conhecer Projeto</button>
            </a>
          </div>
        </div>
        </div>
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





      <section class="projetosWrapper">
        <h2>Projetos em destaque</h2>
        <div class="cardWrapper">

          <a href="index.php?action=ver-projeto" style="text-decoration: none;">
            <div class="card" style="width: 18rem;">
                  <img src="assets/img.jfif" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: 25%"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 20px 0">
                      <span>25% Arrecadado</span>
                      
                      <span>Falta 19 dias!</span>
  
                    </div>
                  </div>
              </div>


          </a>
          <a href="index.php?action=ver-projeto" style="text-decoration: none;">
            <div class="card" style="width: 18rem;">
                  <img src="assets/img.jfif" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: 25%"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 20px 0">
                      <span>25% Arrecadado</span>
                      
                      <span>Falta 19 dias!</span>
  
                    </div>
                  </div>
              </div>


          </a>

          <a href="index.php?action=ver-projeto" style="text-decoration: none;">
            <div class="card" style="width: 18rem;">
                  <img src="assets/img.jfif" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: 25%"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 20px 0">
                      <span>25% Arrecadado</span>
                      
                      <span>Falta 19 dias!</span>
  
                    </div>
                  </div>
              </div>


          </a>
          

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