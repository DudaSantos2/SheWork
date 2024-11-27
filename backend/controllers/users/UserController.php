<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "../../DAO/UserDao.php";

function update()
{
    if (isset($_FILES)) {
        $avatar = $_FILES['avatar'];
        if ($avatar['error'] == 1) {
            echo json_encode(['status' => false, 'mensagem' => "Ocorreu um erro ao realizar o upload desta imagem, tente com outra"]);
        }

        $avatarContent = file_get_contents($avatar['tmp_name']);

        $id_user = $_SESSION['user']['id'];

        $userDao = new UserDao();

        if ($userDao->update($id_user, $avatarContent)) {
            $_SESSION['user']['avatar'] = $avatarContent;

            echo json_encode(['status' => true, 'mensagem' => "Usuário atualizado!"]);
        } else {
            echo json_encode(['status' => false, 'mensagem' => "Ocorreu um erro ao atualizar o usuário"]);
        }
    }
}

function delete()
{
    $id = $_SESSION['user']['id'];
    $userDao = new UserDao();

    if ($userDao->delete($id)) {
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
