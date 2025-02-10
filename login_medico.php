<?php
// Include the database connection
include 'db.php';

// Get input values from form
$crm = $_POST['crm'];
$senha = $_POST['senha'];

// Prepare the SQL query to check credentials
$sql = "SELECT * FROM medicos WHERE crm = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $crm, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Credentials are correct, login successful
    $_SESSION['crm'] = $crm;
    echo "<script>alert('Login realizado com sucesso!'); window.location.href='dashboard.php';</script>";
} else {
    // Credentials are incorrect
    echo "<script>alert('Erro: CRM ou senha incorretos!'); window.location.href='login_medico.html';</script>";
}

// Close connections
$stmt->close();
$conn->close();
?>