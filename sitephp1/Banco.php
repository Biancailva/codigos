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
            prepare('SELECT * FROM clientes WHERE nome LIKE "%'.$busca.'%" ORDER BY id DESC');
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

    public function cadastrarUsuario($nome, $cpf, $senha){
        try {
            $instancia = $this->conexao->
            prepare('insert into usuario (nome, cpf, senha) values (:nome, :cpf, :senha)');
            $instancia->bindParam(':nome', $nome);
            $instancia->bindParam(':cpf', $cpf);
            $instancia->bindParam(':senha', $senha);
            $instancia->execute();
        } catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function listarUsuarios(){
        try {
            $instancia = $this->conexao->query('SELECT * FROM usuario');
            $usuarios = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function editarUsuario($usuario, $novoNome, $novoCpf, $novaSenha) {
        try {
            // Verifica se os novos valores foram fornecidos
            if (!empty($novoNome) || !empty($novoCpf) || !empty($novaSenha)) {
                // Cria a instrução SQL base
                $sql = 'UPDATE usuario SET';

                // Adiciona as cláusulas SET apenas para os campos fornecidos
                if (!empty($novoNome)) {
                    $sql .= ' nome = :novoNome,';
                }
                if (!empty($novoCpf)) {
                    $sql .= ' cpf = :novoCpf,';
                }
                if (!empty($novaSenha)) {
                    $sql .= ' senha = :novaSenha,';
                }

                // Remove a vírgula extra no final
                $sql = rtrim($sql, ',');

                // Adiciona a cláusula WHERE para identificar o usuário
                $sql .= ' WHERE id = :usuario';

                // Prepara e executa a consulta
                $instancia = $this->conexao->prepare($sql);

                // Adiciona os parâmetros
                if (!empty($novoNome)) {
                    $instancia->bindParam(':novoNome', $novoNome);
                }
                if (!empty($novoCpf)) {
                    $instancia->bindParam(':novoCpf', $novoCpf);
                }
                if (!empty($novaSenha)) {
                    $instancia->bindParam(':novaSenha', $novaSenha);
                }
                $instancia->bindParam(':usuario', $usuario);

                // Executa a consulta
                $instancia->execute();

                return true; // Operação bem-sucedida
            } else {
                // Nenhum dado fornecido para atualização
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function obterDadosUsuario($Idusuario) {
        try {
            $instancia = $this->conexao->prepare('SELECT * FROM usuario WHERE id = :Idusuario');
            $instancia->bindParam(':Idusuario', $Idusuario);
            $instancia->execute();

            // Retorna os dados do usuário como um array associativo
            return $instancia->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
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

