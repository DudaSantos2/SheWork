<?php
require_once '../Database.php';
if (!isset($_SESSION)) {
    session_start();
}


function update()
{
    $db = new Database();

    if (isset($_FILES)) {
        $avatar = $_FILES['avatar'];
        if ($avatar['error'] == 1) {
            echo json_encode(['status' => false, 'mensagem' => "Ocorreu um erro ao realizar o upload desta imagem, tente com outra"]);
        }

        $avatarContent = file_get_contents($avatar['tmp_name']);

        $id_user = $_SESSION['user']['id'];

        $sql = "update users set avatar = :avatar where id = :id";
        $stmt = $db->conexao->prepare($sql);
        $stmt->bindParam(':avatar', $avatarContent, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id_user, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['user']['avatar'] = $avatarContent;

            echo json_encode(['status' => true, 'mensagem' => "Usuário atualizado!"]);
        } else {
            echo json_encode(['status' => false, 'mensagem' => "Ocorreu um erro ao atualizar o usuário"]);
        }
    }
}

function delete()
{
    $db = new Database();

    $id = $_SESSION['user']['id'];

    $sql = "delete from users where id = $id";
    $stmt = $db->conexao->prepare($sql);
    if ($stmt->execute()) {
        unset($_SESSION['user']);
        echo json_encode(['status' => true, 'mensagem' => "Usuário deletado!"]);
    } else {
        echo json_encode(['status' => false, 'mensagem' => "Ocorreu um erro ao deletar seu usuário"]);
    }
}

if (isset($_POST)) {
    if ($_POST['metodo'] == 'update') {
        update();
    }

    if ($_POST['metodo'] == 'delete') {
        delete();
    }
}
