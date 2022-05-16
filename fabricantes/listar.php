<?php 
    // SCRIPT DE CONEXAO AO SERVIDOR BANCO DE DADOS
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "vendas";

    // try/catch

    try {
        $conexao = new PDO( // PDO é uma API
            "mysql:host=$servidor; dbname=$banco; charset=utf8",
            $usuario,
            $senha);

         // habilita a verificação de erros
        $conexao->setAttribute(
        PDO::ATTR_ERRMODE, // constante de erros em geral 
        PDO::ERRMODE_EXCEPTION); // constante de exceções de erro
    
    } catch (Exception $erro){
        die("erro: " .$erro->getMessage()); // die vai mostrar uma mensagem personalizada e vai parar o programa completamente.
        // getline vai mostrar a linha em que esta dando erro no codigo
        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - lista</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>
        
        <table>
            <caption>Lista de fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
        <?php 
        // string com o comando SQL
        $sql = "SELECT id, nome FROM fabricantes";

        // preparação do comando
        $consulta = $conexao->prepare($sql);

        // execução do comando
        $consulta->execute();

        // capturar os resultados
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

     // echo"<pre>";
     // var_dump($resultado);
     // echo"</pre>";

     foreach ($resultado as $fabricante) {
         echo $fabricante['nome'];
     }
        ?>
        <tr>
            <td><?php echo $fabricante['id'];?></td>
            <td><?php echo $fabricante['nome'];?></td>
        </tr>
                
            </tbody>
        </table>
    </div>
    
</body>
</html>