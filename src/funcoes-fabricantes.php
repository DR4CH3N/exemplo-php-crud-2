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

