<?php

require_once "conecta.php";

// ler os dados dos fabricantes
function LerFabricantes(PDO $conexao):array {
    $sql = "SELECT id, nome FROM fabricantes ORDER BY nome";
    
    try {
    $consulta = $conexao->prepare($sql);

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $erro) {
    die("Erro: " .$erro->getMessage());
}
    return $resultado;
}
var_dump($conexao);
// inserir um fabricante
function inserirFabricante(PDO $conexao, string $nome):void {
    $sql = "INSERT INTO fabricantes(nome) VALUES (:nome)";
    //(:nome) é um parametro e não deve ser usado como variavel ou const
    // Void e um comando que indica que a função nao vai ter retorno
    try {
        // try vai tentar todos esses comandos
        $consulta = $conexao->prepare($sql);
        // PDO vai tratar o parametro como string, no caso tratar ele
        // a sintaxe do bindParam funciona assim: bindParam('nome do parametro', $variavel_com_valor, constante de verificação)
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
        
    } catch (Exception $erro) {
        // catch vai executar esses comandos caso algo der errado

        die("erro: " .$erro->getMessage());
        // die vai fazer com que o codigo pare caso tiver algum erro, no caso vai mostrar uma mensagem de erro e vai parar o programa
    }
}



function lerUmFabricante(PDO $conexao, int $id) {
    $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);       
    } catch (Exception $erro) {
        die("erro: " .$erro->getMessage());
    }
    return $resultado;
}

function atualizarFabricante(PDO $conexao, int $id, string $nome):void {
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("erro: " .$erro->getMessage());
    }
}

function excluirProduto(PDO $conexao, int $id):void {
    $sql = "DELETE FROM fabricantes WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("erro: " .$erro->getMessage());
    }
}


/* try {
        
} catch (Exception $erro) {
    die("erro: " .$erro->getMessage());
}
}
@builtin PHP e desabilitar a segunda opção (recursos de linguagem PHP) */ 