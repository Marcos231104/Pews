<?php
// Include the database connection
include 'db.php';

// Capture form data (excluding 'id' since it will be auto-generated)
$responsavel = $_POST['responsavel'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];
$data_nascimento = $_POST['data_nascimento'];
$data_admissao = $_POST['data_admissao'];
$alergias = $_POST['alergias'];
$remedios = $_POST['remedios'];
$tipo_sanguineo = $_POST['tipo_sanguineo'];

// Prepare and bind the SQL statement (no need to bind 'id')
$stmt = $conn->prepare("INSERT INTO paciente (responsavel, nome, idade, telefone, genero, data_nascimento, data_admissao, alergias, remedios, tipo_sanguineo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisssssss", $responsavel, $nome, $idade, $telefone, $genero, $data_nascimento, $data_admissao, $alergias, $remedios, $tipo_sanguineo);

// Execute the query
if ($stmt->execute()) {
    // Success message
    echo "<script>
            alert('Record successfully inserted!');
            window.location.href = 'index.html'; // Redirect to index.html
          </script>";
} else {
    // Error message
    echo "<script>
            alert('Error: " . addslashes($stmt->error) . "');
            window.location.href = 'index.html'; // Redirect to index.html even on error
          </script>";
}

// Close the connection
$stmt->close();
$conn->close();
?>