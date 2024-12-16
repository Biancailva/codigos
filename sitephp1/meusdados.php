<?php

require_once 'Banco.php';
include('barra.php');

// Adicione verificações de autenticação ou redirecionamento se necessário

$banco = new Banco();
$usuario = $_SESSION['usuario'];

// Recupera os dados do usuário do banco de dados
$dadosUsuario = $banco->obterDadosUsuario($usuario);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se o formulário foi enviado, obtenha os novos dados do formulário
    $novoNome = $_POST['nome'];
    $novoCpf = $_POST['cpf'];
    $novaSenha = $_POST['senha'];

    // Chame o método para editar o usuário no banco de dados
    $edicaoSucesso = $banco->editarUsuario($usuario, $novoNome, $novoCpf, $novaSenha);

    echo "<script>window.location = 'principal.php';</script>";
}

// Exibir os dados do usuário no formulário
$nomeUsuario = $dadosUsuario['nome'];
$cpfUsuario = $dadosUsuario['cpf'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus dados</title>
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
</head>
<body style="background-color: rgb(247, 207, 207);">

    <div class="container mt-5">
    <h2>Editar Dados</h2>
    <p>Olá, <strong><?php echo $nomeUsuario; ?></strong></p>
    <p>CPF: <strong><?php echo $cpfUsuario; ?></strong></p>

    <div class="row" style="padding-bottom: 340px">
        <div class="col-md-6">
            <form method = "post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Novo nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" >
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">Novo CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" >
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Nova Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div>

                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </form>
        </div>
    </div>
</div>

<!-- Rodapé -->
<footer class="bg-body text-light text-center py-3">
    <div class="container" style="color: black;">
        <p>&copy; 2023 Salão Studio Beauty</p>
    </div>
</footer>
</body>
</html>