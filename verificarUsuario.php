<?php
include 'conexao.php';

// Verifica se os campos necessários foram enviados
if (isset($_POST['email'], $_POST['nome'], $_POST['telefone'])) {
    $nome = $_POST['nome'];
    $login = $_POST['telefone']; // Por que telefone está sendo usado como login?
    $email = $_POST['email'];

    // Verifica no banco de dados
    $stmt = $conexao->prepare("SELECT id FROM clientes WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login encontrado, redireciona para o formulário de nova senha
        session_start();
        $_SESSION['login_validado'] = $login;
        header("Location: novaSenha.php");
        exit; // Importante após header()
    } else {
        echo "Login não encontrado.";
    }

    // Fecha recursos
    $stmt->close();
    $conexao->close();
} else {
    echo "Todos os campos devem ser preenchidos.";
}
?>


















$cpf = $_POST['cpf'];

$stmt = $conn->prepare("SELECT id FROM usuarios WHERE cpf = ?");
$stmt->bind_param("s", $cpf);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
// CPF encontrado, redireciona para o formulário de nova senha
session_start();
$_SESSION['cpf_validado'] = $cpf;
header("Location: nova_senha.php");
} else {
echo "CPF não encontrado.";
}
