<?php
require_once "../src/funcoes-produtos.php";


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
excluirProduto($conexao, $id);
header("location:listar.php");

// alert vai aparecer uma mensagem para o usuario
// prompt vai pedir para o usuario digitar algo
// confirm é um comando de escolha
/* Logica do exercicio: o comando confirm deve aparecer caso voce clicar em "excluir" no sistema. 
caso o usuario clicar em "OK" o comando para exclusão será executado
caso o usuario clicar em "cancelar" o comando para exclusão não sera executado
*/
// nota: apenas fabricantes que não tem produtos podem ser deletados