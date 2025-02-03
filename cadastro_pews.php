<?php
// Include the database connection
include 'db.php';

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data and sanitize inputs
    $crm = filter_var($_POST['crm'], FILTER_VALIDATE_INT);
    $nome = trim($_POST['nome_paciente']);
    $idade = filter_var($_POST['idade'], FILTER_VALIDATE_INT);
    $f_cardiaca = filter_var($_POST['f_cardiaca'], FILTER_VALIDATE_INT);
    $f_respiratoria = filter_var($_POST['f_respiratoria'], FILTER_VALIDATE_INT);
    $aval_neurologica = trim($_POST['aval_neurologica']);
    $aval_cardiovascular = trim($_POST['aval_cardiovascular']);
    $aval_respiratoria = trim($_POST['aval_respiratoria']);
    $pos_op = $_POST['pos_op'];
    $nebulizacao_resgate = $_POST['nebulizacao_resgate'];
    $intervencao = trim($_POST['intervencao']);

    // Validate required fields
    if (!$crm || !$idade || !$f_cardiaca || !$f_respiratoria || empty($nome) || empty($aval_neurologica) || empty($aval_cardiovascular) || empty($aval_respiratoria) || empty($pos_op) || empty($nebulizacao_resgate) || empty($intervencao)) {
        die("Por favor, preencha todos os campos corretamente.");
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO pews (crm, nome, idade, f_cardiaca, f_respiratoria, aval_neurologica, aval_cardiovascular, aval_respiratoria, pos_op, nebulizacao_resgate, intervencao) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die('Erro na preparação da query: ' . $conn->error);
    }

    $stmt->bind_param("isiiissssss", $crm, $nome, $idade, $f_cardiaca, $f_respiratoria, $aval_neurologica, $aval_cardiovascular, $aval_respiratoria, $pos_op, $nebulizacao_resgate, $intervencao);

    // Execute the query
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
