<?php
session_start();
include 'conexao.php';

$login = $_SESSION['login_validado'];
$novaSenha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$stmt = $conexao->prepare("UPDATE clientes SET senha = ? WHERE login = ?");
$stmt->bind_param("ss", $novaSenha, $login);
$stmt->execute();

echo "Senha atualizada com sucesso!";

$stmt->close();
$conexao->close();
session_destroy();
