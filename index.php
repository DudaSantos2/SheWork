<!doctype html>
<html>
<head>
    <?php include('head.php') ?>
</head>

<body>
<?php include('navbar.php') ?>
<?php include('banner.php') ?>
<?php include('sobre.php') ?>
<?php include('servicos.php') ?>
<?php include('calculo-cep.php') ?>
<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
<script>
    document.getElementById('cepForm').addEventListener('submit', function (event) {
        event.preventDefault();

        var cep = document.getElementById('cep').value;
        var resultDiv = document.getElementById('result');


        resultDiv.innerHTML = '';


        fetch('api.php?cep=' + encodeURIComponent(cep))
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    var address = data.data;
                    resultDiv.innerHTML = `
                        <h3>Endereço Encontrado:</h3>
                        <p><strong>Logradouro:</strong> ${address.logradouro}</p>
                        <p><strong>Bairro:</strong> ${address.bairro}</p>
                        <p><strong>CEP:</strong> ${address.cep}</p>
                        <p>A SheWork consegue te atender!</p>
                    `;
                    resultDiv.addClass = 'result';
                    resultDiv.className = 'result alert alert-success text-left';

                } else {
                    resultDiv.innerHTML = `
                        <div class="erro-banner">${data.message}</div>`;
                    resultDiv.className = 'result text-left';
                }
            })
            .catch(error => {
                resultDiv.innerHTML = `<div class="erro-banner">Erro na consulta: ${error}</div>`;
                resultDiv.className = 'result';
            });
    });
</script>
</html>