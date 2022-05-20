<?php
require_once "../src/funcoes-fabricantes.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
excluirFabricante($conexao, $id);
header("location:listar.php");

// nota: apenas fabricantes que não tem produtos podem ser deletados