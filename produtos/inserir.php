<?php
require_once '../src/funcoes-fabricantes.php';
$listaDeFabricantes = LerFabricantes($conexao);

if(isset($_POST['inserir'])){ // isset verifica se algum recurso é ativado, caso sim ele vai executar o codigo especifico
    require_once '../src/funcoes-produtos.php';
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $fabricanteId = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_NUMBER_INT);

    inserirProduto($conexao, $nome, $preco, $quantidade, $descricao, $fabricanteId);

    header("location:listar.php");
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
        <h1>Produtos | INSERT</h1>
        <hr>
        <p>
            <a href="listar.php">Voltar para a lista de produtos</a>
        </p>

        <p>
            <a href="../index.php">Home</a>
        </p>

        <form action="" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>
        <p>
            <label for="preco">Preço</label>
            <input type="number" name="preco" id="preco" min="0" max="10000" step="0.01" required>
        </p>
        <p>
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" min="0" max="100" required>
        </p>
        <p>
            <label for="fabricante">Fabricante</label>
            <select name="fabricante" id="fabricante">
                <option value=""></option>
                <?php foreach($listaDeFabricantes as $fabricante) { ?>
                    <!-- o value ID é para o banco -->
                    <option value="<?=$fabricante['id'] ?>">
                        <?= $fabricante['nome'] ?> <!-- Exibição apenas -->
                    </option>
                <?php 
                }    
                ?>
                <!-- opções de fabricantes existentes no BANCO -->
            </select>
        </p>
        <p>
            <label for="descricao">Descrição</label>
            <textarea required name="descricao" id="descricao" cols="30" rows="3"></textarea>
        </p>

        <button type="submit" name="inserir">
            Inserir Produto
        </button>
        </form>
    </div>
    
</body>
</html>