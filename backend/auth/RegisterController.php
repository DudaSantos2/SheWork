<?php
require_once "../Database.php";

$db = new Database();

$email = $_POST['email'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$phone = $_POST['phone'];
$cep = $_POST['cep'];
$isCollaborator = $_POST['isCollaborator'];

$sql = "INSERT INTO users values (default, '$email', '$password', '$name', '$phone', '$cep', $isCollaborator)";

$db->conexao->query($sql);

echo json_encode(["resposta" => "Dado inserido com sucesso!"]);