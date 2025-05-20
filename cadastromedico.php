<?php

include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Recebe os dados do formulário (ou definidos diretamente)
$login = "joao@email.com";
$senha = "654321";
$nome  = "João";

// Cria o hash seguro da senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Prepara a consulta SQL para inserir os dados
$sql = "INSERT INTO medicos (login, senha, nome) VALUES (?, ?, ?)";
$stmt = $conexao->prepare($sql);

// Verifica se a preparação da consulta foi bem-sucedida
if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conexao->error);
}

// Corrigido: fechamento do parêntese estava faltando aqui 👇
$stmt->bind_param("sss", $login, $senha_hash, $nome);

// Executa a inserção
if ($stmt->execute()) {
    echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
} else {
    echo "Erro ao cadastrar usuário: " . $stmt->error;
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();

?>



