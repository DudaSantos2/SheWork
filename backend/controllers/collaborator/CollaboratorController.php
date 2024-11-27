<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "../../DAO/UserDao.php";

function get($cep, $email, $phone)
{
    $userDao = new UserDao();

    $result = $userDao->get($cep, $email, $phone);

    foreach ($result as $key => $value) {
        if (!empty($value)) $result[$key]['avatar'] = base64_encode($value['avatar']);
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