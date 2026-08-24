<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container container-form">
        <h1>Cadastrar Aluno</h1>

        <form id="formulario" action="salvar.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" required>
            </div>

            <div class="form-group">
                <label for="data">Data de nascimento:</label>
                <input type="date" id="data" name="data" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="tel">Telefone:</label>
                <input type="tel" id="tel" name="tel" required>
            </div>

            <div class="buttons">
                <button type="submit">Salvar</button>
                <button type="reset">Limpar</button>
                <button type="button" onclick="window.location='listar.php'">Consultar lista</button>
                <button type="button" onclick="window.location='../index.html'">Início</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("formulario").addEventListener("submit", function (event) {
            event.preventDefault();

            const nome = document.getElementById("nome").value.trim();
            const sobrenome = document.getElementById("sobrenome").value.trim();
            const data = document.getElementById("data").value;
            const email = document.getElementById("email").value.trim();
            const tel = document.getElementById("tel").value.trim();

            if (nome === "") {
                alert("Preencha o nome!");
                return;
            }

            if (sobrenome === "") {
                alert("Preencha o sobrenome!");
                return;
            }

            if (data === "") {
                alert("Informe a data de nascimento!");
                return;
            }

            if (!email.includes("@")) {
                alert("Digite um e-mail válido!");
                return;
            }

            if (tel.length < 8) {
                alert("Digite um telefone válido!");
                return;
            }

            this.submit();
        });
    </script>
</body>

</html>