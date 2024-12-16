<?php
    require_once 'Banco.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $banco = new Banco();
        $usuarios = $banco->listarUsuarios();
        foreach ($usuarios as $user){
            if($user['cpf'] == $cpf and
            $user['senha']==$senha){
                session_start();
                $_SESSION['usuario'] = $user['id'];
                header('Location: principal.php');
            }
        }
        $msg = 'Usuário e/ou Senha Inválidos.';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    
</head>

<body style="background-color: rgb(247, 207, 207);">

    <div class="w-25 p-2 m-auto bg-body rounded" >
        <p class="text-center">
            <img src="fotos/logo.jpeg" class="w-50">
        </p>
        <p class="text-center">
            <img src="fotos/video.gif" class="w-50">
        </p>
        <form method="post" action="login.php" class="mt-1">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">CPF</label>
                <input name="cpf" type="text" class="form-control" id="cpf" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">SENHA</label>
                <input name="senha" type="password" class="form-control" id="senha">
            </div>
            <div>
            <button type="submit" class="btn btn-body w-100"style="background-color: rgb(247, 207, 207);d-block" href="principal.php" ></i>Entrar</button>            
            <p class="text-center">Cliente novo?<a href="cadastrar.php">Cadastre-se</a></p>

        </form>
    </div>
    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>