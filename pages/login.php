<style>
    .container-login {
        width: 100%;
        height: 70%;
        padding: 160px 400px!important;
    }

    @media (max-width: 1280px) {
        .container-login {
            padding: 160px 100px!important
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
        <h1 style="font-size: 28px">Entre </h1>
        <p style="color: rgba(0, 0, 0, 0.5)">Não possui uma conta? <a href="painel.php?go=signup"
                                                                      style="text-decoration: underline; color: royalblue; cursor: pointer; transition: all;">cadastre-se</a>
        </p>
    </div>

    <form>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input"
                   id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Lembre de mim</label>
        </div>
        <button type="button" id="enviar" class="btn btn-primary">Logar</button>
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
            return
        } else if ($('#password').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [senha] é obrigatório!",
                icon: "warning"
            })
            return
        }

        form.append("email", $('#email').val());
        form.append("password", $('#password').val());

        fetch("../backend/controllers/auth/LoginController.php", {method: 'POST', body: form}).then(async res => {
            const response = await res.json();

            if (!response.status) {
                swal.fire({
                    title: "Aviso",
                    icon: "warning",
                    html: response.resposta
                })

                return
            }

            swal.fire({
                title: "Sucesso",
                icon: "success",
                html: "Usuário logado com sucesso!",
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(res => {
                if (res.value) {
                    window.location.href = response.data;
                }
            })
        }).catch((error) => {
            console.log(error)
            swal.fire({
                title: "Erro",
                icon: "error",
                html: "Ocorreu um erro ao logar! Contate o suporte"
            })
        })
    })</script>