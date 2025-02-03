<?php
// Include the database connection file
include('db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the input to avoid XSS
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare an SQL statement to insert data into the contact_form table
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)");
    
    // Bind parameters to the SQL query
    $stmt->bind_param("sss", $name, $email, $message);  // "sss" means 3 string parameters

    // Execute the query and check if the insertion was successful
    if ($stmt->execute()) {
        echo "<h2>Thank you for your message, $name!</h2>";
        echo "<p>Your message has been received and will be reviewed shortly.</p>";
    } else {
        echo "<h2>Error: Unable to submit your message.</h2>";
    }

    // Close the prepared statement and the connection
    $stmt->close();
    $conn->close();
}
?>
