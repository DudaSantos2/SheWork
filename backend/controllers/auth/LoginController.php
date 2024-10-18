<?php
if (!isset($_SESSION)) {
    session_start();
}

$email = $_POST['email'];
$password = md5($_POST['password']);

$userDao = new UserDao();

$result = $userDao->getByEmail($email);

if (!$result) {
    echo json_encode(["status" => false, "resposta" => "Usuário inexistente!"]);
    return;
}

if ($password != $result['password']) {
    echo json_encode(["status" => false, "resposta" => "Senha incorreta!"]);
    return;
}

$_SESSION['user'] = $result;

$page = "";

if ($result['isCollaborator'] == 1) {
    $page = "/pit/pages/home.php";
} else {
    $page = "/pit/pages/home_cliente.php";
}

echo json_encode(["status" => true, "resposta" => "Usuário logado!", "data" => $page]);
