<?php

require '../../php/conexao.php';

$query = "
    SELECT 
        p.nome AS produto, 
        f.nome AS fornecedor, 
        p.preco, 
        e.quantidade 
    FROM 
        estoque e
    JOIN 
        produto p ON e.id_produto = p.id
    JOIN 
        fornecedor f ON e.id_fornecedor = f.id
";

$result = $pdo->query($query);

$estoques = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($estoques);
?>
