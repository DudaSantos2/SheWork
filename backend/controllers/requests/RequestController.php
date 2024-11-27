<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "../../DAO/RequestDao.php";
require_once "../../models/Request.php";

function get($cep, $user, $status)
{
    $id = $_SESSION['user']['id'];

    $requestDao = new RequestDao();

    $result = $requestDao->get($cep, $user, $status, $id);

    echo json_encode(["status" => true, "dados" => $result]);
}

function create($id_colaborador, $descricao)
{
    $id_usuario = $_SESSION['user']['id'];

    $request = new Request($id_usuario, $id_colaborador, $descricao);
    $requestDao = new RequestDao();

    if ($requestDao->create($request)) {
        echo json_encode(["status" => true, "mensagem" => "Solicitação criada com sucesso!"]);
    } else {
        echo json_encode(["status" => false, "mensagem" => "Ocorreu um erro ao criar a solicitação!"]);
    }
}

function check($id)
{
    $requestDao = new RequestDao();

    if ($requestDao->check($id)) {
        echo json_encode(["status" => true, "mensagem" => "Solicitação editada com sucesso!"]);
    } else {
        echo json_encode(["status" => false, "mensagem" => "Ocorreu um erro ao criar a solicitação!"]);
    }
}

if (isset($_POST)) {
    if ($_POST["metodo"] == "get") {
        get($_POST['cep'], $_POST['user'], $_POST['status']);
    }

    if ($_POST["metodo"] == "create") {
        create($_POST["id_colaborador"], $_POST["descricao"]);
    }

    if ($_POST["metodo"] == "check") {
        check($_POST["id"]);
    }
}