<?php

require_once '../Database.php';
if (!isset($_SESSION)) {
    session_start();
}

function create($id_colaborador, $nota)
{
    $db = new Database();

    $id_usuario = $_SESSION['user']['id'];

    $sql = "insert into reviews (id_usuario, id_colaborador, nota) values ($id_usuario, $id_colaborador, $nota)";
    $stmt = $db->conexao->prepare($sql);
    if ($stmt->execute()) {
        echo json_encode(["status" => true, "mensagem" => "Avaliação enviada com sucesso!"]);
    } else {
        echo json_encode(["status" => false, "mensagem" => "Ocorreu um erro ao enviar a avaliação!"]);
    }
}

if (isset($_POST)) {
    if ($_POST["metodo"] == "create") {
        create($_POST['id_colaborador'], $_POST['nota']);
    }
}