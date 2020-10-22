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
                $script = $this->pdo->query("SELECT nome, telefone, email FROM pessoa ORDER BY nome;");
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
    }