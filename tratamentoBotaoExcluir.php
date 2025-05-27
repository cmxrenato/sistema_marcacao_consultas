<?php
include 'conexao.php';
session_start();

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $conexao->prepare("DELETE FROM selecoes_consultas WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Excluído com sucesso";
    } else {
        echo "Erro: " . $stmt->error;
    }
    $stmt->close();
    $conexao->close();
}
?>