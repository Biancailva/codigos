<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        session_destroy();
        header('Location: login.php');
    }
?>
<nav class="navbar rounded rounded-2 bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="principal.php">Salão de Beleza</a>
        
        <div class="dropdown" style="background-color: rgb(247, 207, 207); margin-right: 100px;">
            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user-tie"></i> MENU
            </button>
            <ul class="dropdown-menu" >
                <li><a class="dropdown-item" href="meusdados.php">Meus Dados</a></li>
                <li><a class="dropdown-item" href="servicos.php">Consultar</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="sair.php">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>
<script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>