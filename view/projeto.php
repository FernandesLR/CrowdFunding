<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geek Hunters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header span {
            font-size: 1.5rem;
            font-weight: bold;
        }
        header input {
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px;
        }
        header a {
            text-decoration: none;
        }
        header button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        header button:hover {
            background-color: #2980b9;
        }
        section {
            padding: 2rem;
            background: #fff;
            margin: 2rem auto;
            width: 90%;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        section h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        section p {
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        section div {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        section div img {
            width: 150px;
            height: 150px;
            border-radius: 8px;
            object-fit: cover;
        }
        section button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        section button:hover {
            background-color: #c0392b;
        }
        .progress-bar {
            width: 100%;
            background: #ddd;
            height: 10px;
            border-radius: 5px;
            margin: 0.5rem 0;
            position: relative;
            overflow: hidden;
        }
        .progress-bar span {
            display: block;
            height: 100%;
            background-color: #2ecc71;
            width: 85%; /* Percentual de progresso */
        }
        footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }

        /* Estilos personalizados para os projetos */
        section > h1 {
            color: #2c3e50;
            font-weight: bold;
        }

        section > p {
            color: #7f8c8d;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .project-info {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .project-info img {
            border-radius: 8px;
            width: 100%;
            max-width: 300px;
            object-fit: cover;
        }

        .progress-bar {
            background: #ecf0f1;
            height: 10px;
            border-radius: 5px;
            margin: 1rem 0;
        }

        .progress-bar div {
            background: #27ae60;
            height: 100%;
            width: 85%; /* Percentual do progresso */
        }

        .project-details {
            flex: 2;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .project-details p {
            color: #7f8c8d;
        }

        .project-details .goal {
            font-size: 1.25rem;
            font-weight: bold;
            color: #27ae60;
        }

        .project-details .status {
            display: flex;
            justify-content: space-between;
            color: #7f8c8d;
        }

        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
            width: 100%;
        }

        button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
  <main>
    <header>
        <span>
            <a href="index.php?action=home" style="text-decoration: none; color:#fff; display:flex;">
                <p>Geek</p>
                <p>Hunters</p>
            </a>
        </span>
        <input type="text" placeholder="Buscar projetos">
        <a href="index.php?acao=criarProjeto">
          <button>Criar Projeto</button>
        </a>
        <a href="index.php?action=Usuario">
          <button class="btnLogin">Login</button>
        </a>
    </header>

    <section>
        <h1>Nome do Projeto</h1>
        <p>Uma breve descrição do projeto, explicando sua finalidade e impacto.</p>
        <div class="project-info">
            <div>
                <img src="https://via.placeholder.com/300" alt="Imagem do Projeto">
            </div>
            <div class="project-details">
                <p class="goal">Arrecadado: R$ 12.980</p>
                <p>185 Doadores</p>
                <div class="progress-bar">
                    <div></div>
                </div>
                <div class="status">
                    <span>85% alcançados</span>
                    <span>25 dias restantes</span>
                </div>
                <p class="goal">Meta: R$ 18.980</p>
            </div>
        </div>
        <button>Apoiar Projeto</button>
    </section>

    <section>
      <ul class="nav nav-underline">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Recompensas</a>
        </li>
      </ul>
        <p>Aqui está a descrição detalhada do projeto. Explicamos os objetivos, como os recursos arrecadados serão utilizados e qual impacto esperamos causar.</p>
    </section>

  </main>
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
      <p>© 2024 Geek Hunters - Todos os direitos reservados.</p>
  </footer>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>
