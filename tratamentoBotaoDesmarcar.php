
<?php
include 'conexao.php';
session_start();

if (isset($_POST['id'])) {
   $medico_id = 1; 
    $cliente_id = $_SESSION['id'] ?? null;
    if (!$cliente_id) {
    echo "Você precisa estar logado como cliente para marcar consultas.";
    exit;
        }

    $id = intval($_POST['id']); // ID da consulta a ser desmarcada

    // Buscar registros em selecoes_consultas do cliente
    $select = $conexao->prepare("SELECT * FROM consultas_marcadas WHERE id = ?");
    if (!$select) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }
    $select->bind_param("i", $id);
    $select->execute();
    // Obter o resultado da consulta    
    $result = $select->get_result();

    if ($result->num_rows > 0) {

        // Buscar dados do cliente
        $selectCliente = $conexao->prepare("SELECT * FROM clientes WHERE id = ?");
        $selectCliente->bind_param("i", $cliente_id);
        if (!$selectCliente) {
            die("Erro na preparação da consulta do cliente: " . $conexao->error);
        }
        $selectCliente->execute();
        $resultCliente = $selectCliente->get_result();
        $cliente = $resultCliente->fetch_assoc();
        

        if ($cliente) {
            $telefone = $cliente['login'];

            // Processar todas as selecoes_consultas do cliente
            while ($dados = $result->fetch_assoc()) {

                $insert = $conexao->prepare(
                    "INSERT INTO selecoes_consultas (dia, horario,medico_id)  VALUES (?, ?, ?)"
                );
                if (!$insert) {
                    die("Erro na preparação do INSERT: " . $conexao->error);
                }

                $insert->bind_param(
                    "ssi",
                    $dados['data_consulta'],
                    $dados['horario'],
                    $medico_id);

                if ($insert->execute()) {
                    // Excluir registro de selecoes_consultas
                    $stmt = $conexao->prepare("DELETE FROM consultas_marcadas WHERE id = ?");
                    $stmt->bind_param("i", $dados['id']);

                    if ($stmt->execute()) {
                        echo "Marcado e excluído com sucesso para consulta ID: " . $dados['id'] . "<br>";
                    } else {
                        echo "Erro ao excluir: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Erro ao marcar: " . $insert->error;
                }
                $insert->close();
            }
        } else {
            echo "Cliente não encontrado.";
        }
    } else {
        echo "Nenhum registro encontrado.";
    }
    $select->close();
    $selectCliente->close();
    $conexao->close();
}
?>
