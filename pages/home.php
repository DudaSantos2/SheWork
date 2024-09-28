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
    <?php include_once('../pages/head.php') ?>
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
                        <i style="color: #454545" class="fa-solid fa-envelope"></i>
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
<!--
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
    <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
</div>-->


<?php include('../pages/scripts.php') ?>

<script>
    function buscaSolicitacoes() {
        const form = new FormData();
        form.append("metodo", "get")

        fetch("../backend/requests/RequestController.php", {method: "POST", body: form}).then(async (res) => {
            $('#container-cards').empty()

            const requests = await res.json();

            if (requests.dados.length === 0) {
                $('#cont').html('Nenhuma solicitação ativa!');
            } else if (requests.dados.length === 1) {
                $('#cont').html(`${requests.dados.length} solicitação ativa!`);
            } else {
                $('#cont').html(`${requests.dados.length} solicitações ativas!`);
            }


            requests.dados.forEach((request) => {
                let status = "";

                if (request.status == 1) {
                    status = "<span class='badge rounded-pill text-bg-success'>Concluído</span>"
                } else {
                    status = '<span class="badge rounded-pill text-bg-info">Em aberto</span>'
                }

                const card = `<div class="col">
                <div class="card">
                    <div class="card-header">
                        Solicitação
                        ${status}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${request.name}</h5>
                        <p class="card-text">${request.descricao}</p>
                        <div class="d-flex align-items-center gap-2 justify-content-between">
                            <button type="button" onclick="atualizaModal('${request.phone}', '${request.email}')" data-bs-toggle="modal" data-bs-target="#modal-contatos" class="btn btn-primary">Entrar em contato</button>
                                <button style="border: none!important; ${request.status == 1 ? "cursor: not-allowed;" : "cursor: normal;"}" type="button" ${request.status == 1 ? "disabled" : ""} onclick="marcarConcluido(${request.id})" class="btn btn-transparent"><i style="font-size: 20px ;color: #52CB52;" class="fa-solid fa-square-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>`;

                $('#container-cards').append(card)
            })
        })
    }

    $(document).ready(() => {
        buscaSolicitacoes();
    })

    function marcarConcluido(id) {
        swal.fire({
            title: "Aviso",
            icon: "info",
            html: "Deseja marcar como concluído?",
        }).then(res => {
            if (res.value) {
                const body = new FormData();
                body.append("metodo", "check");
                body.append("id", id);

                fetch("../backend/requests/RequestController.php", {method: "POST", body})
                    .then(async (res) => {
                        const response = await res.json();

                        if (response.status) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "bottom-start",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: "Alteração feita com sucesso!"
                            });

                            buscaSolicitacoes();
                        }
                    })
            }
        })
    }

    function atualizaModal(phone, email) {
        $('#phone-contato').html(phone)
        $('#email-contato').html(email)
        $('#envia-email-contato').prop('href', `mailto:${email}`)
    }
</script>

</body>
</html>

