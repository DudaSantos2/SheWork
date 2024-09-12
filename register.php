<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, nome, senha FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['nome'];
            header("Location: portal.php");
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>

<form method="post" action="">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <input type="submit" value="Login">
</form>
