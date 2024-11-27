<?php

class Database
{
    public $conexao;

    public function __construct() {
        $dbHost = 'mysql:host=127.0.0.1;dbname=shework';
        $dbUsername = 'root';
        $dbPassword = 'serra';
        $this->conexao = new PDO($dbHost, $dbUsername, $dbPassword);
    }
}