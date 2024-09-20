<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: /pit/painel.php?go=login');
} else if ($_SESSION['user']['isCollaborator'] == '1') {
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
        <p style="font-size: 19px; font-weight: 600" id="cont">Nenhum colaborador disponível</p>
        <div class="row row-cols-1 row-cols-md-2 g-4" id="container-cards">

        </div>
    </div>
</div>

<div class="modal fade" id="modal-solicitacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descreva mais sobre seu
                        problema:</label>
                    <textarea class="form-control" id="descricao" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="colaborador_atual" id="colaborador_atual">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="envia-solicitacao" type="button" class="btn btn-primary">Enviar solicitação
                </button>
            </div>
        </div>
    </div>
</div>

<?php include('../scripts.php') ?>

<script>
    $(document).ready(() => {
        function buscaColaboradores() {
            const form = new FormData();
            form.append('metodo', 'getAll');

            fetch("../backend/collaborator/CollaboratorController.php", {
                method: "POST",
                body: form
            }).then(async (res) => {
                const collaborators = await res.json()

                if (collaborators.dados.length === 0) {
                    $('#cont').html('Nenhum colaborador disponível!');
                } else if (collaborators.dados.length === 1) {
                    $('#cont').html(`${collaborators.dados.length} colaborador disponível!`);
                } else {
                    $('#cont').html(`${collaborators.dados.length} colaboradores disponíveis!`);
                }

                collaborators.dados.forEach((collaborator) => {
                    const src = `data:image/jpeg;base64,${collaborator.avatar}`

                    const card = `<div class="col">
                <div class="card">
                    <div class="card-header">
                        Colaborador
                    </div>
                    <div class="card-body">
                        <div class="mb-4" style="border: solid 1px #4f4f4f;background-size: cover; background-repeat: no-repeat; background-position: center;border-radius: 1000px; background-image: url('${src}'); width: 80px; height: 80px"></div>
                        <h5 class="card-title">${collaborator.name}</h5>
                        <p class="card-text">${collaborator.descricao}</p>
                        <button onclick="setaColaboradorAtual(${collaborator.id})" type="button" data-bs-toggle="modal" data-bs-target="#modal-solicitacao" class="btn btn-primary">Enviar solicitação</button>
                    </div>
                </div>
            </div>`;

                    $('#container-cards').append(card)
                })
            })
        }

        buscaColaboradores();
    })

    function setaColaboradorAtual(id) {
        $('#colaborador_atual').val(id)
    }

    const myModal = document.getElementById('modal-solicitacao')

    myModal.addEventListener('hidden.bs.modal', () => {
        $("#descricao").val("")
    })

    $('#envia-solicitacao').click(() => {
        if ($('#descricao').val() === "") {
            swal.fire({
                title: "Aviso",
                html: "Preencha a descrição!",
                icon: "warning"
            })

            return
        }


        const body = new FormData();
        body.append("metodo", "create");
        body.append("id_colaborador", $("#colaborador_atual").val())
        body.append("descricao", $("#descricao").val())

        fetch("../backend/requests/RequestController.php", {method: "POST", body})
            .then(async (res) => {
                const response = await res.json()

                if (response.status) {
                    swal.fire({
                        title: "Sucesso!",
                        html: response.mensagem,
                        icon: "success"
                    })

                }
            })
    })
</script>

</body>
</html>

