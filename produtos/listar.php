<?php
    require_once "../src/funcoes-produtos.php";
$listaDeProdutos = lerProdutos($conexao);
// dump($listaDeProdutos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
</head>
<body>
    <div class="container">
        <h1>Produtos - Lista</h1>
        <hr>
        <h2>Lendo e carregando todos os Produtos</h2>

        <p>
            <a href="inserir.php">Inserir um novo Produto</a>
        </p>
        
   
        
    <?php
    foreach ($listaDeProdutos as $produto) {
        ?> 
        
        
        <div class="produtos">
            <article>
             <!-- ID DO PRODUTO -->
             <p>ID <?=$produto["id"]?></p>
            <p>Nome do produto: <?=$produto["produto"]?></p> <!-- NOME DO PRODUTO -->
            <p>Descrição: <?=$produto["descricao"]?></p> <!-- DESCRIÇÃO DO PRODUTO -->
            <p>Preço: R$<?=number_format($produto["preco"], 2, ",", ".")?></p> <!-- PREÇO DO PRODUTO -->
            <p>Quantidade: <?=$produto["quantidade"]?></p> <!-- QUANTIDADE DO PRODUTO -->
            <p>Fabricante: <?=$produto["fabricante"]?></p> <!-- ID DO FABRICANTE -->
            

                                        <!-- valor do parametro  -->
            <P><a href="atualizar.php?id=<?=$produto['id']?>">atualizar produto</a></P>
            <p><a class="excluir" href="excluir.php?id=<?=$produto['id']?>">Excluir produto</a></p>
                     <!-- parametro de URL -->
                     <!-- "&" faz a concatenação caso voce quiser concatenar varios parametros -->
            <!-- quando voce tem uma interrogação no link voce esta criando um parametro -->
            </article>
        <?php
       }
        ?>
    </div>
        
        <script src="../js/confirmacao.js"></script>
    
</body>
</html>