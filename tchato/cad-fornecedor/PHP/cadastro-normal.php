<?php

require '../../php/conexao.php'; // Arquivo com a conexão ao banco de dados
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    // $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    
    $insert = $pdo->prepare("INSERT INTO fornecedor (nome, email, telefone) 
                            VALUES (:nome, :email, :tel);
    ");

    $insert->execute([
        'nome' => $name,
        'email' => $email,
        'tel' => $telefone
    ]);

    if($insert -> rowCount() > 0) {
        echo true;
    } else {
        echo false;
    }

    
}
?>
