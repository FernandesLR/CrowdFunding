<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/login.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;

        }
        button{ color: white;}

        section{
            margin: 10rem auto;
            width: 30%;
        }
        section input{
            background-color: rgb(216, 216, 216);
            border: 1px solid gray;
            padding: 5px;
            border-radius: 5px;
            
        }

        .title{
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 6%;
        }
        h2{
            font-weight: bolder;
        }
        h1{
            color: rgb(14, 160, 14);
            font-weight: bolder;
        }
        p{
            text-align: center;
            font-size: 1.4rem;
        }

        .line1{
            border-bottom: 2px solid rgb(223, 223, 223);
            width: 80%;
            display: flex;
        }
        .line2{
            border-bottom: 2px solid rgb(223, 223, 223);
            width: 80%;
            display: flex;
        }

        .btn-outline-light{
            color: black; 
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); 
            width: 100%;
        }

        .validationWrapper{
            display: grid;
            gap: 10px;
        }



        .btn-success{
            width: 50%;
            margin-right: 1rem;
            height: 3rem;
            background-color: #7cc142;
        }


    </style>
    <title>Login</title>
</head>
<body>
<section class="contentWraper">
    <span class="title">
        <h2>Geek</h2>
        <h1>Funders</h1>
    </span>

    <p>
        <?php echo $_GET['action'] == 'cadastro' ? 'Cadastrar' : 'Login'; ?>
    </p>

    <form action="index.php?action=<?php echo $_GET['action'] == 'cadastro' ? 'cadastrar' : 'login'; ?>" method="POST" class="validationWrapper">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" required>

    <div style="justify-content: space-between; display: flex;">
        <label for="password">Senha</label>
        <a href="" style="color: gray;">
            <?php echo $_GET['action'] == 'cadastro' ? '' : 'Esqueci minha senha'; ?>
        </a>
    </div>
    <input type="password" name="password" id="password" required>

    <?php 
        if ($_GET['action'] == 'cadastro') {
            echo '
            <label for="cpf">CPF/CNPJ</label>
            <input type="text" name="cpf_cnpj" id="cpf" required>

            <label for="tipoUsuario">Tipo de usuário</label>
            <select name="tipoUsuario" id="tipoUsuario" class="form-select">
                <option value="doador">Doador</option>
                <option value="donatario">Donatário</option>
            </select>
            ';
        }
    ?>

    <div style="margin-top: 5%;">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="newsletter" id="flexCheckChecked" value="1" checked>
            <label class="form-check-label" for="flexCheckChecked">
                <?php echo $_GET['action'] == 'cadastro' ? 
                'Quero receber novidades da GeekFunders no meu email' : 
                'Permanecer conectado'; ?>
            </label>
        </div>
    </div>

    <div style="display: flex; width: 100%; margin-top: 5%;">
        <input type="hidden" name="action" value="<?php echo $_GET['action'] == 'cadastro' ? 'cadastrar' : 'login'; ?>">
        
        <input type="submit" onclick="valida(event)" class="btn btn-success" value="<?php echo $_GET['action'] == 'cadastro' ? 'Efetuar cadastro' : 'Fazer login'; ?>">

        <?php 
            if (!($_GET['action'] == 'cadastro')) {
                echo '
                <div style="margin-left: 5%;">
                    <p style="margin: 0; font-size: 1rem; color: rgb(168, 168, 168);">Não tem conta?</p>
                    <a href="index.php?action=cadastro" type="button">Cadastre-se</a>
                </div>
                ';
            }
        ?>
    </div>
</form>


</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function valida(event) {
        // Previne o envio do formulário se a validação falhar
        event.preventDefault();

        // Obtém os valores dos campos de email e senha
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Verifica se o email é do tipo Gmail
        var isValidEmail = email.includes('@gmail.com') || email.includes('@hotmail.com');
        // Verifica se a senha tem mais de 8 caracteres
        var isValidPassword = password.length > 8;

        // Mensagem de erro
        var errorMessage = '';

        // Validações
        if (!isValidEmail) {
            errorMessage += 'O email deve ser do tipo @gmail.com.\n';
        }
        if (!isValidPassword) {
            errorMessage += 'A senha deve ter mais de 8 caracteres.\n';
        }

        // Se houver erro, exibe a mensagem
        if (errorMessage) {
            alert(errorMessage);
        } else {
            // Se as validações passarem, submete o formulário
            document.querySelector('form').submit();
        }
    }
</script>

</body>
</html>
