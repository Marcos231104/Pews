<?php
// Include the database connection
include 'db.php';

// Capture form data (excluding 'id' since it will be auto-generated)
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
$stmt = $conn->prepare("INSERT INTO paciente (nome, idade, telefone, genero, data_nascimento, data_admissao, alergias, remedios, tipo_sanguineo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssssss", $nome, $idade, $telefone, $genero, $data_nascimento, $data_admissao, $alergias, $remedios, $tipo_sanguineo);

// Execute the query
if ($stmt->execute()) {
    echo "Record successfully inserted!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
