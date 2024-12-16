<?php
    require_once 'Banco.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tipo = $_POST['tipo'];
        $id = $_POST['id'];
        $banco = new Banco();
        $banco->cadastrarServico($tipo, $id);
        echo "<script>alert('Serviço cadastrado com sucesso!')</script>";
        echo "<script>window.location = 'principal.php';</script>";
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="fontawesome-free-6.2.1-web/css/all.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container p-3 shadow mx-auto">
        <!-- MENU -->
        <?php include('barra.php')?>
        <p class="text-end mt-2">
            <a href="principal.php" class="btn btn-sm btn-outline-dark"><i class="fas fa-chevron-circle-left"></i> Voltar</a>
        </p>
        <form method="post" action="cadastrar.php">
            <label class="form-label">Nome</label>
            <input class="form-control" type="text" name="nome">
            <label class="form-label">Serviço</label>
            <div class="mb-3">
                        <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione um Serviço</option>
                                <option value="1">Cabelo</option>
                                <option value="2">Manicure</option>
                                <option value="3">Maquiagem</option>
                        </select>
                        <div class="mb-3">
                        <label for="number" class="form-label">Dia</label>
                        <input type="date" class="form-control" id="dia" >
                    </div>
                    </div>
            <input class="mt-2 btn btn-success" type="submit" value="Salvar">
        </form>
    </div>

    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>