<?php
require "../../php/conexao.php"; 
// echo 'to aqui';

// header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = $pdo->query("SELECT id AS cod, nome 
    FROM fornecedor");

    $resultado = array();

    if ($sql -> rowCount() > 0){
        
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $resultado[] = $row;
        }
        
    } else {
        echo json_encode(false);
        exit;
    }
    echo json_encode($resultado, JSON_UNESCAPED_SLASHES);

    $pdo = null;
}

?>
