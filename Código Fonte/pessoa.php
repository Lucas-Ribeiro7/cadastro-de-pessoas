<?php
    class pessoa{
        private $pdo;
        public function __construct($dbname, $host, $user, $Senha){
            try{
               $this->pdo = new PDO("mysql:dbname=$dbname; host=$host", $user, $senha) 
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
    }