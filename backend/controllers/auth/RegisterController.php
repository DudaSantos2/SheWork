<?php

$email = $_POST['email'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$phone = $_POST['phone'];
$cep = $_POST['cep'];
$isCollaborator = $_POST['isCollaborator'];
$servico = $isCollaborator == 1 ? $_POST['servico'] : 'null';

$userDao = new UserDao();
$user = new User($email, $password, $name, $phone, $cep, $isCollaborator, $servico);

$userDao->create($user);

echo json_encode(["resposta" => "Dado inserido com sucesso!"]);