<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php?action=cadastrar" method="POST" class="validationWrapper">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" required>

    <div style="justify-content: space-between; display: flex;">
        <label for="password">Senha</label>
    </div>
    <input type="text" name="password" id="password" required>

    <label for="cpf_cnpj">CPF/CNPJ</label>
    <input type="text" name="cpf_cnpj" id="cpf_cnpj" required>

    <label for="tipoUsuario">Tipo de Usuário</label>
    <select name="tipoUsuario" id="tipoUsuario" class="form-select" required>
        <option value="doador">Doador</option>
        <option value="donatario">Donatário</option>
    </select>

    <div style="margin-top: 5%;">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="newsletter" id="flexCheckChecked" value="1" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Quero receber novidades da GeekFunders no meu email
            </label>
        </div>
    </div>

    <div style="display: flex; width: 100%; margin-top: 5%;">
        <input type="hidden" name="action" value="cadastrar">
        <input type="submit" class="btn btn-success" value="Efetuar cadastro">
    </div>
</form>


</body>
</html>