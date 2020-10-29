<?php
    class pessoa{
        private $pdo;
        public function __construct($dbname, $host, $user, $senha){
            try{
               $this->pdo = new PDO("mysql:dbname=$dbname; host=$host", $user, $senha);
            }catch (PDOException $e){
                echo "<p>Erro com a conexão com o Banco de dados</p>";
            }
            
            }
            public function getPdo(){
                return $this->pdo;
            }
            public function setPdo($pd){
                $this->pdo = $pd;
            }
            public function buscarDados(){
                $res = array();
                $script = $this->pdo->query("SELECT * FROM pessoa ORDER BY nome;");
                $res = $script->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            }
            public function cadastrarPessoa($nome, $telefone, $email){
                //ANTES DE CADASTRAR PRECISAMOS VERIFICAR SE JÁ FOI CADASTRADO (NO CASO VAMOS VERIFICAR PELO O EMAIL... CASO TENHA OUTRO IGUAL)
                $cmd = $this->pdo->query("SELECT id FROM pessoa WHERE email = '$email'");
                if($cmd->rowCount() > 0){
                    //CASO ENCONTRE UM EMAIL IGUAL
                    return false;
                }else{
                    //CASO NÃO ENCONTRE
                    $cmd = $this->pdo->prepare("INSERT INTO pessoa (nome, telefone, email) VALUES (:n, :t, :e)");
                    $cmd->bindValue(":n", $nome);
                    $cmd->bindValue(":t", $telefone);
                    $cmd->bindValue(":e", $email);
                    $cmd->execute();
                    return true;
                } 
            }
            public function excluirPessoa($id){
                $cmd = $this->pdo->prepare("DELETE FROM pessoa WHERE id = :id");
                $cmd->bindValue(":id", $id);
                $cmd->execute();
            }

            public function buscarDadosPessoa($id){
                $res = array();
                $sql = $this->pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
                $sql->bindValue(":id", $id);
                $sql->execute();
                $res = $sql->fetch(PDO::FETCH_ASSOC);
                return $res;
            }

            public function atualizarDados($id, $nome, $telefone, $email){
                $cmd = $this->pdo->prepare("UPDATE pessoa SET nome = :n, telefone = :t, email = :e WHERE id = :i");
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":t", $telefone);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":i", $id);
                $cmd->execute();
        
            }
    }