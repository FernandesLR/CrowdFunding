<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'senha') {
        echo "<h1>Bem-vindo, $username!</h1>";
    } else {
        echo "<h1>Usuário ou senha inválidos!</h1>";
        echo '<a href="index.php">Tente novamente</a>';
    }
} else {
    header('Location: index.php');
}
?>
