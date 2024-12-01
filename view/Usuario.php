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

        <!-- Serve para alterar de forma dinâmica o texto de cadastro ou login -->
        <p> 
            <?php echo $_GET['action'] == 'cadastro'? 'Cadastrar': 'Login';?>
        </p>
            


        <div class="validationWrapper">
            <label for="">Email</label>
            <input type="text">
            
            <div style="justify-content: space-between; display: flex;">
                <label for="">Senha</label>
                <a href=""  style="color: gray;">
                    <?php 
                        echo $_GET['action'] == 'cadastro'? 
                        '':
                        'Esquci minha senha'
                    ?>  
                </a>
            </div>
            <input type="text">

        </div>

        <div style="margin-top: 5%;">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                <?php 
                    echo $_GET['action'] == 'cadastro'? 
                    'Quero receber novidades da GeekFunders no meu email':
                    'Permanecer conectado'
                ?>    
                </label>
                
            </div>
            <div style="display: flex; width: 100%; margin-top: 5%;">
                <button type="button" class="btn btn-success">
                <?php 
                    echo $_GET['action'] == 'cadastro'? 
                    'Efetuar cadastro':
                    'Fazer login'
                ?>  
                </button>
                
                <div style="margin-left: 5%;">
                    <p style="margin: 0; font-size: 1rem; color: rgb(168, 168, 168);">Não tem conta?</p>
                    <a href="index.php?action=cadastro" type="submit">Cadastre-se</a>
                </div>
            </div>

        </div>
        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
