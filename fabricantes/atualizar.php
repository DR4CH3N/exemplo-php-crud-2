<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atualizar - PHP</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
        <p>
            <a href="listar.php">Voltar para a lista de fabricantes</a>
        </p>

        <p>
            <a href="../index.php">Home</a>
        </p>

        <form action="" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="atualizar">
            atualizar fabricante
        </button>
        </form>
    </div>
    
</body>
</html>