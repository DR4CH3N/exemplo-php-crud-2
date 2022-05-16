<?php
// verificando se o botão do form foi acionado
if (isset($_POST['inserir']) ) {
    // importando as funções e a conexão
    require_once "../src/funcoes-fabricantes.php";

    // capturando o que foi digitado no campo nome
    $nome = $_POST['nome'];

    inserirFabricante($conexao, $nome);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir - PHP</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | INSERT</h1>
        <hr>
        
        <form action="" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="inserir">
            Inserir fabricante
        </button>
        </form>
    </div>
    
</body>
</html>