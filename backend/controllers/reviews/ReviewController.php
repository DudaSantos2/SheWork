<?php
if (!isset($_SESSION)) {
    session_start();
}

function create($id_colaborador, $nota)
{
    $id_usuario = $_SESSION['user']['id'];

    $review = new Review($id_usuario, $id_colaborador, $nota);
    $reviewDao = new ReviewDao();

    if ($reviewDao->create($review)) {
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