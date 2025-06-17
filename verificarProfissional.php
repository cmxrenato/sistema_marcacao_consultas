<?php
include 'conexao.php';

if ($_POST['cpf']) {
   // $nome = $_POST['nome'];
    $login = $_POST['cpf'];
   

    $stmt = $conexao->prepare("SELECT * FROM medicos WHERE cpf = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // <- para poder pegar o array associativo.

        if ($row['cpf'] == $login ) {
            session_start();
            $_SESSION['login_validado'] = $login;
            header("Location: novaSenhaProfissional.php");
            exit;
        } else {

            echo "<script>alert('Usuário não encontrado!'); window.location.href='redefinirsenhaProfissional.php';</script>";
            
        }
    } else {
        
        echo "<script>alert('Usuário não encontrado!'); window.location.href='redefinirsenhaProfissional.php';</script>";
        
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "<script>alert('Todos os campos devem ser preenchidos'); window.location.href='redefinirsenhaProfissional.php';</script>";
}
