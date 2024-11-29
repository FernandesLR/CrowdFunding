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
            opacity: 0.5a; /* Leve transparência na imagem */
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
        .cardWrapper{
            display: flex;
            width: 100%;
            justify-content: center;
            gap: 2rem;
            margin-top: 10%;
        }

        .footer-content {
          background-color: #000;
          color: #fff;
          padding: 20px;
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
    <header>
        <span>
            <p>Geek</p>
            <p>Hunters</p>
        </span>

        <input type="text" placeholder="Buscar projetos">


        <a href="index.php?acao=criarProjeto">
          <button>Criar Projeto</button>
        </a>


        <a href="index.php?action=Usuario">
          <button class="btnLogin">Login</button>

        </a>

    </header>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="border-bottom: 2px solid rgb(143, 143, 143); background-color: rgba(0, 0, 0, 0.781);">
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <img src="assets/img.jfif" class="d-block w-100 slide-image" alt="..." style="justify-self: center; max-width: 60%; background-color: transparent">
          <div class="carousel-caption custom-caption">
            <h2>Título Slide 1</h2>
            <button type="button" class="btn btn-danger">Conhecer Projeto</button>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
          <img src="assets/img2.jfif" class="d-block w-100 slide-image" alt="..." style="justify-self: center; max-width: 60%;">
          <div class="carousel-caption custom-caption">
            <h2>Título Slide 2</h2>
            <button type="button" class="btn btn-danger">Conhecer Projeto</button>
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
            
            <div class="card" style="width: 18rem;">
                <img src="assets/img.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
    
              <div class="card" style="width: 18rem;">
                <img src="assets/img.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
    
              <div class="card" style="width: 18rem;">
                <img src="assets/img.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
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