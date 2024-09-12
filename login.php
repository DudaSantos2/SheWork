<div style="width: 100%; padding: 60px 80px">
    <div style="margin-bottom: 12px; display: flex; flex-direction: column; ">
        <h1 style="font-size: 28px">Entre em sua conta</h1>
        <p style="color: rgba(0, 0, 0, 0.5)">Não possui uma conta? <a
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
            <input style="padding: 8px !important; margin-top: 0px !important;" type="checkbox" class="form-check-input"
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
        } else if ($('#password').val() == "") {
            swal.fire({
                title: "Aviso!",
                html: "O campo [senha] é obrigatório!",
                icon: "warning"
            })
        }

        form.append("email", $('#email').val());
        form.append("password", $('#password').val());

        fetch("./backend/auth/LoginController.php", {method: 'POST', body: form}).then(async res => {
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
                html: "Usuário logado com sucesso!"
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