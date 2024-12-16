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
</head>
<body style="background-color: rgb(247, 207, 207);">

<!-- Barra de navegação -->
<?php include('barra.php')?>

<!-- Banner -->
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">Bem-vindo ao nosso Salão Studio Beauty</h1>
        <p class="lead">O lugar perfeito para cuidar da sua beleza</p>
    </div>
</div>

<!-- Serviços -->
<section id="servicos" class="py-5">
    <div class="container">
        <h2 class="text-center" style="color: rgb(252, 252, 252);">Nossos Serviços</h2>
        <div class="row">
            <!-- Exemplo de serviço -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="cabelo.jpeg" class="card-img-top" alt="Serviço 1">
                    <div class="card-body">
                        <h5 class="card-title">Cabelo</h5>
                        <p class="card-text">Oferecemos os melhores tratamentos e profissionais de cabelos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="unha.png" class="card-img-top" alt="Serviço 1">
                    <div class="card-body">
                        <h5 class="card-title">Manicure</h5>
                        <p class="card-text">Oferecemos nossos melhores designer com as melhores profissionais.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="make.jpeg" class="card-img-top" alt="Serviço 1">
                    <div class="card-body">
                        <h5 class="card-title">Maquiagem</h5>
                        <p class="card-text">Oferecemos nossos melhores produtos com as melhores profissionais.</p>
                    </div>
                </div>
            </div>

            <!-- Adicione mais serviços aqui -->
        </div>
    </div>
</section>

<!-- Equipe -->
<section id="equipe" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center">Nossa Equipe</h2>
        <div class="row">
            <!-- Exemplo de membro da equipe -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="gaby.jpeg" class="card-img-top" alt="Membro da Equipe 1">
                    <div class="card-body">
                        <h5 class="card-title">Maria Gabriella</h5>
                        <p class="card-text">Empresária</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="eduarda.jpeg" class="card-img-top" alt="Membro da Equipe 1">
                    <div class="card-body">
                        <h5 class="card-title">Eduarda Sales</h5>
                        <p class="card-text">Atendente</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="tory.jpeg" class="card-img-top" alt="Membro da Equipe 1">
                    <div class="card-body">
                        <h5 class="card-title">Vitoria Reis</h5>
                        <p class="card-text">Cabeleireira/Maquiadora</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="bianca.jpeg" class="card-img-top" alt="Membro da Equipe 1">
                    <div class="card-body">
                        <h5 class="card-title">Natalia Bianca</h5>
                        <p class="card-text">Manicure</p>
                    </div>
                </div>
            </div>

            <!-- Adicione mais membros da equipe aqui -->
        </div>
    </div>
</section>

<!-- Cliente -->
<section id="cliente" class="py-5">
    <div class="container">
        <h2 class="text-center">Cadastrar cliente</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" placeholder="Seu telefone">
                    </div>
                    <div>
                        <a class="btn btn-body w-100d-block" style="background-color: rgb(255, 255, 255);" href="agendar.php" ></i>Enviar</a>            

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Rodapé -->
<footer class="bg-body text-light text-center py-3">
    <div class="container" style="color: black;">
        <p>&copy; 2023 Salão Studio Beauty</p>
    </div>
</footer>

</body>
</html>
