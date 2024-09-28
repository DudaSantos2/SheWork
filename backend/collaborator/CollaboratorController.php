<?php
require_once '../Database.php';
if (!isset($_SESSION)) {
    session_start();
}

function getAll()
{
    $db = new Database();

    $sql = "SELECT 
                users.id, users.email, users.name, users.phone, users.cep, users.isCollaborator, users.avatar, servicos.descricao, avg(reviews.nota) as media, count(reviews.id) as quantidade
            FROM users 
                LEFT JOIN servicos 
                    on users.id_servico = servicos.id
                LEFT JOIN reviews
                    on reviews.id_colaborador = users.id
            WHERE isCollaborator = 1";
    $query = $db->conexao->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
        $result[$key]['avatar'] = base64_encode($value['avatar']);
    }

    if ($result) {
        echo json_encode(["status" => true, "dados" => $result]);
    } else {
        echo json_encode(["status" => false, "mensagem" => "Ocorreu um erro ao buscar os colaboradores"]);
    }
}

if (isset($_POST)) {
    if ($_POST['metodo'] == 'getAll') {
        getAll();
    }
}