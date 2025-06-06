<?php



include 'conexao.php';






$sql = "SELECT * FROM consultas_marcadas ";

$stmt = $conexao->prepare($sql);
$stmt->execute();
$result = $stmt->get_result(); // <-- usa o resultado da execução preparada

if ($result->num_rows > 0) {
    echo "<table class='table table-striped table'>
            <tr>
                <th>Dia</th>
                <th>Horário</th>
                <th>Nome</th>
                <th>Telefone</th>

                
                                               
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["data_consulta"]) . "</td>
                <td>" . htmlspecialchars($row["horario"]) . "</td>
                <td>" . htmlspecialchars($row["nome"]) . "</td>
                <td>" . htmlspecialchars($row["telefone"]) . "</td>


                                              
              </tr>";
    }

    echo "</table>";
} else {
    echo "<div class='senao'>Não há pacientes marcados! </div>";
}

$stmt->close();
$conexao->close();
?>
