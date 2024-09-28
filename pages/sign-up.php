<style>
    .container-login {
        width: 100%;
        height: 70%;
        padding: 160px 400px!important;
    }

    @media (max-width: 1280px) {
        .container-login {
            padding: 160px 100px!important;
        }
    }

    @media (max-width: 768px) {
        .container-login {
            padding: 110px 10px!important
        }
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

<div class="container-login">
    <div style="margin-bottom: 12px; display: flex; flex-direction: column; ">
        <h1 style="font-size: 28px">Crie sua conta</h1>
        <p style="color: rgba(0, 0, 0, 0.5)">Já possui uma conta? <a href="painel.php?go=login"
                                                                     style="text-decoration: underline; color: royalblue; cursor: pointer; transition: all;">logar</a>
        </p>
    </div>

    <form class="row g-3">
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" placeholder="example@gmail.com" class="form-control" id="email">
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" placeholder="********" id="password">
        </div>
        <div class="col-6">
            <label for="name" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="name" placeholder="Eduarda Santos">
        </div>
        <div class="col-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" placeholder="(31) 93198-4029">
        </div>
        <div class="col-md-12">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" placeholder="00000-000" class="form-control" id="cep">
        </div>
        <div class="col-12">
            <div class="form-check d-flex align-items-center gap-2">
                <input class="form-check-input" style="padding: 8px !important; margin-top: 0px !important;"
                       type="checkbox" id="is_collaborator">
                <label class="form-check-label" for="is_collaborator">
                    É colaborador?
                </label>
            </div>
        </div>
        <select class="form-select" style="display: none" id="servicos">
            <option selected>Selecione o serviço prestado</option>
        </select>
        <div class="col-12">
            <button id="enviar" type="button" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#is_collaborator').change(() => {
        if (!$('#is_collaborator').is(":checked")) {
            $('#servicos').css('display', 'none')
        } else {
            $('#servicos').css('display', 'flex')
        }
    })

    function BuscarServicos() {
        fetch("../backend/services/ServiceController.php", {method: 'GET'})
            .then(async (res) => {
                    const resJson = await res.json();

                    resJson.dados.forEach((ser) => {
                        $('#servicos').append(`<option value=${ser.id}>${ser.descricao}</option>`)
                    })
                }
            )
    }

    BuscarServicos();

    $('#enviar').click(() => {
        const form = new FormData();

        if ($('#email').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [email] é obrigatório!",
                icon: "warning"
            })
            return
        } else if ($('#password').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [senha] é obrigatório!",
                icon: "warning"
            })
            return
        } else if ($('#name').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [nome] é obrigatório!",
                icon: "warning"
            })
            return
        } else if ($('#cep').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [CEP] é obrigatório!",
                icon: "warning"
            })
            return
        } else if ($('#telefone').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [telefone] é obrigatório!",
                icon: "warning"
            })
            return
        }

        form.append("email", $('#email').val());
        form.append("password", $('#password').val());
        form.append("cep", $('#cep').val());
        form.append("phone", $('#telefone').val())
        form.append("name", $('#name').val());
        form.append("isCollaborator", $('#is_collaborator').is(":checked") ? 1 : 0)

        if ($('#is_collaborator').is(":checked")) {
            form.append('servico', $('#servicos').val())
        }

        fetch("../backend/auth/RegisterController.php", {method: 'POST', body: form}).then(res => {
            swal.fire({
                title: "Sucesso",
                icon: "success",
                html: "Usuário cadastrado com sucesso!",
                allowEscapeKey: false,
                allowOutsideClick: false,
            }).then(res => {
                if (res.value) {
                        window.location.href = 'painel.php?go=login'
                }
            })
        }).catch((error) => {
            console.log(error)
            swal.fire({
                title: "Erro",
                icon: "error",
                html: "Ocorreu um erro ao cadastrar o seu usuário! Contate o suporte"
            })
        })
    })
</script>