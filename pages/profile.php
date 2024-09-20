<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: /pit/painel.php?go=login');
}

$avatarUrl = "";

if (!empty($_SESSION['user']['avatar'])) {
    $avatarUrl = 'data:image/jpeg;base64,' . base64_encode($_SESSION['user']['avatar']);
}
?>

<html lang="pt-br">
<head>
    <?php include_once('../head.php') ?>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<div class="container-fluid">
    <?php include "../components/navbar_home.php" ?>

    <div class="container mt-5 d-flex flex-column gap-5">
        <div class="d-flex gap-3 align-items-center">
            <span style="width: 80px;" id="preview">
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        fill="#484848">
                                <path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                            </svg>
            </span>
            <div style="display: flex; flex-direction: column;">
                <label for="avatar">Foto de perfil</label>
                <input id="avatar" type="file" class="form-control">
            </div>
        </div>
        <button id="save" class="btn btn-primary">Salvar</button>
    </div>
</div>

<?php include('../scripts.php') ?>
<script>
    $(document).ready(() => {
        const avatarUrl = "<?php echo $avatarUrl; ?>";

        if (avatarUrl) {
            $('#preview').html(`
            <div style="background-size: cover; background-repeat: no-repeat; background-position: center;border-radius: 1000px; background-image: url('${avatarUrl}'); width: 80px; height: 80px"""></div>
        `)
        }
    })

    $('#avatar').change(() => {
        const file = $('#avatar').prop('files')

        const src = URL.createObjectURL(file[0])

        $('#preview').html(`
            <div style="background-size: cover; background-repeat: no-repeat; background-position: center;border-radius: 1000px; background-image: url('${src}'); width: 80px; height: 80px"></div>
        `)
    })

    $('#save').click(() => {
        const file = $('#avatar').prop('files')
        if (file.length > 0) {
            swal.fire({
                title: "Carregando",
                showCancelButton: false,
                showConfirmButton: false,
                willOpen: () => Swal.showLoading()
            })

            const form = new FormData();
            form.append('avatar', file[0]);
            form.append('metodo', 'update')

            fetch("../backend/users/UserController", {method: "POST", body: form})
                .then(async (res) => {
                    const json = await res.json()

                    if (json.status) {
                        swal.fire({
                            title: "Sucesso!",
                            html: "Seu usuário foi atualizado com sucesso!",
                            icon: "success"
                        })
                    } else {
                        swal.fire({
                            title: "Erro!",
                            html: json.mensagem,
                            icon: "error"
                        })
                    }
                }).catch(() => {
                swal.fire({
                    title: "Erro!",
                    html: "Erro ao realizar o upload desta imagem",
                    icon: "error"
                })
            })
        } else {
            swal.fire({
                title: "Aviso",
                icon: "warning",
                html: "Você não selecionou nenhuma foto!"
            })
        }
    })
</script>
</body>
</html>
