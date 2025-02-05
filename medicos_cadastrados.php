<?php
// Include database connection
include 'db.php';

// Fetch all doctors from the table
$sql = "SELECT nome, crm FROM medico";
$result = $conn->query($sql);

// Debugging: Check if the query runs successfully
if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "<h1>Médicos Cadastrados</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['nome']) . " - CRM: " . htmlspecialchars($row['crm']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Nenhum médico cadastrado.</p>";
}

// Close database connection
$conn->close();
?>
