<?php

require 'conexao.php'; // Arquivo com a conexão ao banco de dados
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto'];
    $forne = $_POST['forne'];
    $quantidade = $_POST['quantidade'];

    $quantidade = $quantidade < 0 ? 0 : $quantidade;
    
    $insert = $pdo->prepare("INSERT INTO estoque (id_produto, id_fornecedor, quantidade) 
    VALUES (:produto, :forne, :quantidade);
");

    $insert->execute([
        'produto' => $produto,
        'forne' => $forne,
        'quantidade' => $quantidade
    ]);

    if($insert -> rowCount() > 0) {
        echo true;
    } else {
        echo false;
    }

    
}
?>
