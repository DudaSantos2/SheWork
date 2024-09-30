<?php
require_once '../Database.php';
if (!isset($_SESSION)) {
    session_start();
}

function get($cep, $user, $status)
{
    $db = new Database();

    $where = "";

    if (!empty($cep)) {
        $where .= " AND u.cep like '%$cep%'";
    }

    if (!empty($user)) {
        $where .= " AND u.name like '%$user%'";
    }

    if (!empty($status) || $status == "0") {
        $where .= " AND requests.status = '$status'";
    }

    $id = $_SESSION['user']['id'];

    $sql = "select requests.*, u.name, u.email, u.phone, u.cep from requests left join users u on u.id = requests.id_usuario where id_colaborador = $id $where";
    $query = $db->conexao->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(["status" => true, "dados" => $result]);
}

function create($id_colaborador, $descricao)
{
    $db = new Database();

    $id_usuario = $_SESSION['user']['id'];

    $sql = "insert into requests (id_usuario, id_colaborador, descricao) values ($id_usuario, $id_colaborador, '$descricao')";
    $stmt = $db->conexao->prepare($sql);
    if ($stmt->execute()) {
        echo json_encode(["status" => true, "mensagem" => "Solicitação criada com sucesso!"]);
    } else {
        echo json_encode(["status" => false, "mensagem" => "Ocorreu um erro ao criar a solicitação!"]);
    }
}

function check($id)
{
    $db = new Database();

    $sql = "update requests set status = 1 where id = $id";
    $stmt = $db->conexao->prepare($sql);
    if ($stmt->execute()) {
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