<?php
include 'conexao.php';
session_start();

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);//intval() é uma função nativa do PHP que converte o valor passado para um número inteiro (int).

    $stmt = $conexao->prepare("DELETE FROM selecoes_consultas");
   

    if ($stmt->execute()) {
        echo "Excluído com sucesso";
    } else {
        echo "Erro: " . $stmt->error;
    }
    $stmt->close();
    $conexao->close();
}
?>