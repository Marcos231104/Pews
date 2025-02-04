<?php
// Include database connection
include 'db.php';

// Fetch all records from the table 'pews'
$sql = "SELECT * FROM pews";
$result = $conn->query($sql);

// Debugging: Check if the query runs successfully
if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "<h1>PEWS Cadastrados</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        foreach ($row as $key => $value) {
            echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . " ";
        }
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Nenhum pews cadastrado.</p>";
}

// Close database connection
$conn->close();
?>
