<?php
require_once '../Database.php';
if (!isset($_SESSION)) {
    session_start();
}

function get($cep, $email, $phone)
{
    $db = new Database();

    $where = "";

    if (!empty($cep)) {
        $where .= " AND cep like '%$cep%'";
    }

    if (!empty($email)) {
        $where .= " AND email like '%$email%'";
    }

    if (!empty($phone)) {
        $where .= " AND phone like '%$phone%'";
    }

    $sql = "SELECT 
                users.id, users.email, users.name, users.phone, users.cep, users.isCollaborator, users.avatar, servicos.descricao, avg(reviews.nota) as media, count(reviews.id) as quantidade
            FROM users 
                LEFT JOIN servicos 
                    on users.id_servico = servicos.id
                LEFT JOIN reviews
                    on reviews.id_colaborador = users.id
            WHERE isCollaborator = 1 $where
            GROUP BY users.id
            HAVING quantidade is not null";
    $query = $db->conexao->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
        $result[$key]['avatar'] = base64_encode($value['avatar']);
    }


    if ($result) {
        echo json_encode(["status" => true, "dados" => $result]);
    } else {
        echo json_encode(["status" => true, "dados" => []]);
    }
}

if (isset($_POST)) {
    if ($_POST['metodo'] == 'get') {
        get($_POST['cep'], $_POST['email'], $_POST['phone']);
    }
}