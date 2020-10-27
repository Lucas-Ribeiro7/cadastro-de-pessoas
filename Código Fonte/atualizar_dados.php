<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Atualizar Dados</title>
</head>
        <?php
            require_once 'pessoa.php';
            $p = new pessoa("cadastropdo", "localhost", "root", "");
        ?>
<body>
        <?php
            $dados = $p->buscarDados();
            for($i = 0; $i < count($dados); $i++){
                foreach($dados[$i] as $key => $value){
                
                }
            }   
        ?>
        <?php
            if(isset($_GET['id_up'])){
                $id_update = addslashes($_GET['id_up']);
                $res = $p->buscarDadosPessoa($id_update);
                $nome = $res['nome'];
                $telefone = $res['telefone'];
                $email = $res['email'];
                
            }
        ?>
    <section id="esquerda">
        <form action="" method=""> 
            <h2>CADASTRO DE PESSOAS</h2>
            <label>Nome</label>
            <input type="text" name="nome" value="<?php echo $nome;?>" required>
            <label>Telefone</label>
            <input type="text" name="telefone" value="<?php echo $telefone; ?>" required>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>" required>
            <input type="submit" value="Atualizar">
        </form>
    </section>

    
</body>
</html>