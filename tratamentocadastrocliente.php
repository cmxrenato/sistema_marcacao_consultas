<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

    // Recebe os dados do formulário
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $setor = strtoupper(trim($_POST['setor'])); // <-- transforma em maiúsculas
    $confirma_senha = $_POST['confirma-senha'];

    // Hash da senha para armazenamento seguro
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Verifica se o login já existe
    $sql = "SELECT id FROM funcionarios WHERE login = ? OR matricula = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("ss", $login, $matricula);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Se já existe, exibe mensagem de erro
        echo "<script>alert('Já existe um usuário cadastrado!');</script>";
    } else {
        // Caso contrário, insere o novo usuário
        $sql = "INSERT INTO funcionarios (login, senha, nome, matricula, setor) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if ($stmt === false) {
            die("Erro na preparação da consulta de inserção: " . $conexao->error);
        }

        $stmt->bind_param("sssss", $login, $senha_hash, $nome, $matricula, $setor);

        if ($stmt->execute()) {
            echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conexao->close();
}
?>