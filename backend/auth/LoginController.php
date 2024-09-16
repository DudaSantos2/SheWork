<?php
require_once '../Database.php';

$db = new Database();

$email = $_POST['email'];
$password = md5($_POST['password']);

$userExistsSql = "select * from users where email = '$email'";
$queryUserExists = $db->conexao->query($userExistsSql);
$result = $queryUserExists->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    echo json_encode(["status" => false, "resposta" => "Usuário inexistente!"]);
    return;
}

if ($password != $result['password']) {
    echo json_encode(["status" => false, "resposta" => "Senha incorreta!"]);
    return;
}

echo json_encode(["status" => true, "resposta" => "Usuário logado!"]);
