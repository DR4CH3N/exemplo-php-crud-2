<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.preco, produtos.descricao, produtos.quantidade, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id ORDER BY produto";

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
    function lerUmProduto(PDO $conexao, int $id):array {
        $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM produtos WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
            // PDO fetch assoc vai retornar o resultado em array
        }
        // catch vai executar os comandos dentro dele caso algum comando do try não de certo
        // die vai fazer com que o programa pare caso algum erro ocorra
        catch (Exception $erro) {
            die ("Erro: " .$erro->getMessage());
        }
        return $resultado;
    }


    function atualizarProduto(PDO $conexao, int $id, string $nome, 
    float $preco, int $quantidade, string $descricao, int $fabricanteId):void {
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco,
        quantidade = :quantidade, descricao = :descricao, 
        fabricante_id = :fabricanteId WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
            $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $consulta->bindParam(':fabricanteId', $fabricanteId, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("erro: ".  $erro->getMessage());
        }
    }
    
    function excluirProduto(PDO $conexao, int $id):void {
        $sql = "DELETE FROM produtos WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("erro: " .$erro->getMessage());
        }
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
