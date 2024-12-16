
<?php
 
 require_once 'Banco.php';

$banco = new Banco();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $b = $_POST['busca'];
    $pessoas = $banco->listarPessoas($b);
}else {
    $pessoas = $banco->listarPessoas("");
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salão de Beleza</title>

    <!-- Adicione os links para os arquivos CSS e JavaScript do Bootstrap 5.2.2 -->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <link href="fontawesome-free-6.2.1-web/css/all.css" rel="stylesheet">
</head>

<body>
    <!-- DIV DO CONTEÚDO -->
    <div class="container p-3 shadow mx-auto">

        <!-- MENU -->
        <?php include('barra.php')?>

        <p class="text-end"><a href="cadastrarservico.php" class="btn btn-sm btn-outline-success m-2"><i class="fa-solid fa-user-plus"></i> Cadastrar</a></p>
        <!-- CONTEÚDO -->

        <div class="my-2 col-md-6">
            <form method="post" action="servicos.php">
                <input class="form-control" type="text" name="busca" placeholder="Digite para buscar">
            </form>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Serviço</th>
                <th>Dia</th>
                <th></th>
            </tr>
            <?php foreach ($cliente as $cliente):?>
            <tr>
                <td><?php echo $cliente['nome'];?></td>
                <td><?php echo $servico['servico'];?></td>
                <td><?php echo $agenda['dia'];?></td>
                <td class="d-flex justify-content-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="editarservico.php?id=<?php echo $cliente['id']; ?>">Editar</a></li>
                            <li><button class="dropdown-item" onclick="excluir(<?php echo $cliente['id']; ?>)">Excluir</button></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </table>

    </div>

    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
    <script >
        function excluir(id){
            var resposta = confirm("Tem certeza que deseja excluir?");
            if(resposta){
                window.location = 'excluir.php?id='+id;
            }
        }
    </script>
</body>
</html>