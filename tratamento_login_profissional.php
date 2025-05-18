<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

    // Recebe os dados do formulário
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL para pegar id, senha e nome
    $sql = "SELECT id, senha, nome FROM medicos WHERE login = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hash_senha, $nome);
        $stmt->fetch();

        // Verifica a senha
        if (password_verify($senha, $hash_senha)) {
            // Armazena informações na sessão
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome; // 👈 Armazena o nome do usuário

            header("Location: sistema.php");
            exit;
        } else {
            echo "<script>alert('Senha ou Usuário incorretos!'); window.location.href='index.php';</script>";
            exit;
        }
    } else {
       echo "<script>alert('Senha ou Usuário incorretos!'); window.location.href='index.php';</script>";
            exit;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conexao->close();
}

?>