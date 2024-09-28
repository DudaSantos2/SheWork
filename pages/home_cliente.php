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
    <?php include_once('../pages/head.php') ?>
</head>
<body>

<style>
    .avaliacao {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 10px
    }

    .avaliacao span {
        font-size: 25px;
        cursor: pointer;
        color: #FFE800;
        filter: saturate(0);
        transition: all 0.3s;
    }

    button.btn.btn-primary {
        background-color: #9B2BCF!important;
        border: 1px solid #9B2BCF!important;
    }

    button.btn.btn-primary:hover {
        background-color: #6A0DAD!important;
        border: 1px solid #6A0DAD!important;
    }
</style>

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

<div class="modal fade" id="modal-avaliacao" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Avaliação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="descricao" class="form-label">Deixe aqui sua avaliação:</label>
                    <div class="avaliacao">
                        <input checked type="checkbox" id="star1">
                        <input type="checkbox" id="star2">
                        <input type="checkbox" id="star3">
                        <input type="checkbox" id="star4">
                        <input type="checkbox" id="star5">
                        <label for="star1"><span style="filter: saturate(1);"
                                                 class="fa fa-star"></span></label>
                        <label for="star2"><span class="fa fa-star"></span></label>
                        <label for="star3"><span class="fa fa-star"></span></label>
                        <label for="star4"><span class="fa fa-star"></span></label>
                        <label for="star5"><span class="fa fa-star"></span></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="colaborador_atual" id="colaborador_atual">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="envia-avaliacao" type="button" class="btn btn-primary">Enviar avaliação
                </button>
            </div>
        </div>
    </div>
</div>

<?php include('../pages/scripts.php') ?>
<script>
    function buscaColaboradores() {
        $('#container-cards').empty();

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

                const card = `<div class="col w-100">
                <div class="card w-100">
                    <div class="card-header">
                        Colaborador
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mb-4" style="border: solid 1px #4f4f4f;background-size: cover; background-repeat: no-repeat; background-position: center;border-radius: 1000px; background-image: url('${src}'); width: 80px; height: 80px"></div>
                            <div class="d-flex flex-column gap-3 align-items-end">
                                <div class="avaliacao">
                                    <div class="star"><span class="fa fa-star"></span></div>
                                    <div class="star"><span class="fa fa-star"></span></div>
                                    <div class="star"><span class="fa fa-star"></span></div>
                                    <div class="star"><span class="fa fa-star"></span></div>
                                    <div class="star"><span class="fa fa-star"></span></div>
                                </div>
                                <p style="color: #343434">${collaborator.quantidade} avaliações</p>
                            </div>
                        </div>
                        <h5 class="card-title">${collaborator.name}</h5>
                        <p class="card-text">${collaborator.descricao}</p>
                        <button onclick="setaColaboradorAtual(${collaborator.id})" type="button" data-bs-toggle="modal" data-bs-target="#modal-solicitacao" class="btn btn-primary">Enviar solicitação</button>
                        <button id="envia-avaliacao" onclick="setaColaboradorAtual(${collaborator.id})" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-avaliacao">
                                            Avaliar
                        </button>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center gap-2"><i style="color: #454545" class="fa-solid fa-location-dot"></i>${collaborator.cep}</li>
                        <li class="list-group-item d-flex align-items-center gap-2"><i style="color: #454545" class="fa-solid fa-phone"></i>${collaborator.phone}</li>
                        <li class="list-group-item d-flex align-items-center gap-2"><i style="color: #454545" class="fa-solid fa-envelope"></i></i>${collaborator.email}</li>
                    </ul>
                </div>
            </div>`;

                $('#container-cards').append(card)

                $('.star span').each((index, item) => {
                    if (index >= parseInt(collaborator.media)) {
                        return;
                    }

                    $(item).css('filter', 'saturate(1)')

                })
            })
        })
    }

    $(document).ready(() => {
        buscaColaboradores();
    })

    function setaColaboradorAtual(id) {
        $('#colaborador_atual').val(id)
    }

    const myModal = document.getElementById('modal-solicitacao')

    myModal.addEventListener('hidden.bs.modal', () => {
        $("#descricao").val("")
    })

    $('input[type="checkbox"]').hide()

    $('input[type="checkbox"]').each((i, item) => {
        $(item).change(() => {
            let [_, index] = $(item).attr('id').split('star');

            if ($(item).is(':checked')) {
                for (let i = 1; i < parseInt(index) + 1; i++) {
                    $(`input#star${i}`).prop('checked', true)
                    $(`label[for='star${i}'] span`).css('filter', 'saturate(1)');
                }
            } else {
                for (let i = 1; i <= 5; i++) {
                    $(`input#star${i}`).prop('checked', i <= index);
                    $(`label[for='star${i}'] span`).css('filter', i <= index ? 'saturate(1)' : 'saturate(0)');
                }
            }
        })
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

    $('#envia-avaliacao').click(() => {
        let nota = 0;

        $('input[type="checkbox"]').each((i, item) => {
            if (!$(item).is(':checked')) {
                return;
            }

            const [_, resposta] = $(item).attr('id').split('star');

            if (resposta > nota) {
                nota = resposta
            }
        })

        const body = new FormData();
        body.append("metodo", "create");
        body.append("id_colaborador", $("#colaborador_atual").val());
        body.append("nota", nota);

        fetch("../backend/reviews/ReviewController.php", {method: "POST", body})
            .then(async (res) => {
                const json = await res.json();

                if (!json.status) {
                    swal.fire({
                        title: "Erro!",
                        html: json.mensagem,
                        icon: "error",
                    })

                    return
                }

                buscaColaboradores();

                swal.fire({
                    title: "Sucesso!",
                    html: json.mensagem,
                    icon: "success",
                })
            });
    })
</script>

</body>
</html>

