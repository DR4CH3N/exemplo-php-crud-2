<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.preco, produtos.descricao, produtos.quantidade, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id ORDER BY produto";
    
    function inserirProduto(PDO $conexao, string $nome, 
        float $preco, int $quantidade, string $descricao, int $fabricanteId):void
        { // void indica sem retorno
        $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) 
        VALUES(:nome, :preco, :quantidade, :descricao, :fabricante_id)";       

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
            $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $consulta->bindParam(':fabricante_id', $fabricanteId, PDO::PARAM_INT);
            $consulta->execute();

            // PDO fetch assoc vai retornar o resultado em array
        }
        // catch vai executar os comandos dentro dele caso algum comando do try não de certo
        // die vai fazer com que o programa pare caso algum erro ocorra
        catch (Exception $erro) {
            die ("Erro: " .$erro->getMessage());
        }
        
    }

    // try vai tentar todos esses comandos
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        // PDO fetch assoc vai retornar o resultado em array
    }
    // catch vai executar os comandos dentro dele caso algum comando do try não de certo
    // die vai fazer com que o programa pare caso algum erro ocorra
    catch (Exception $erro) {
        die ("Erro: " .$erro->getMessage());
    }
    return $resultado;
}

// funções utilitarias

// var_dump mais curto usando função
function dump($dados) {
    echo "<pre>";
    var_dump($dados);
    echo "</pre>";
}
// formata moeda

/* function formataMoeda(float $valor):string {
    return "R$ ".number_format($valor, 2, ",", ".");
}
*/
