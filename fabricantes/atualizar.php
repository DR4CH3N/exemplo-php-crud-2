<?php
    require_once '../src/funcoes-fabricantes.php';
// obtendo o valor do parametro da URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $fabricante = lerUmFabricante($conexao, $id);

    if (isset($_POST['atualizar'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

        atualizarFabricante($conexao, $id, $nome);

        header("localization:listar.php");

        // header("location:listar.php")

        // mensagem + refresh
        // echo "<p>Nome atualizado com sucesso!</p>";
        // header("refrese:3; url=listar.php");

        header("location:listar.php?status=sucesso");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fabricantes atualizar - PHP</title>
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
            <input type="hidden" name="<?=$fabricante['id']?>">
        <p>
            <label for="nome">Nome:</label>
            <input value="<?=$fabricante['nome']?>" type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="atualizar">
            atualizar fabricante
        </button>
        </form>
    </div>
    
</body>
</html>