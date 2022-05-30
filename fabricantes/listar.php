<?php 
require_once "../src/conecta.php"; 
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = LerFabricantes($conexao);
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

        <p>
            <a href="inserir.php">Inserir um novo fabricante</a>
        </p>
        <!-- faz a att do fabricante -->
        <?php if(isset($_GET['status']) && $_GET ['status'] == 'sucesso') { ?>
        <p>Fabricante atualizado com sucesso!</p>
        <?php } ?>

        <!--</?php if(isset($_GET['status']) ) { ?>
        <p>Fabricante atualizado com sucesso!</p>
        </?php } ?/> -->
        
        <table>
            <caption>Lista de fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                    <!-- colspan faz com que uma coluna se mescle (fazer a mesclagem) a outra -->
                </tr>
            </thead>
            <tbody>
        <?php 
        // string com o comando SQL
       

        // preparação do comando
        

        // execução do comando
        

        // capturar os resultados
       

     // echo"<pre>";
     // var_dump($resultado);
     // echo"</pre>";


foreach ($listaDeFabricantes as $fabricante) {
        ?> 
        
        
        <tr>
            <td><?=$fabricante["id"]?></td>
            <td><?=$fabricante["nome"]?></td>
                                        <!-- valor do parametro  -->
            <td><a href="atualizar.php?id=<?=$fabricante['id']?>">atualizar</a></td>
            <td><a class="excluir" href="excluir.php?id=<?=$fabricante['id']?>">Excluir</a></td>
            <?php 
            
            ?>
                     <!-- parametro de URL -->
                     <!-- "&" faz a concatenação caso voce quiser concatenar varios parametros -->
            <!-- quando voce tem uma interrogação no link voce esta criando um parametro -->
        </tr> 
        <?php
       }
        ?>
            </tbody>
        </table>
    </div>

    <script src="../js/confirmacao.js"></script>

    <!-- <a onclick="return confirm('Deseja mesmo excluir?')" -->
</body>
</html>