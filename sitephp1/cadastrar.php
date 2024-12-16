<?php
    require_once 'Banco.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $banco = new Banco();
        $banco->cadastrarUsuario($nome, $cpf, $senha);
        echo "<script>alert('Cadastrado com sucesso!')</script>";
        echo "<script>window.location = 'principal.php';</script>";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
</head>
<body style="background-color: rgb(247, 207, 207);">
    <a class="btn btn-body w-100"style="background-color: rgb(247, 207, 207);d-block" href="principal.php" ></i></a>
    <div class="w-25 p-2 m-auto bg-body rounded">
        <p class="text-center">
            <img src="fotos/logo.jpeg" class="w-50">
        </p>
        <p class="text-center">
            <img src="fotos/comec.gif" class="w-50">
        </p>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-body w-100"style="background-color: rgb(247, 207, 207);d-block" href="principal.php" ></i>Cadastrar</button>  
        </form>           
                      

          
    </div>
    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>