<?php

    $dbHost = '127.0.0.1:3306';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbname = 'SheWork';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbname);

    if($conexao->connect_errno){
        echo("Erro no DB!");
    }else{
        echo("Conexão efetuada com sucesso!");
    }

?>