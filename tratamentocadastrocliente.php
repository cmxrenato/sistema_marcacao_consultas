<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

    // Recebe os dados do formulário
    $login = $_POST['telefone'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    

    // Hash da senha para armazenamento seguro
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Verifica se o login já existe
    $sql = "SELECT id FROM clientes WHERE login = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Se já existe, exibe mensagem de erro
        echo "<script>alert('Não foi possível cadastrar o usuário. O login já existe');
        window.location.href = 'cadastrocliente.php';</script>";
    } else {
        // Caso contrário, insere o novo usuário
        $sql = "INSERT INTO clientes (login, senha, nome) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if ($stmt === false) {
            die("Erro na preparação da consulta de inserção: " . $conexao->error);
        }

        $stmt->bind_param("sss", $login, $senha_hash, $nome);

        if ($stmt->execute()) {
            echo "<script>alert('Usuário cadastrado com sucesso!');
                window.location.href = 'logincliente.php';
            </script>";
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conexao->close();
   
}
 
?>
