<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Cadastro</title>
</head>
<body>
    <section id="esquerda">
        <form action="">
            <h2>CADASTRO DE PESSOAS</h2>
            <label>Nome</label>
            <input type="text" name="nome">
            <label>Telefone</label>
            <input type="text" name="telefone">
            <label>Email</label>
            <input type="text" name="email">
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
            <tr>
                <td>Teste</td>
                <td>Teste</td>
                <td>Teste</td>
                <td><a href="">Editar</a><a href="">Excluir</a></td>
            </tr>
        </table>
    
    </section> 
</body>
</html>