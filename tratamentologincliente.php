<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php';

    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, senha, nome FROM clientes WHERE login = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hash_senha, $nome);
        $stmt->fetch();

        if (password_verify($senha, $hash_senha)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['cliente_id'] = $id; 

            header("Location: sistemacliente.php");
            exit;
        } else {
            echo "<script>alert('Senha ou Usuário incorretos!'); window.location.href='index.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Senha ou Usuário incorretos!'); window.location.href='index.php';</script>";
        exit;
    }

    $stmt->close();
    $conexao->close();
}
?>
