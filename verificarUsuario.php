<?php
include 'conexao.php';

if (isset($_POST['email'], $_POST['nome'], $_POST['telefone'])) {
    $nome = $_POST['nome'];
    $login = $_POST['telefone'];
    $email = $_POST['email'];

    $stmt = $conexao->prepare("SELECT * FROM clientes WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // <- para poder pegar o array associativo.

        if ($row['login'] == $login and $row['nome'] == $nome and $row['email'] == $email) {
            session_start();
            $_SESSION['login_validado'] = $login;
            header("Location: novaSenha.php");
            exit;
        } else {

            echo "<script>alert('Usuário não encontrado!'); window.location.href='redefinirSenha.php';</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado!'); window.location.href='redefinirSenha.php';</script>";
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "<script>alert('Todos os campos devem ser preenchidos'); window.location.href='redefinirSenha.php';</script>";
}
