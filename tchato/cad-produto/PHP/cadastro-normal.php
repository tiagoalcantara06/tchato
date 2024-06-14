<?php

require '../../php/conexao.php'; // Arquivo com a conexão ao banco de dados
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    //$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    
    $insert = $pdo->prepare("INSERT INTO produto (nome, descricao, preco) 
    VALUES (:name, :descricao, :preco);
    ");

    $insert->execute([
        'name' => $name,
        'descricao' => $descricao,
        'preco' => $preco
    ]);

    if($insert -> rowCount() > 0) {
        echo true;
    } else {
        echo false;
    }

    
}
?>
