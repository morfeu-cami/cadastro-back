<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";

$conexao = new mysqli($servidor, $usuario, $senha);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$conexao->query("CREATE DATABASE IF NOT EXISTS cadastro_alunos");
$conexao->select_db("cadastro_alunos");

$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
    email VARCHAR(150) NOT NULL,
    tel VARCHAR(20) NOT NULL
)";

$conexao->query($sql);

?