<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Campanha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus, textarea:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .note {
            font-size: 14px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Criar Nova Campanha</h1>

        <form action="index.php?action=campanha" method="POST">
            <label for="titulo">Título da Campanha</label>
            <input type="text" id="titulo" name="titulo" placeholder="Digite o título da campanha" required>

            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" rows="5" placeholder="Descreva sua campanha" required></textarea>

            <label for="meta_financeira">Meta Financeira (R$)</label>
            <input type="number" id="meta_financeira" name="meta_financeira" step="0.01" placeholder="Exemplo: 1000.00" required>

            <label for="data_fim">Data de Término</label>
            <input type="date" id="data_fim" name="data_fim">

            <!-- Campo para URL da Imagem -->
            <label for="url_imagem">Imagem da Campanha (URL)</label>
            <input type="url" id="url_imagem" name="url_imagem" placeholder="Informe a URL da imagem" required>

            <input type="hidden" name="action" value="campanha">
            <input type="submit" class="btn btn-success" value="Criar campanha">
        </form>



        <p class="note">Preencha todos os campos para criar sua campanha com sucesso.</p>
    </div>
</body>
</html>