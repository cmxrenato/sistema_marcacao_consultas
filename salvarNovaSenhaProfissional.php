<?php
session_start();
include 'conexao.php';

if (isset($_SESSION['login_validado'])) {

    $login = $_SESSION['login_validado'];
    $novaSenha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("UPDATE medicos SET senha = ? WHERE cpf = ?");
    $stmt->bind_param("ss", $novaSenha, $login);
    $stmt->execute();


    echo "<script>alert('Senha atualizada com sucesso!'); window.location.href='loginprofissional.php';</script>";

    $stmt->close();
    $conexao->close();
    session_destroy();
} else {

    header("Location: redefinirSenhaProfissional.php");
}
