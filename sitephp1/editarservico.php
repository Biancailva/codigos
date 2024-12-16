<?php
    require_once 'Banco.php';
    $banco = new Banco();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];

        $banco->editarServico($id, $tipo );
        echo "<script>alert('Pessoa editada com sucesso!')</script>";
        echo "<script>window.location = 'principal.php';</script>";
    }else{
        $cliente = $banco->pegarCliente($_GET['id']);
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
        <form method="post" action="editar.php">
            <label>ID</label>
            <input class="form-control w-25" type="text" hidden="hidden" name="id" value = "<?php echo $cliente['id'];?>">
            <label class="form-label">Serviço</label>
            <input class="form-control" type="text" name="nome" value="<?php echo $cliente['servico']; ?>">
            <input class="mt-2 btn btn-success" type="submit" value="Salvar">
        </form>
    </div>

    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>