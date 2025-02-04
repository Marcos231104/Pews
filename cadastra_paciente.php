<?php
// Include the database connection
include 'db.php';

// Capture form data
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

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO paciente (responsavel, nome, idade, telefone, genero, data_nascimento, data_admissao, alergias, remedios, tipo_sanguineo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisssssss", $responsavel, $nome, $idade, $telefone, $genero, $data_nascimento, $data_admissao, $alergias, $remedios, $tipo_sanguineo);

// Execute the query
if ($stmt->execute()) {
    // Success: Redirect to cadastro_pews.html
    header("Location: cadastro_pews.html");
    exit(); // Ensure no further code is executed after the redirect
} else {
    // Error: Display an error message and redirect back to the form
    echo "<script>
            alert('Error: " . addslashes($stmt->error) . "');
            window.location.href = 'index.html'; // Redirect to index.html on error
          </script>";
}

// Close the connection
$stmt->close();
$conn->close();
?>