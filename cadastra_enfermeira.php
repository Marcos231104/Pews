<?php
// Include the database connection
include 'db.php';

// Capture form data
$cip = $_POST['coren'];  // Make sure this is an integer
$nome = $_POST['nome'];
$funcao = $_POST['funcao'];
$senha = $_POST['senha'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO enfermeira (coren, nome, funcao, senha) VALUES (?, ?, ?, ?)");

if ($stmt === false) {
    // If prepare() fails, output the error
    die('MySQL prepare error: ' . $conn->error);
}

// Bind the parameters. 'i' stands for integer, 's' stands for string.
$stmt->bind_param("isss", $coren, $nome, $funcao, $senha);

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
