<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: /pit/painel.php?go=login');
} else if ($_SESSION['user']['isCollaborator'] == '0') {
    header('Location: /pit/painel.php?go=login');
}

//var_dump($_SESSION['user']);

?>

<html lang="pt-br">
<head>
    <?php include_once('../head.php') ?>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<div class="container-fluid">
    <?php include "../components/navbar_home.php" ?>
    <div class="container mt-3">
        <p style="font-size: 19px; font-weight: 600" id="cont">Nenhuma solicitação ativa</p>
        <div class="row row-cols-1 row-cols-md-2 g-4" id="container-cards">

        </div>
    </div>
</div>

<div class="modal fade" id="modal-contatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Contato</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-phone" style="color: #454545"></i>
                        <p class="m-0" id="phone-contato"></p>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-envelope"></i>
                        <p class="m-0" id="email-contato"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary"><a style="text-decoration: none; color: white "
                                                                 id="envia-email-contato" href="">Enviar email</a>
                </button>
            </div>
        </div>
    </div>
</div>

<?php include('../scripts.php') ?>

<script>
    $(document).ready(() => {
        function buscaSolicitacoes() {
            const form = new FormData();
            form.append("metodo", "get")

            fetch("../backend/requests/RequestController.php", {method: "POST", body: form}).then(async (res) => {
                const requests = await res.json()

                if (requests.dados.length === 0) {
                    $('#cont').html('Nenhuma solicitação ativa!');
                } else if (requests.dados.length === 1) {
                    $('#cont').html(`${requests.dados.length} solicitação ativa!`);
                } else {
                    $('#cont').html(`${requests.dados.length} solicitações ativas!`);
                }

                requests.dados.forEach((request) => {
                    const card = `<div class="col">
                <div class="card">
                    <div class="card-header">
                        Solicitação
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${request.name}</h5>
                        <p class="card-text">${request.descricao}</p>
                        <button type="button" onclick="atualizaModal('${request.phone}', '${request.email}')" data-bs-toggle="modal" data-bs-target="#modal-contatos" class="btn btn-primary">Entrar em contato</button>
                    </div>
                </div>
            </div>`;

                    $('#container-cards').append(card)
                })
            })
        }

        buscaSolicitacoes();
    })

    function atualizaModal(phone, email) {
        $('#phone-contato').html(phone)
        $('#email-contato').html(email)
        $('#envia-email-contato').prop('href', `mailto:${email}`)
    }
</script>

</body>
</html>

