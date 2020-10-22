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
    }