<div style="width: 100%; padding: 60px 80px">
    <div style="margin-bottom: 12px; display: flex; flex-direction: column; ">
        <h1 style="font-size: 28px">Crie sua conta</h1>
        <p style="color: rgba(0, 0, 0, 0.5)">Já possui uma conta? <a
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
        <div class="col-12">
            <button id="enviar" type="button" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#enviar').click(() => {
        const form = new FormData();

        if ($('#email').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [email] é obrigatório!",
                icon: "warning"
            })
        } else if ($('#password').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [senha] é obrigatório!",
                icon: "warning"
            })
        } else if ($('#name').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [nome] é obrigatório!",
                icon: "warning"
            })
        } else if ($('#cep').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [CEP] é obrigatório!",
                icon: "warning"
            })
        } else if ($('#telefone').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [telefone] é obrigatório!",
                icon: "warning"
            })
        }

        form.append("email", $('#email').val());
        form.append("password", $('#password').val());
        form.append("cep", $('#cep').val());
        form.append("phone", $('#telefone').val())
        form.append("name", $('#name').val());
        form.append("isCollaborator", $('#is_collaborator').is(":checked") ? 1 : 0)

        fetch("./backend/auth/RegisterController.php", {method: 'POST', body: form}).then(res => {
            swal.fire({
                title: "Sucesso",
                icon: "success",
                html: "Usuário cadastrado com sucesso!"
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