<?php
include("conexao.php");

$nome = $_POST["nome"] ?? "";
$sobrenome = $_POST["sobrenome"] ?? "";
$data = $_POST["data"] ?? "";
$email = $_POST["email"] ?? "";
$tel = $_POST["tel"] ?? "";

$stmt = $conexao->prepare(
    "INSERT INTO usuarios (nome, sobrenome, data, email, tel)
     VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param("sssss", $nome, $sobrenome, $data, $email, $tel);
$sucesso = $stmt->execute();

$stmt->close();
$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="centro">
    <div class="container container-sm">
        <?php if ($sucesso): ?>
            <p class="mensagem sucesso">Dados cadastrados com sucesso!</p>
        <?php else: ?>
            <p class="mensagem erro">Erro ao cadastrar.</p>
        <?php endif; ?>

        <div class="botoes">
            <a class="btn" href="../index.html">Início</a>
            <a class="btn" href="cadastro.html">Novo cadastro</a>
            <a class="btn" href="listar.php">Consultar lista</a>
        </div>
    </div>
</body>

</html>