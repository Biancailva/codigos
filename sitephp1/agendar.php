<?php
  require_once 'Banco.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $cliente = $_POST['cliente'];
      $data = $_POST['data'];
      $banco = new Banco();
      $banco->cadastrarAgendamento($cliente,$data );
      echo "<script>alert('Cadastrado com sucesso!')</script>";
      echo "<script>window.location = 'principal.php';</script>";
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

<section id="contato" class="py-5">
    <div class="container">
        <h2 class="text-center">Agende seu horário</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Serviço</label>
                        <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione um Serviço</option>
                                <option value="1">Cabelo</option>
                                <option value="2">Manicure</option>
                                <option value="3">Maquiagem</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Dia</label>
                        <input type="date" class="form-control" id="dia" >
                    </div>
                    <div>
                        <a class="btn btn-body w-100d-block" style="background-color: rgb(255, 255, 255);" href="servicos.php" ></i>Enviar</a>            

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
<!-- Rodapé -->
<footer class="bg-body text-light text-center py-3">
    <div class="container" style="color: black;">
        <p>&copy; 2023 Salão Studio Beauty</p>
    </div>
</footer>

</body>
</html>

