<?php
require_once '../src/funcoes-fabricantes.php';
require_once '../src/funcoes-produtos.php';



$listaDeFabricantes = LerFabricantes($conexao);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// pegando o valor do id e sanitizando por segurança

$produto = lerUmProduto($conexao, $id);
// chamando a função e recebendo os dados do produto

    if (isset($_POST['atualizar'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(INPUT_POST, 'preco',FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $fabricanteId = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_NUMBER_INT);

        atualizarProduto($conexao, $id, $nome, 
        $preco, $quantidade, $descricao, $fabricanteId);

        header("location:listar.php");

        // header("location:listar.php")

        // mensagem + refresh
        // echo "<p>Nome atualizado com sucesso!</p>";
        // header("refrese:3; url=listar.php");

        
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar - PHP</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT UPDATE</h1>
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
            <input value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="preco">Preço</label>
            <input type="number" value="<?=$produto['preco']?>" name="preco" id="preco" min="0" max="10000" step="0.01" required>
        </p>
        <p>
            <label for="quantidade">Quantidade</label>
            <input type="number" value="<?=$produto['quantidade']?>" name="quantidade" id="quantidade" min="0" max="100" required>
        </p>
        <p>
            <label for="fabricante">Fabricante</label>
            <select name="fabricante" id="fabricante">
                <option value=""></option>
                <?php foreach($listaDeFabricantes as $fabricante) { ?>
                    <!-- o value ID é para o banco -->
                    <option 
                    <?php
                    /* se chave estrangeira for identica a chave primaria (ou seja, se o codigo do fabricante do produto bater com o codigo do fabricante), então coloque o atributo selected no option
                    */
                    if ($produto['fabricante_id'] === $fabricante['id']) echo " selected ";
                    ?>
                    value="<?=$fabricante['id'] ?>">
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
            <textarea required name="descricao" id="descricao" cols="30" rows="3">
            <?=$produto['descricao']?></textarea>
        </p>

        <button type="submit" name="atualizar">
            Atualizar Produto
        </button>
        </form>
    </div>
    
</body>
</html>