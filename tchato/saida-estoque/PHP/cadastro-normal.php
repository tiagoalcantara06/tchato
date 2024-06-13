<?php

require 'conexao.php'; // Arquivo com a conexão ao banco de dados
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    
    $insert = $pdo->prepare("UPDATE estoque
                                SET quantidade = quantidade + :quantidade
                                WHERE id_produto = :produto");

    $insert->execute([
        'quantidade' => $quantidade,
        'produto' => $produto
    ]);

    if($insert -> rowCount() > 0) {
        echo true;
    } else {
        echo false;
    }

    
}
?>
