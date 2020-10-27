<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Cadastro</title>
</head>
        <?php
            require_once 'pessoa.php';
            $p = new pessoa("cadastropdo", "localhost", "root", "");
        ?>
<body>
    <?php
        if(isset($_POST['nome'])){
            $nome = addslashes($_POST['nome']); //ESTA FUNÇÃO FAZ A PROTEÇÃO DE CÓDIGOS MALICIOSO 
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            
            if(!$p->cadastrarPessoa($nome, $telefone, $email)){
            echo "<p>O Email digitado já foi cadastrado.</p>";
            }else{
                $p->cadastrarPessoa($nome, $telefone, $email);
            }
        }
    ?>
    <?php
        if(isset($_GET['ip_up'])){
            $id_update = addslashes(isset($_GET['ip_up']));
            $res = $p->buscarDadosPessoa($id_update);
        }
    ?>
    <section id="esquerda">
        <form action="" method="POST"> 
            <h2>CADASTRO DE PESSOAS</h2>
            <label>Nome</label>
            <input type="text" name="nome" required>
            <label>Telefone</label>
            <input type="text" name="telefone" required>
            <label>Email</label>
            <input type="text" name="email" required>
            <input type="submit" value="Cadastrar">
        </form>
    </section>
    <section id="direita">
        <table>
            <tr id="titulo">
                <td>NOME</td>
                <td>TELEFONE</td>
                <td colspan="2">EMAIL</td> <!--Colspan faz com ele o <td> oculpe dois espaco!-->
            </tr>
                <?php
                    $dados = $p->buscarDados();
                    if(count($dados) > 0){ //Verificar se exite dados sentro do array
                        for($i = 0; $i < count($dados); $i++){ //count() serve para percorrer sobre a array()
                            echo "<tr>";
                            foreach($dados[$i] as $key => $value){
                                if($key != "id"){ 
                                    //SERVE PARA TIRAR O ID E DEIXAR APENAS O NOME, TELEFONE E EMAIL
                                    echo "<td>$value</td>";
                                }
                                
                            }
                            ?>
                            <td>
                            <a href="">Editar</a><a href="index.php?id=<?php echo $dados[$i]['id']; ?>">Excluir</a>
                            </td>
                            <?php
                            echo "</tr>";
                        }
                    }else{
                        //CASO O BANCO ESTEJA VAZIO
                        echo "<p>Ainda não há pessoas cadastradas</p>";
                    }
                ?>              
                
            </tr>
        </table>
    
    </section> 
</body>
</html>
    <?php
        if(isset($_GET['id'])){
            $id_pessoa = addslashes($_GET['id']);
            $p->excluirPessoa($id_pessoa);
            header("refresh=0; url=index.php"); //PARA ATUALIZAR A PÁGINA
        }
    ?>