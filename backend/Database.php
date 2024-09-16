<?php
class Database
{
    public $conexao;

    public function __construct() {
        $dbHost = 'mysql:host=localhost;dbname=shework';
        $dbUsername = 'root';
        $dbPassword = '';
        $this->conexao = new \PDO($dbHost, $dbUsername, $dbPassword);
    }
}