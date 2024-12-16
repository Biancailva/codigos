<?php

class Banco{

    private $conexao;

    public function __construct(){
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=bancosite', 'root', '');
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }//Fim do construtor

    public function listarPessoas($busca){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM cliente WHERE nome LIKE "%'.$busca.'%" ORDER BY id DESC');
            $clientes = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function pegarServico($id){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM servicos WHERE tipo = '.$id);
            $servicos = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $servicos;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    

    public function listarUsuarios(){
        try {
            $instancia = $this->conexao->query('SELECT * FROM users');
            $usuarios = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function cadastrarServico($tipo, $id){
        try{
            $intancia = $this->conexao
                ->prepare("INSERT INTO servico (tipo, cliente_id) VALUES (:tipo, :clientes_id)");
            $intancia->bindParam(':tipo',$tipo);
            $intancia->bindParam(':clientes_id', $id);
            $intancia->execute();

        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

   

    public function excluirServico($id){
        try{
            $instancia = $this->conexao->prepare("DELETE FROM servico WHERE id = :id");
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    public function editarUsuario($id, $nome, $cpf){
        try{
            $instancia = $this->conexao->prepare("UPDATE users SET  password = :password WHERE id = :id");
            $instancia->bindParam(':password', $password);
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            $ex->getMessage();
        }
    }
    public function editarServico($id, $tipo){
        try{
            $instancia = $this->conexao->prepare("UPDATE servico SET  tipo = :tipo WHERE id = :id");
            $instancia->bindParam(':tipo', $tipo);
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            $ex->getMessage();
        }
    }
    public function listarServicos($busca){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM servicos WHERE tipo LIKE "%'.$busca.'%" ORDER BY id DESC');
            $servicos = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $servicos;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    
    // -------------------------------------------------- //

    public function cadastrarUsuario($nome, $cpf){
        try{
            $intancia = $this->conexao
                ->prepare("INSERT INTO pessoas (nome, cpf) VALUES (:nome, :cpf)");
            $intancia->bindParam(':nome',$nome);
            $intancia->bindParam(':cpf', $cpf);
            $intancia->execute();
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    public function cadastrarAgendamento($cliente, $data){
        try{
            $intancia = $this->conexao
                ->prepare("INSERT INTO agendamentos (cliente, data) VALUES (:cliente, :data)");
            $intancia->bindParam(':cliente', $cliente);
            $intancia->bindParam(':data', $data);
            $intancia->execute();
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function consultarAgendamentos($cliente){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM agendamentos WHERE cliente LIKE "%'.$cliente.'%" ORDER BY id DESC');
            $agendamentos = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $agendamentos;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function excluirAgendamento($id){
        try{
            $instancia = $this->conexao->prepare("DELETE FROM agendamentos WHERE id = :id");
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function editarAgendamento($id, $cliente, $data){
        try{
            $instancia = $this->conexao->prepare("UPDATE agendamentos SET cliente = :cliente, data = :data WHERE id = :id");
            $instancia->bindParam(':cliente', $cliente);
            $instancia->bindParam(':data', $data);
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    public function editarCliente($id, $nome, $cpf){
        try{
            $instancia = $this->conexao->prepare("UPDATE clientes SET nome = :nome, cpf = :cpf WHERE id = :id");
            $instancia->bindParam(':nome', $nome);
            $instancia->bindParam(':cpf', $cpf);
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            $ex->getMessage();
        }
    }

    public function excluirCliente($id){
        try{
            $instancia = $this->conexao->prepare("DELETE FROM clientes WHERE id = :id");
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            $ex->getMessage();
        }
    }

    public function cadastrarCliente($nome, $cpf){
        try{
            $intancia = $this->conexao
                ->prepare("INSERT INTO clientes (nome, cpf) VALUES (:nome, :cpf)");
            $intancia->bindParam(':nome',$nome);
            $intancia->bindParam(':cpf', $cpf);
            $intancia->execute();
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function pegarCliente($id){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM clientes WHERE id = '.$id);
            $cliente = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $cliente[0];
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function listarCliente($busca){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM clientes WHERE nome LIKE "%'.$busca.'%" ORDER BY id DESC');
            $pessoas = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $pessoas;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }



}//Fim da Classe

?>

