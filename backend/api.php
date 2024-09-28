<?php

function getCepData($cep) {
    $url = "https://viacep.com.br/ws/$cep/json/";
    $response = file_get_contents($url);
    return json_decode($response, true);
}

function isBeloHorizonte($data) {
    return isset($data['localidade']) && strtolower($data['localidade']) === 'belo horizonte';
}

if (isset($_GET['cep'])) {
    $cep = $_GET['cep'];
    $data = getCepData($cep);

    if (isset($data['erro']) && $data['erro'] === true) {
        echo json_encode(['status' => 'error', 'message' => 'CEP não encontrado']);
    } elseif (isBeloHorizonte($data)) {
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'CEP não pertence a Belo Horizonte']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'CEP não fornecido']);
}
?>

