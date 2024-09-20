<?php
require_once '../Database.php';

$db = new Database();

$userExistsSql = "select * from servicos";
$queryUserExists = $db->conexao->query($userExistsSql);
$result = $queryUserExists->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(["status" => true, "dados" => $result]);
