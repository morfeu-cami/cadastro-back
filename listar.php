<?php
include("conexao.php");

$busca = isset($_GET["busca"]) ? trim($_GET["busca"]) : "";

if ($busca !== "") {
    $stmt = $conexao->prepare(
        "SELECT * FROM usuarios
         WHERE nome LIKE ? OR sobrenome LIKE ? OR email LIKE ? OR tel LIKE ?
         ORDER BY id DESC"
    );
    $termo = "%" . $busca . "%";
    $stmt->bind_param("ssss", $termo, $termo, $termo, $termo);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $resultado = $conexao->query("SELECT * FROM usuarios ORDER BY id DESC");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Cadastrados</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Alunos Cadastrados</h1>

        <form class="busca" method="GET" action="listar.php">
            <input
                type="text"
                name="busca"
                placeholder="Buscar por nome, sobrenome, e-mail ou telefone"
                value="<?php echo htmlspecialchars($busca); ?>"
            >
            <button class="btn" type="submit">Buscar</button>
            <a class="btn" href="../index.html">Início</a>
            <a class="btn" href="cadastro.html">Novo cadastro</a>
        </form>

        <?php if ($resultado->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Data</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
                <?php while ($linha = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $linha["id"]; ?></td>
                        <td><?php echo htmlspecialchars($linha["nome"]); ?></td>
                        <td><?php echo htmlspecialchars($linha["sobrenome"]); ?></td>
                        <td><?php echo htmlspecialchars($linha["data"]); ?></td>
                        <td><?php echo htmlspecialchars($linha["email"]); ?></td>
                        <td><?php echo htmlspecialchars($linha["tel"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="vazio">Nenhum aluno encontrado.</p>
        <?php endif; ?>
    </div>
</body>

</html>