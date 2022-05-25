
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