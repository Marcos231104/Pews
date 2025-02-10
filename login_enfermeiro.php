<?php
// Start a session to manage login state
session_start();


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Get input values from form
$coren = $_POST['coren'];
$senha = $_POST['senha'];

// Prepare the SQL query to check credentials
$sql = "SELECT * FROM enfermeira WHERE coren = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $coren, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Credentials are correct, login successful
    $_SESSION['coren'] = $coren;
    echo "<script>alert('Login realizado com sucesso!'); window.location.href='index.html';</script>";
} else {
    // Credentials are incorrect
    echo "<script>alert('Erro: coren ou senha incorretos!'); window.location.href='login_medico.html';</script>";
}

// Close connections
$stmt->close();
$conn->close();
?>