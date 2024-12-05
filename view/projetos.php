<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Projetos De Doação</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* Adiciona o box-sizing para facilitar o controle do tamanho dos elementos */
        }

        body {
            display: flex;
            justify-content:center; /* Ajusta os itens para o início da tela */
            align-items: center;
            height: 100vh;
            font-family: "Arial", sans-serif;
            background-image: url("assets/fundo.png");
            background-size: cover;
            gap: 16px; /* Espaço entre os elementos */
            padding: 16px;
            overflow-y: auto; /* Caso o conteúdo ultrapasse a altura da tela, ele será rolável */
        }

        /* Coloca a seção de busca no topo */
        #buscar-projetos {
            position: absolute; /* Posiciona a seção de busca de forma absoluta */
            top: 16px; /* Distância do topo da página */
            left: 50%; /* Alinha horizontalmente ao centro */
            transform: translateX(-50%); /* Ajusta para garantir que esteja centralizado */
            background-color: #f8f8f8; /* Cor de fundo para destacar */
            padding: 20px; /* Aumentei o espaçamento para dar mais espaço ao formulário */
            text-align: center; /* Alinhamento central */
            border-bottom: 2px solid #dddddd; /* Linha de separação */
            width: 100%;
            max-width: 600px; /* Limita a largura máxima da seção de busca */
            z-index: 10; /* Coloca a seção de busca acima de outros elementos */
        }

        /* Contêiner para os cards */
        .card-container {
            display: flex; /* Exibe os cards lado a lado */
            flex-wrap: wrap; /* Permite que os cards que não cabem na linha se movam para a linha seguinte */
            justify-content: center; /* Centraliza os cards */
            gap: 16px; /* Espaço entre os cards */
            width: 100%;
            max-width: 120px; /* Largura máxima do contêiner */
            margin-top: 50px; /* Adiciona um espaçamento entre a seção de busca e os cards */
        }

        /* Estilos para os cards */
        .card {
            background-color: #fff;
            width: 280px;
            height: 380px;
            border-radius: 12px;
            box-shadow: 4px 4px 12px #aaaa;
            padding: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05); /* Efeito de hover para dar mais destaque ao card */
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 12px;
        }

        .card h1 {
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        .card h2 {
            font-size: 1rem;
            color: #666;
            margin-bottom: 8px;
        }

        .card h3 {
            font-size: 1rem;
            margin-bottom: 12px;
        }

        .card span {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 12px;
        }

        .card button {
            background-color: #2192FF;
            height: 36px;
            border: none;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .card button:hover {
            background-color: #1a7bc1;
        }

        /* Ajustes responsivos para telas menores */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            #buscar-projetos input {
                width: 50%; /* Aumenta o input no celular */
            }

            /* Modifica o comportamento dos cards em telas menores */
            .card-container {
                justify-content: center; /* Centraliza os cards */
            }

            .card {
                width: 45%; /* Faz os cards ficarem um pouco menores, mas ainda lado a lado */
                height: min-content; /* Ajusta a altura automaticamente */
            }

            .card img {
                height: 120px; /* Ajusta a altura das imagens nos dispositivos menores */
            }
        }


</style>
<body>
    <div id="buscar-projetos">
        <h2>Buscar Projetos</h2>
        <input type="text" placeholder="Pesquise um projeto...">
        <button>Buscar</button>
      </div>



    <div class="card">
        
        <img src="assets/Terror.png">

        <div>
            <h1>No Andar de Baixo</h1>
            <h2>por Cecília Ramos</h2>
            <h3>4 contos de terror em quadrinhos<br> ambientados dentro de casa</h3>
            <span>R$ 91.865</span>
            <button>Saiba Mais</button>
        </div>
       
    </div>
    
    
    <div class="card">
        
        <img src="assets/PotionRush.png">

        <div>
            <h1>Potion Rush</h1>
            <h2>por Magic Leaf Games</h2>
            <h3>A seus caldeirões! <br>Vai começar a grande competição de porções,com magias e muita diversão</h3>
            <span>R$ 32.903</span>
            <button>Saiba Mais</button>
        </div>
    </div>   

    
    
    
    <div class="card">
        
        <img src="assets/Campanha.png">

        <div>
            <h1>Cartógrafo de Campanha</h1>
            <h2>por Cube dos Tabemeiros</h2>
            <h3>Um livro com mais de 30 mapas para suas mesas!<br> Zero preparação e zero bagunça:só abir e jogar!</h3>
            <span>R$ 26.831</span>
            <button>Saiba Mais</button>
        </div>
    </div>   
</body>
</html>